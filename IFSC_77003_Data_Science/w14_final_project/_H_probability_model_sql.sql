-- ============================================================
-- Predictive Usage Sustainability Model
-- View: engsb.tbx_main_probability_focus_2
-- Created by Lester S. Carcamo, March 2, 2026
-- Purpose: Scores each Tableau workbook for future usage
--          sustainability within the Asset Development focus
--          group, applying an ownership-ratio alignment tax
--          to penalize "free rider" workbooks used primarily
--          by non-focus departments.
-- ============================================================

CREATE OR REPLACE VIEW engsb.tbx_main_probability_focus_2 (
    workbook_link
    , tableau_workbook_owner
    , workbook_name
    , workbook_nbr_of_views
    , ent_last_view_accessed_at
    , ent_days_since_last_view_access
    , ent_view_accesses_last_30
    , ent_view_accesses_last_90
    , ent_unique_users_last_90
    , ent_active_weeks_last_26
    , focus_last_view_accessed_at
    , focus_days_since_last_view_access
    , focus_view_accesses_last_30
    , focus_view_accesses_last_90
    , focus_active_weeks_last_26
    , focus_unique_users_last_90
    , focus_unique_depts_last_90
    , focus_depts_last_90
    , focus_persons_last_90
    , focus_momentum_ratio
    , focus_future_usage_probability_score
    , focus_future_usage_probability_bucket
    , workbook_key
    , focus_ownership_ratio
) AS WITH workbookdim AS (
    SELECT
        w.workbook_key
        , w.workbook_link
        , w.workbook_name
        , p.project_name AS tableau_workbook_owner
    FROM
        engsb.tbx_workbook_dmn_2   w
        JOIN engsb.tbx_project_dmn      p ON w.project_id = p.project_id
    WHERE
        upper(p.project_name) != 'TEST'
), workbookcomplexity AS (
    SELECT
        workbook_key
        , COUNT(view_id) AS workbook_nbr_of_views
    FROM
        engsb.tbx_view_dmn_2
    GROUP BY
        workbook_key
), enterpriseusage AS (
    SELECT
        f.workbook_key
        , MAX(f.accessed_at) AS ent_last_view_accessed_at
        , trunc(sysdate) - trunc(MAX(f.accessed_at)) AS ent_days_since_last_view_access
        , SUM(
            CASE
                WHEN f.accessed_at >= sysdate - 30 THEN 1
                ELSE 0
            END
        ) AS ent_view_accesses_last_30
        , SUM(
            CASE
                WHEN f.accessed_at >= sysdate - 90 THEN 1
                ELSE 0
            END
        ) AS ent_view_accesses_last_90
        , COUNT(DISTINCT
            CASE
                WHEN f.accessed_at >= sysdate - 90 THEN f.user_id
            END
        ) AS ent_unique_users_last_90
        , COUNT(DISTINCT
            CASE
                WHEN f.accessed_at >= sysdate -(7 * 26) THEN to_char(f.accessed_at, 'IYYY-IW')
            END
        ) AS ent_active_weeks_last_26
    FROM
        engsb.tbx_usage_views_fact_2 f
    GROUP BY
        f.workbook_key
), focususagedetails AS (
    SELECT
        f.workbook_key
        , f.accessed_at
        , f.user_id
        , d.department_name
        , pn.first_name || ' ' || pn.last_name AS full_name
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
), focusworkbookfeatures AS (
    SELECT
        fud.workbook_key
        , MAX(fud.accessed_at) AS focus_last_view_accessed_at
        , trunc(sysdate) - trunc(MAX(fud.accessed_at)) AS focus_days_since_last_view_access
        , SUM(CASE WHEN fud.accessed_at >= sysdate - 30 THEN 1 ELSE 0 END) AS focus_view_accesses_last_30
        , SUM(CASE WHEN fud.accessed_at >= sysdate - 90 THEN 1 ELSE 0 END) AS focus_view_accesses_last_90
        , SUM(CASE WHEN fud.accessed_at >= sysdate - 30 THEN 1 ELSE 0 END) AS focus_views_recent_30
        , SUM(CASE WHEN fud.accessed_at < sysdate - 30 AND fud.accessed_at >= sysdate - 60 THEN 1 ELSE 0 END) AS focus_views_prior_30
        , COUNT(DISTINCT CASE WHEN fud.accessed_at >= sysdate -(7 * 26) THEN to_char(fud.accessed_at, 'IYYY-IW') END) AS focus_active_weeks_last_26
        , COUNT(DISTINCT CASE WHEN fud.accessed_at >= sysdate - 90 THEN fud.user_id END) AS focus_unique_users_last_90
        , COUNT(DISTINCT CASE WHEN fud.accessed_at >= sysdate - 90 THEN fud.department_name END) AS focus_unique_depts_last_90
        , listagg(DISTINCT CASE WHEN fud.accessed_at >= sysdate - 90 THEN fud.department_name END, ', ') WITHIN GROUP (ORDER BY 1) AS focus_depts_last_90
        , LISTAGG(DISTINCT CASE WHEN fud.accessed_at >= SYSDATE - 90 THEN fud.full_name END, ', ') WITHIN GROUP (ORDER BY 1) AS focus_persons_last_90
    FROM FocusUsageDetails fud
    GROUP BY fud.workbook_key
), MinMax AS (
    SELECT
        MIN(focus_days_since_last_view_access) AS min_days_since
        , MAX(focus_days_since_last_view_access) AS max_days_since
        , MIN(focus_view_accesses_last_90) AS min_views_90
        , MAX(focus_view_accesses_last_90) AS max_views_90
        , MIN(focus_active_weeks_last_26) AS min_active_weeks_26
        , MAX(focus_active_weeks_last_26) AS max_active_weeks_26
        , MIN(focus_unique_users_last_90) AS min_unique_users_90
        , MAX(focus_unique_users_last_90) AS max_unique_users_90
    FROM FocusWorkbookFeatures
), focusscored AS (
    SELECT
        f.*
        -- Recency: inverted so higher = more recently used
        , 1 - ((f.focus_days_since_last_view_access - (SELECT min_days_since FROM minmax))
               / nullif((SELECT max_days_since - min_days_since FROM minmax), 0)) AS focus_recency_strength
        -- Volume: normalized 90-day hits
        , (f.focus_view_accesses_last_90 - (SELECT min_views_90 FROM minmax))
          / nullif((SELECT max_views_90 - min_views_90 FROM minmax), 0) AS focus_usage_strength_90
        -- Persistence: normalized active weeks
        , (f.focus_active_weeks_last_26 - (SELECT min_active_weeks_26 FROM minmax))
          / nullif((SELECT max_active_weeks_26 - min_active_weeks_26 FROM minmax), 0) AS focus_persistence_strength
        -- Adoption: normalized unique users
        , (f.focus_unique_users_last_90 - (SELECT min_unique_users_90 FROM minmax))
          / nullif((SELECT max_unique_users_90 - min_unique_users_90 FROM minmax), 0) AS focus_adoption_strength
        -- Momentum: recent 30d vs prior 30d ratio (>1 = growing, <1 = fading)
        , (f.focus_views_recent_30 / nullif(f.focus_views_prior_30, 0)) AS focus_momentum_ratio
    FROM focusworkbookfeatures f
), focusfinalprob AS (
    SELECT
        s.*
        -- Ownership ratio (alignment tax denominator)
        , (s.focus_view_accesses_last_90 / nullif(eu.ent_view_accesses_last_90, 0)) AS focus_ownership_ratio
        -- Final score: weighted composite * ownership ratio
        , round(
            ((0.40 * coalesce(s.focus_recency_strength, 0))
           + (0.30 * coalesce(s.focus_persistence_strength, 0))
           + (0.20 * coalesce(s.focus_adoption_strength, 0))
           + (0.10 * coalesce(s.focus_usage_strength_90, 0)))
            * (s.focus_view_accesses_last_90 / nullif(eu.ent_view_accesses_last_90, 0))
          , 4) AS focus_future_usage_probability_score
    FROM focusscored s
    JOIN enterpriseusage eu ON s.workbook_key = eu.workbook_key
)
SELECT
    wd.workbook_link
    , wd.tableau_workbook_owner
    , wd.workbook_name
    , bc.workbook_nbr_of_views
    , eu.ent_last_view_accessed_at
    , eu.ent_days_since_last_view_access
    , eu.ent_view_accesses_last_30
    , eu.ent_view_accesses_last_90
    , eu.ent_unique_users_last_90
    , eu.ent_active_weeks_last_26
    , fp.focus_last_view_accessed_at
    , fp.focus_days_since_last_view_access
    , fp.focus_view_accesses_last_30
    , fp.focus_view_accesses_last_90
    , fp.focus_active_weeks_last_26
    , fp.focus_unique_users_last_90
    , fp.focus_unique_depts_last_90
    , coalesce(fp.focus_depts_last_90, 'None') AS focus_depts_last_90
    , coalesce(fp.focus_persons_last_90, 'None') AS focus_persons_last_90
    , fp.focus_momentum_ratio
    , fp.focus_future_usage_probability_score
    , CASE
        WHEN fp.workbook_key IS NULL                         THEN 'NOT SCORED (no focus usage)'
        WHEN fp.focus_ownership_ratio < 0.15                THEN 'ENTERPRISE UTILITY (Free Rider)'
        WHEN fp.focus_future_usage_probability_score >= 0.50 THEN 'HIGH SUSTAINABILITY'
        WHEN fp.focus_future_usage_probability_score >= 0.25 THEN 'MODERATE ADOPTION'
        ELSE                                                      'LOW ADOPTION / STALE'
      END AS focus_future_usage_probability_bucket
    , wd.workbook_key
    , fp.focus_ownership_ratio
