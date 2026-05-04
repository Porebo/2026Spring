-- ============================================================
-- ROI Priority Scoring Model
-- View: engsb.tbx_main_detailed_view_2
-- Purpose: Computes a workbook-level composite priority score
--          from focus-group usage, enterprise usage, workbook
--          complexity, and alignment coefficient. Assigns each
--          workbook to a priority bucket (PRIO 1/2/3/EXCLUDED)
--          and a strategic tier (TIER 1–5).
-- ============================================================

CREATE OR REPLACE VIEW engsb.tbx_main_detailed_view_2 (
    workbook_key
    , view_id
    , workbook_link
    , tableau_workbook_owner
    , workbook_name
    , view_name
    , focus_departments
    , focus_persons
    , focus_group_view_count
    , enterprise_view_usage_count
    , focus_view_importance_ratio
    , focus_workbook_visits_count
    , enterprise_workbook_visits_count
    , focus_workbook_visits_ratio
    , focus_alignment_coefficient
    , workbook_nbr_of_views
    , migration_effort_hours
    , normalized_effort_hours
    , focus_usage_interest
    , relative_utilization_score
    , normalized_effort_usage_utilization
    , workbook_priority_number
    , priority_bucket
    , priority_tier
) AS WITH enterpriseviewtotals AS (
    -- Total access events per view, across all Tableau Server users
    SELECT
        workbook_key
        , view_id
        , COUNT(*) AS total_ent_view_views
    FROM
        engsb.tbx_usage_views_fact_2
    GROUP BY
        workbook_key
        , view_id
), enterpriseworkbooktotals AS (
    -- Total access events per workbook, across all Tableau Server users
    SELECT
        workbook_key
        , COUNT(*) AS enterprise_workbook_visits_count
    FROM
        engsb.tbx_usage_views_fact_2
    GROUP BY
        workbook_key
), workbookcomplexity AS (
    -- Number of views (sheets/tabs) per workbook — proxy for migration effort
    SELECT
        workbook_key
        , COUNT(view_id) AS workbook_nbr_of_views
    FROM
        engsb.tbx_view_dmn_2
    GROUP BY
        workbook_key
), focusgroupdetails AS (
    -- Usage events restricted to the Asset Development focus cohort
    -- Excludes: Asset Dev Data Analytics (support traffic)
    -- Includes: department keys 1,2,3,4,6,7,8 with active person registry match
    SELECT
        f.workbook_key
        , f.view_id
        , d.department_name
        , pn.first_name || ' ' || pn.last_name AS full_name
        , f.accessed_at
    FROM
        engsb.tbx_usage_views_fact_2     f
        JOIN engsb.tbx_user_dmn_2             u ON f.user_id = u.user_id
        LEFT JOIN engsb.tbx_person_registry_fact   r ON upper(TRIM(u.email)) = upper(TRIM(r.email))
                                                      AND r.actv_ind = 'Y'
        LEFT JOIN engsb.tbx_department_dmn         d ON r.department_key = d.department_key
        LEFT JOIN engsb.tbx_person_dmn             pn ON r.person_key = pn.person_key
    WHERE
        r.department_key IN (1, 2, 3, 4, 6, 7, 8)
        AND d.department_name != 'Asset Dev Data Analytics'
), focuscomposites AS (
    -- Aggregates focus-cohort events to view level.
    -- Uses window function to propagate workbook-level totals alongside view-level counts.
    SELECT
        workbook_key
        , view_id
        , COUNT(accessed_at) AS focus_group_view_count
        , SUM(COUNT(accessed_at)) OVER (PARTITION BY workbook_key) AS focus_workbook_visits_count
        , listagg(DISTINCT department_name, ', ') WITHIN GROUP (ORDER BY department_name) AS focus_departments
        , LISTAGG(DISTINCT full_name, ', ') WITHIN GROUP (ORDER BY full_name) AS focus_persons
    FROM FocusGroupDetails
    GROUP BY workbook_key, view_id
), MinMaxMetadata AS (
    -- Population-level min/max for normalizing ratio and visit features.
    -- Only workbooks with ≥10 focus visits are included in normalization range.
    SELECT
        MAX(focus_workbook_visits_count) AS max_visits
        , MIN(ROUND((COALESCE(fc.focus_group_view_count, 0) / NULLIF(ewt.enterprise_workbook_visits_count, 0)) * 100, 2)) AS min_ratio
        , MAX(ROUND((COALESCE(fc.focus_group_view_count, 0) / NULLIF(ewt.enterprise_workbook_visits_count, 0)) * 100, 2)) AS max_ratio
    FROM FocusComposites fc
    JOIN EnterpriseWorkbookTotals ewt ON fc.workbook_key = ewt.workbook_key
    WHERE fc.focus_workbook_visits_count >= 10
), finalviewcalculations AS (
    -- Joins all dimensions; computes per-view ratios and normalized sub-scores.
    -- Workbooks with < 10 focus visits receive 0 for all scored features.
    SELECT
        w.workbook_key
        , v.view_id
        , w.workbook_link
        , p.project_name                                                        AS tableau_workbook_owner
        , w.workbook_name
        , v.view_name
        , CAST(coalesce(fc.focus_departments, 'None') AS VARCHAR2(4000))        AS focus_departments
        , CAST(coalesce(fc.focus_persons, 'None') AS VARCHAR2(4000))            AS focus_persons
        , coalesce(fc.focus_group_view_count, 0)                                AS focus_group_view_count
        , evt.total_ent_view_views                                              AS enterprise_view_usage_count

        -- % of enterprise view hits attributable to the focus cohort
        , round((coalesce(fc.focus_group_view_count, 0) / nullif(evt.total_ent_view_views, 0)) * 100, 2) AS focus_view_importance_ratio

        , coalesce(fc.focus_workbook_visits_count, 0)                           AS focus_workbook_visits_count
        , ewt.enterprise_workbook_visits_count

        -- % of enterprise workbook hits attributable to the focus cohort
        , round((coalesce(fc.focus_workbook_visits_count, 0) / nullif(ewt.enterprise_workbook_visits_count, 0)) * 100, 2) AS focus_workbook_visits_ratio

        -- Decimal form of the same ratio; used directly in composite formula
        , round(coalesce(fc.focus_workbook_visits_count, 0) / nullif(ewt.enterprise_workbook_visits_count, 0), 4) AS focus_alignment_coefficient

        , bc.workbook_nbr_of_views

        -- Step-function effort estimate: view count → labour hours
        , CASE
            WHEN bc.workbook_nbr_of_views <= 5  THEN 80
            WHEN bc.workbook_nbr_of_views <= 10 THEN 160
            WHEN bc.workbook_nbr_of_views <= 15 THEN 240
            WHEN bc.workbook_nbr_of_views <= 20 THEN 320
            ELSE 400
          END AS migration_effort_hours

        -- Normalized effort on [0,1]: maps 80h→0.0, 400h→1.0
        , CASE
            WHEN coalesce(fc.focus_workbook_visits_count, 0) < 10 THEN 0
            ELSE round(((CASE
                            WHEN bc.workbook_nbr_of_views <= 5  THEN 80
                            WHEN bc.workbook_nbr_of_views <= 10 THEN 160
                            WHEN bc.workbook_nbr_of_views <= 15 THEN 240
                            WHEN bc.workbook_nbr_of_views <= 20 THEN 320
                            ELSE 400
                         END) - 80) / 320, 4)
          END AS normalized_effort_hours

        -- Normalized focus visit count: (visits - 10) / (max_visits - 10)
        , CASE
            WHEN coalesce(fc.focus_workbook_visits_count, 0) < 10 THEN 0
            ELSE round((fc.focus_workbook_visits_count - 10)
                       / nullif((SELECT max_visits FROM minmaxmetadata) - 10, 0), 4)
          END AS focus_usage_interest

        -- Normalized view-level focus ratio: (ratio - min_ratio) / (max_ratio - min_ratio)
        , CASE
            WHEN coalesce(fc.focus_workbook_visits_count, 0) < 10 THEN 0
            ELSE round((round((coalesce(fc.focus_group_view_count, 0) / nullif(ewt.enterprise_workbook_visits_count, 0)) * 100, 2)
                        - (SELECT min_ratio FROM minmaxmetadata))
                       / nullif((SELECT max_ratio - min_ratio FROM minmaxmetadata), 0), 4)
          END AS relative_utilization_score

    FROM
        engsb.tbx_usage_views_fact_2   f
        JOIN engsb.tbx_workbook_dmn_2       w ON f.workbook_key = w.workbook_key
        JOIN engsb.tbx_project_dmn          p ON w.project_id = p.project_id
        JOIN engsb.tbx_view_dmn_2           v ON f.view_id = v.view_id AND f.workbook_key = v.workbook_key
        JOIN workbookcomplexity             bc ON w.workbook_key = bc.workbook_key
        JOIN enterpriseworkbooktotals       ewt ON w.workbook_key = ewt.workbook_key
        LEFT JOIN enterpriseviewtotals      evt ON v.workbook_key = evt.workbook_key AND v.view_id = evt.view_id
        LEFT JOIN focuscomposites           fc ON v.workbook_key = fc.workbook_key AND v.view_id = fc.view_id
    WHERE
        upper(p.project_name) != 'TEST'
    GROUP BY
        w.workbook_key, v.view_id, w.workbook_link, p.project_name, w.workbook_name, v.view_name,
        fc.focus_departments, fc.focus_persons, fc.focus_group_view_count, evt.total_ent_view_views,
        fc.focus_workbook_visits_count, ewt.enterprise_workbook_visits_count, bc.workbook_nbr_of_views
), calculatedpriorities AS (
    -- Weighted composite score:
    --   20% normalized effort (cost signal)
    --   30% relative utilization × alignment coefficient
    --   50% focus usage interest × alignment coefficient
    -- Alignment coefficient penalizes workbooks where focus cohort is a minority consumer.
    SELECT
        fvc.*
        , CASE
            WHEN fvc.focus_workbook_visits_count < 10 THEN 0
            ELSE round(
                (0.20 * fvc.normalized_effort_hours)
              + (0.30 * fvc.relative_utilization_score * fvc.focus_alignment_coefficient)
              + (0.50 * fvc.focus_usage_interest       * fvc.focus_alignment_coefficient)
              , 4)
          END AS normalized_effort_usage_utilization
    FROM finalviewcalculations fvc
)
SELECT
    cp.workbook_key
    , cp.view_id
    , cp.workbook_link
    , cp.tableau_workbook_owner
    , cp.workbook_name
    , cp.view_name
    , cp.focus_departments
    , cp.focus_persons
    , cp.focus_group_view_count
    , cp.enterprise_view_usage_count
    , cp.focus_view_importance_ratio
    , cp.focus_workbook_visits_count
    , cp.enterprise_workbook_visits_count
    , cp.focus_workbook_visits_ratio
    , cp.focus_alignment_coefficient
    , cp.workbook_nbr_of_views
    , cp.migration_effort_hours
    , cp.normalized_effort_hours
    , cp.focus_usage_interest
    , cp.relative_utilization_score
    , cp.normalized_effort_usage_utilization

    -- Workbook priority number: max composite across all views in the workbook
    -- (penalized 50% if focus_workbook_visits_ratio < 15%)
    , CASE
        WHEN cp.focus_workbook_visits_count < 10 THEN 0
        WHEN cp.focus_workbook_visits_ratio  < 15 THEN cp.normalized_effort_usage_utilization * 0.5
        ELSE MAX(cp.normalized_effort_usage_utilization) OVER (PARTITION BY cp.workbook_name)
      END AS workbook_priority_number

    -- Priority bucket: 3-level classification
    , CASE
        WHEN cp.focus_workbook_visits_count < 10                                                              THEN 'EXCLUDED'
        WHEN cp.focus_workbook_visits_ratio  < 10                                                             THEN 'ENTERPRISE FUNDING REQ.'
        WHEN MAX(cp.normalized_effort_usage_utilization) OVER (PARTITION BY cp.workbook_name) >= 0.35        THEN 'PRIO 1'
        WHEN MAX(cp.normalized_effort_usage_utilization) OVER (PARTITION BY cp.workbook_name) >= 0.10        THEN 'PRIO 2'
        ELSE 'PRIO 3'
      END AS priority_bucket

    -- Priority tier: 5-level strategic classification
    , CASE
        WHEN cp.focus_workbook_visits_count < 10                                                              THEN 'EXCLUDED'
        WHEN cp.focus_workbook_visits_ratio  < 10                                                             THEN 'TIER 5: ENTERPRISE FUNDING'
        WHEN MAX(cp.normalized_effort_usage_utilization) OVER (PARTITION BY cp.workbook_name) >= 0.40        THEN 'TIER 1: STRATEGIC CORE'
        WHEN MAX(cp.normalized_effort_usage_utilization) OVER (PARTITION BY cp.workbook_name) >= 0.25        THEN 'TIER 2: HIGH UTILITY'
        WHEN MAX(cp.normalized_effort_usage_utilization) OVER (PARTITION BY cp.workbook_name) >= 0.10        THEN 'TIER 3: OPERATIONAL SUPPORT'
        ELSE 'TIER 4: LOW ROI / DEFER'
      END AS priority_tier

FROM calculatedpriorities cp;