FROM
    workbookdim          wd
    LEFT JOIN workbookcomplexity   bc ON wd.workbook_key = bc.workbook_key
    LEFT JOIN enterpriseusage      eu ON wd.workbook_key = eu.workbook_key
    LEFT JOIN focusfinalprob       fp ON wd.workbook_key = fp.workbook_key;

COMMENT ON TABLE engsb.tbx_main_probability_focus_2 IS
    'Predictive Usage Sustainability View. Created by Lester S. Carcamo on March 2, 2026. This model applies a "Free Rider" alignment tax to penalize workbooks used primarily by non-focus entities, identifying the true long-term value for the Focus Group.';

COMMENT ON COLUMN engsb.tbx_main_probability_focus_2.ent_view_accesses_last_90 IS
    'Total Enterprise-wide hits. Used as the denominator for the Focus Ownership Ratio.';

COMMENT ON COLUMN engsb.tbx_main_probability_focus_2.ent_active_weeks_last_26 IS
    'Consistency check: Number of distinct weeks accessed across the entire company over the last 6 months.';

COMMENT ON COLUMN engsb.tbx_main_probability_focus_2.focus_active_weeks_last_26 IS
    'Focus Group Consistency: High values indicate the tool is a part of the teams weekly habit.';

COMMENT ON COLUMN engsb.tbx_main_probability_focus_2.focus_momentum_ratio IS
    'Growth Index: (Hits Last 30d / Hits Prior 30d). > 1.0 indicates increasing adoption; < 1.0 indicates fading interest.';

COMMENT ON COLUMN engsb.tbx_main_probability_focus_2.focus_future_usage_probability_score IS
    'Weighted Sustainability Index (0.0 to 1.0). Weighted: 40% Recency, 30% Persistence, 20% Adoption, 10% Volume — then multiplied by Ownership Ratio.';

COMMENT ON COLUMN engsb.tbx_main_probability_focus_2.focus_future_usage_probability_bucket IS
    'Strategic Classification: HIGH (Sustainable), MODERATE (Risk), LOW (Stale), or ENTERPRISE UTILITY (Free Rider).';

COMMENT ON COLUMN engsb.tbx_main_probability_focus_2.workbook_key IS
    'Primary Surrogate Key for joins with TBX_MAIN_DETAILED_2 ROI analysis.';

COMMENT ON COLUMN engsb.tbx_main_probability_focus_2.focus_ownership_ratio IS
    'The Alignment Tax: (Focus Hits / Enterprise Hits). Values < 0.15 flag "Free Rider" workbooks where we provide the tech but others get the benefit.';
