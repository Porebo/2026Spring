# Part 4 - Analysis Work

This part reports the observed results of the methods defined in Part 3. It should show how selection decisions were produced, how conversion quality was evaluated, and how labor constraints affected delivery feasibility.

## 4.1 Analysis Scope and Dataset Snapshot

Analysis in this section used six months of Tableau Server usage data exported in CSV format. The raw usage export contained high-volume event telemetry and was loaded into a normalized analytical database to support repeatable joins, filtering, and workbook-level aggregation. The telemetry window was intentionally bounded to available server history, which created a time-limited but operationally relevant view of current behavior.

At ingestion, the core usage fact captured four key fields: accessed timestamp, user identifier, view identifier, and workbook identifier. In normalized form, these events were represented in ENGSB.TBX_USAGE_VIEWS_FACT and linked to dimensional context through project, workbook, view, and person tables. This structure allowed analysis to move from raw interaction events to business-aligned migration units.

The section analyzes results across two levels simultaneously: view-level activity as observed behavior and workbook-level rollups as the decision unit for migration. This distinction is necessary because the object users open in the interface is often a view, while the conversion workload is planned and executed at workbook level.

Table 4.1 should summarize the dataset at each stage: raw six-month extract, normalized warehouse load, Asset Development focus cohort, and final candidate workbook subset used for prioritization.

## 4.2 Data Preparation and Cohort Construction

Data preparation started by loading Tableau Server CSV extracts into a normalized star-like model. The schema prefix ENGSB refers to the Engineering Sandbox in Oracle, a technical staging space used for analytical input preparation without promoting interim structures into the formal enterprise data warehouse. The main entities were organized as: ENGSB.TBX_PROJECT_DMN (project container), ENGSB.TBX_WORKBOOK_DMN (workbook metadata and project linkage), ENGSB.TBX_VIEW_DMN (view metadata and workbook linkage), ENGSB.TBX_PERSON_DMN (person attributes), and ENGSB.TBX_USAGE_VIEWS_FACT (timestamped access events).

The complete entity-relationship structure of the ENGSB schema, including all tables and foreign-key relationships, is shown in Figure 4.1. The analytical pipeline described in this section depended on eight of those tables. Five provided the core usage and dimensional model:

- ENGSB.TBX_PROJECT_DMN: PROJECT_ID, PROJECT_NAME
- ENGSB.TBX_WORKBOOK_DMN_2: WORKBOOK_KEY, WORKBOOK_NAME, WORKBOOK_LINK, PROJECT_ID
- ENGSB.TBX_VIEW_DMN_2: VIEW_ID, VIEW_NAME, WORKBOOK_KEY
- ENGSB.TBX_PERSON_DMN: PERSON_KEY, FIRST_NAME, LAST_NAME, MIDDLE_INITIAL
- ENGSB.TBX_USAGE_VIEWS_FACT_2: ACCESSED_AT, USER_ID, VIEW_ID, WORKBOOK_KEY

Three additional tables supported identity and department enrichment during cohort construction:

- ENGSB.TBX_USER_DMN_2: USER_ID, EMAIL (gateway between usage events and person records)
- ENGSB.TBX_PERSON_REGISTRY_FACT: EMAIL, PERSON_KEY, DEPARTMENT_KEY, ACTV_IND (active-employee filter and org linkage)
- ENGSB.TBX_DEPARTMENT_DMN: DEPARTMENT_KEY, DEPARTMENT_NAME

The remaining tables in the schema — legacy v1 structures, a company dimension, and Spotfire publication and conversion tracking tables — are visible in Figure 4.1 but were not used in the selection or scoring analysis. The Spotfire and conversion tracking tables (`TBX_SPX_PUBL_DMN`, `TBX_SPX_REPORT_DMN`, `TBX_CONVERSION_STATUS`) support the conversion pipeline and are referenced in later sections.

![Figure 4.1. ENGSB Schema Entity-Relationship Diagram. Full relational structure of the Engineering Sandbox analytical model. Tables used in the selection pipeline are highlighted; Spotfire and conversion tracking tables appear in the lower portion of the diagram.](04_analysisWork_Image_2.png)

Preparation and loading of these data were performed under enterprise security restrictions. Python-based tooling was not permitted in this environment because local Python environment installation was disallowed for safety and compliance reasons. As a result, data engineering for large Tableau Server CSV extracts was implemented with PowerShell scripts that generated SQL INSERT statements directly and loaded them into the Oracle engineering sandbox staging schema.

Because root usage telemetry did not include employee status or department attributes, cohort construction required identity enrichment from organizational sources. USER_ID values were mapped to user accounts and then matched to person and department records to identify current workers in the target organization segment. This enrichment created the focus cohort used for migration prioritization.

After cohort identification, non-analytical support traffic was excluded to avoid inflating business-usage signal with build, correction, or expansion activity. Events were then rolled from view level to workbook level so that ranking and migration decisions reflected true conversion units rather than interface granularity.

Figure 4.1 should show the complete preparation pipeline: CSV extract, normalized load, identity and department enrichment, support-traffic exclusion, and workbook-level aggregation.

## 4.3 Predictive Usage Sustainability Model

Before migration candidates could be ranked by cost-of-conversion relative to anticipated return, a foundational question had to be resolved: how probable is it that each workbook will continue to receive meaningful use after migration? A workbook that ranked high on raw visit counts but had no recent activity, no consistent weekly engagement, and only a single power user would be a poor migration investment regardless of visit volume. Conversely, a workbook that showed rising recent momentum, wide department reach, and habitual weekly access presented a clear future business need. To operationalize this distinction, a dedicated sustainability model was constructed in a database view, `ENGSB.TBX_MAIN_PROBABILITY_FOCUS_2`, which assigned each workbook a forward-looking usage probability score.

### 4.3.1 Dual-Lens Structure

The model established two parallel measurement contexts. Enterprise-level metrics captured usage across all Tableau Server users company-wide over a rolling window of 90 days and 26 weeks, providing a baseline of aggregate activity. Focus-cohort metrics captured the same events restricted to the Asset Development target population after department enrichment and support-traffic exclusion. Measuring both contexts simultaneously was deliberate: a workbook can appear highly active in enterprise statistics while contributing negligibly to the focus population that would actually use the migrated equivalent. Reporting only enterprise metrics would conflate infrastructure investment with department benefit.

### 4.3.2 Feature Engineering and Normalization

Within the focus cohort, four behavioral signals were computed for each workbook and min-max normalized across the scored population so that relative differences drove the model rather than raw magnitude differences across workbooks of vastly different popularity scales.

| Feature | Computation | Interpretation |
|---|---|---|
| Recency strength | Inverted normalized days since last access | Higher = used more recently |
| Persistence strength | Normalized count of distinct active weeks over last 26 weeks | Higher = habitual, calendar-consistent use |
| Adoption strength | Normalized count of distinct users over last 90 days | Higher = broader team reliance |
| Volume strength | Normalized total focus view accesses over last 90 days | Higher = more interactions |

Min-max normalization placed each metric on a [0, 1] scale relative to the range observed across all scored workbooks, preventing any single high-volume workbook from distorting comparisons with smaller but consistently used tools.

A fifth diagnostic signal, the momentum ratio, was also computed as the ratio of focus accesses in the most recent 30 days to focus accesses in the preceding 30 days. A value greater than 1.0 indicates a workbook gaining adoption; a value less than 1.0 signals a workbook in use decline. The momentum ratio was carried forward as a reported attribute for analyst review rather than incorporated into the score itself, preserving transparency about short-term trajectory without overfitting the model to a single recent observation window.

### 4.3.3 Weighted Composite and Alignment Tax

The four normalized features were combined into a weighted composite reflecting their relative importance as sustainability predictors:

$$S_{composite} = (0.40 \times \text{recency}) + (0.30 \times \text{persistence}) + (0.20 \times \text{adoption}) + (0.10 \times \text{volume})$$

Recency received the highest weight because a workbook that has not been accessed recently is a weaker migration candidate regardless of historical traffic. Persistence received the second-highest weight because weekly habitual use is a stronger predictor of future need than clustered episodic use. Adoption and volume received progressively lower weights because a single dedicated user can generate high visit counts, while the deeper risk of over-investing migration effort for narrow audiences was better captured by the ownership ratio described below.

This composite, however, does not account for whether the focus population was actually the primary consumer of a workbook. A workbook belonging to a company-wide Tableau Server project can accumulate thousands of enterprise visits while Asset Development accounts for only a negligible fraction. Migrating such a workbook would benefit other departments at Asset Development's cost. To penalize this misalignment structurally, the composite was multiplied by the focus ownership ratio:

$$\text{Ownership Ratio} = \frac{\text{Focus accesses (last 90d)}}{\text{Enterprise accesses (last 90d)}}$$

$$\text{Probability Score} = S_{composite} \times \text{Ownership Ratio}$$

Any workbook with an ownership ratio below 0.15 — meaning the focus cohort accounted for less than 15 percent of all enterprise access events — was classified separately as an "Enterprise Utility (Free Rider)" regardless of its composite strength, because migrating that workbook would transfer infrastructure cost to the focus team for the operational benefit of other departments.

### 4.3.4 Bucket Classification

Final scores were mapped to four named sustainability classes:

| Classification | Criterion |
|---|---|
| HIGH SUSTAINABILITY | Score ≥ 0.50 |
| MODERATE ADOPTION | Score ≥ 0.25 |
| LOW ADOPTION / STALE | Score < 0.25 |
| ENTERPRISE UTILITY (Free Rider) | Ownership ratio < 0.15 (evaluated before scoring) |
| NOT SCORED | No focus-cohort usage recorded in the window |

Workbooks classified as HIGH SUSTAINABILITY represented the clearest migration investment: recent, habitual, multi-user, and predominantly consumed by the target population. The MODERATE ADOPTION class required additional judgment, particularly when combined with the momentum ratio, to determine whether adoption was growing or declining. LOW ADOPTION / STALE workbooks were candidates for deferral or retirement. The FREE RIDER class flagged a distinct scenario requiring organizational negotiation — another team may depend on those workbooks and would need to either participate in the migration effort or fund an alternative hosting arrangement.

## 4.4 Priority Scoring Implementation

The probability model described in Section 4.3 answered the question of whether a workbook was likely to remain in use. A companion ROI model, implemented as `ENGSB.TBX_MAIN_DETAILED_VIEW_2`, answered the complementary question: if migration proceeds, how much effort is required, and how much business value does the focus cohort derive relative to that cost? Together these two views produced the ranking surface on which migration sequencing decisions were based.

### 4.4.1 Activity Threshold and Cohort Alignment

Before any workbook received a score, it had to clear a minimum activity threshold. Workbooks with fewer than ten focus-cohort access events over the full analysis window were assigned a score of zero and classified as EXCLUDED. This floor prevented low-volume workbooks from receiving misleadingly precise scores based on insufficient evidence.

Beyond the activity floor, workbooks were also subject to an alignment check. If the focus cohort accounted for fewer than ten percent of total enterprise access events for a workbook — meaning that nine of every ten interactions came from outside the target population — the workbook was classified as ENTERPRISE FUNDING REQUIRED rather than scored on the standard scale. The logic is the same as the Free Rider concept in the probability model: migration effort funded by Asset Development should not primarily benefit other departments.

### 4.4.2 Input Features and Normalization

Three scored features were computed for each workbook, all expressed on a [0, 1] scale to make them additive across different orders of magnitude.

**Normalized effort hours** was derived from workbook complexity measured as the count of distinct views (sheets or dashboard tabs) in the workbook. View count was mapped to estimated migration hours through a step function established during initial project planning:

| Views in workbook | Estimated effort |
|---|---|
| ≤ 5 | 80 hours |
| 6 – 10 | 160 hours |
| 11 – 15 | 240 hours |
| 16 – 20 | 320 hours |
| > 20 | 400 hours |

These estimates were then mapped onto [0, 1] by normalizing against the fixed range of 80 to 400 hours: $\frac{h - 80}{320}$. A workbook requiring 80 hours receives a normalized effort score of 0.0; one requiring 400 hours receives 1.0. Effort enters the composite as a cost signal — higher effort slightly rewards workbooks where the investment is proportionate to demonstrated demand.

**Focus usage interest** measured the intensity of focus-cohort engagement relative to the most-engaged workbook in the scored population. It was computed as:

$$\text{Focus Usage Interest} = \frac{\text{focus visits} - 10}{\text{max focus visits} - 10}$$

The denominator was anchored at the minimum qualifying threshold of 10, so the normalization reflected spread within the eligible population rather than from zero. All scored workbooks therefore received a value between 0.0 and 1.0.

**Relative utilization score** measured how concentrated focus-cohort consumption was on a specific view relative to all enterprise access to that workbook. The raw focus view importance ratio — the percentage of enterprise workbook hits attributable to the focus cohort for a given view — was min-max normalized across the scored population. This captured whether the focus group was the primary driver of a view's traffic, not just one of many consumers. The normalization bounds were derived only from workbooks meeting the activity threshold.

### 4.4.3 Focus Alignment Coefficient

The raw feature scores were not multiplied together directly. Each scored feature was first multiplied by the focus alignment coefficient, defined as the decimal ratio of focus-cohort workbook visits to total enterprise workbook visits for that workbook. This coefficient acts as a continuous alignment tax: a workbook where the focus cohort drives 80 percent of traffic receives a coefficient of 0.80 and its utilization and usage-interest terms are carried at full weight; a workbook where the focus cohort drives only 20 percent of traffic receives 0.20, significantly discounting those terms regardless of raw visit volumes.

Normalized effort was not multiplied by the alignment coefficient because effort is a property of the workbook structure, not of who uses it. Effort cost exists regardless of consumption distribution.

### 4.4.4 Weighted Composite Score

The three features were combined into a weighted composite using weights determined to reflect their relative importance as migration investment predictors:

$$\text{Score} = (0.20 \times \text{Effort}) + (0.30 \times \text{Utilization} \times \text{Alignment}) + (0.50 \times \text{Usage Interest} \times \text{Alignment})$$

Focus usage interest received the highest weight (50 percent) because sustained volumetric engagement from the focus cohort is the strongest observable signal that a workbook serves an ongoing operational need. Relative utilization received 30 percent because per-view concentration indicates that the focus population is actively seeking out specific analytical outputs rather than incidentally browsing. Normalized effort received 20 percent as a cost-proportionality signal, not as a quality signal — high effort is not inherently good, but a high-effort workbook with strong demand represents a larger embedded institutional knowledge investment.

The composite was computed at view level but then projected to workbook level through a windowed maximum over all views in the same workbook. This ensured that a workbook was ranked by its strongest view rather than an average of all views, which is appropriate because migration of a workbook migrates all of its views as a unit regardless of which view drove the justification.

### 4.4.5 Bucket and Tier Assignment

Workbooks were classified on two parallel scales. The three-level priority bucket guided scheduling and resource allocation:

| Priority Bucket | Criterion |
|---|---|
| PRIO 1 | Workbook score ≥ 0.35 |
| PRIO 2 | Workbook score ≥ 0.10 |
| PRIO 3 | Workbook score < 0.10 |
| ENTERPRISE FUNDING REQ. | Focus visits ratio < 10% (pre-score) |
| EXCLUDED | Focus visits < 10 (pre-score) |

The five-level strategic tier provided finer classification for roadmap planning and stakeholder communication:

| Strategic Tier | Criterion |
|---|---|
| TIER 1: STRATEGIC CORE | Score ≥ 0.40 |
| TIER 2: HIGH UTILITY | Score ≥ 0.25 |
| TIER 3: OPERATIONAL SUPPORT | Score ≥ 0.10 |
| TIER 4: LOW ROI / DEFER | Score < 0.10 |
| TIER 5: ENTERPRISE FUNDING | Focus visits ratio < 10% (pre-score) |

A workbook that cleared the activity threshold but had a focus-visits ratio between 10 and 15 percent received a 50 percent haircut on its composite score before bucket assignment, functioning as a soft penalty that placed borderline alignment cases lower on the ranking without excluding them outright. This was distinct from the hard exclusion applied below the 10 percent threshold.

## 4.5 Selection Results

The filtering and scoring pipeline produced a sharp reduction in candidate scope. Beginning with the full Asset Development project universe from Tableau Server, the first gate applied a validity check: only workbooks with recorded access from users who were current, active employees working in the target organization segments were retained. This excluded test workbooks, administrative artifacts, and reports used only by personnel outside the focus scope. After this validity filter, **660 workbooks remained** as candidates for detailed scoring.

The two scoring models — the predictive usage sustainability model of Section 4.3 and the ROI priority model of Section 4.4 — were applied sequentially to these 660 workbooks. The probability model classified each by its forward-usage likelihood (HIGH SUSTAINABILITY, MODERATE ADOPTION, LOW ADOPTION/STALE, ENTERPRISE UTILITY, or NOT SCORED). The ROI priority model assigned each to one of three priority buckets (PRIO 1, PRIO 2, PRIO 3) or the EXCLUDED/ENTERPRISE FUNDING categories.

However, numerical scoring alone was insufficient. Following best practices for selection in organizational contexts, direct user validation was conducted: subject-matter experts and department leadership were asked to review the model's top-ranked recommendations and to flag workbooks that, despite high scores, were not actively used or were not critical to departmental processes. This validation step confirmed—and in some cases corrected—the automated ranking.

The convergence of these three signals (probability scoring, ROI priority scoring, and expert validation) identified a core set of migration candidates: **20 workbooks** that scored in the HIGH SUSTAINABILITY or MODERATE ADOPTION categories, ranked PRIO 1 or PRIO 2 in the ROI model, and were confirmed by users as critical to ongoing Asset Development operations. These 20 workbooks formed the executable scope for the migration project.

To enable ongoing analysis, detailed tracking, and stakeholder visibility, a comprehensive Spotfire dashboard was constructed within the ENGSB analytics environment. This dashboard, shown in Figure 4.2, presents the complete selection results across multiple dimensions: the distribution of the 660 candidate workbooks across priority buckets and tiers, the alignment between the historical priority rankings and the new probability-based forecasts, the effort estimates for each workbook, and real-time tracking of conversion status for the 20 selected workbooks. The dashboard also links each workbook to its source Tableau report and, once migration commences, to its corresponding Spotfire publication. This dual-link architecture enables rapid traceability and validation during the conversion workflow.

![Figure 4.2. Selection Results Dashboard. Spotfire analytics environment showing the distribution of 660 evaluated workbooks across priority categories, the relationship between historical rankings and forward-usage probability, the 20 selected high-value candidates, and real-time conversion status tracking. Each report record links to source Tableau and destination Spotfire publications for workflow traceability.](04_analysisWork_Image_1.png)

## 4.6 Conversion Fidelity Findings

Before committing the 20 selected workbooks to the conversion backlog, each had to be assessed for reconstruction complexity and data-availability risk. To accomplish this at scale without requiring manual inspection of 20 separate Tableau packaged files, an AI-assisted discovery workflow was designed. The workflow opened each `.twbx` package file, extracted the embedded Tableau workbook definition (`.twb`) and any packaged extract files (`.hyper`), parsed the XML structure, and generated a machine-readable inventory of datasources, joins, worksheets, dashboards, filters, calculated fields, and interactive actions. This automation dramatically reduced the time-to-inventory compared to manual inspection, while the generated discovery reports were designed as **handoff documents** — sufficient for a human reviewer to quickly understand the workbook's structure and identify ambiguous or high-effort components.

### 4.6.1 Automated Discovery Completeness

The AI discovery process reliably captured:

- **Datasource structure**: Number of embedded SQL queries, custom joins, join keys, and source field mappings. For example, a workbook combining production and injection data exposed that two custom SQL queries were joined on date and reservoir segment, and the inventory of source fields (effective date, completion name, injection volume, temperature, pressure, production volume) was extracted directly.
- **Sheet and dashboard inventory**: The count and names of all worksheets and dashboards. A typical example showed three worksheets (one support sheet for filters, two analytical sheets) and three dashboards (one informational page, two analytical boards).
- **Filters and actions**: Shared and local filter declarations, their target fields, and data types. Interactive highlight actions were identified by their trigger type (`on-select`) and target dashboard zones.
- **Calculated fields**: Any Tableau formula definitions embedded in the workbook XML.
- **Packaged data**: The presence, name, and type of extract files accompanying the workbook.

This structured output was always presented in three forms: (1) a machine-readable JSON summary suitable for database import; (2) a detailed markdown handoff document for engineer review; and (3) an HTML visual summary for stakeholder and SME review.

### 4.6.2 What Required Manual Clarification

Despite the completeness of structural discovery, several categories of information required human review:

- **Visual encoding intent**: The XML disclosed that a worksheet had dates on columns and stacked measures on rows, but did not reliably infer whether the stacking was intentional for comparison, a legacy artifact, or a workaround for Spotfire layout constraints. SME review of the workbook screenshot was required to confirm visual purpose.
- **Sorting, formatting, and tooltips**: Default sort orders, font choices, number formats, and custom tooltip text live in workbook properties that the XML parsing captured textually but not semantically. A rebuild in Spotfire required explicit decisions about which formatting choices to preserve and which to modernize.
- **Filter behavior and dependencies**: While the discovery identified that multiple filters existed, their cascade behavior, default values, and implicit dependencies on worksheet context required manual testing in Tableau before Spotfire implementation.
- **Layout and responsive sizing**: Tableau dashboards are often built at fixed sizes (e.g., 1000 × 800 pixels); Spotfire supports fluid layouts. A decision was required for each dashboard about whether to preserve the fixed layout for pixel-perfect fidelity or adapt to Spotfire's native responsive design.

### 4.6.3 Typical Tableau-to-Spotfire Divergence Points

The conversion assessment identified several systematic patterns where Tableau and Spotfire approaches diverged:

**Data connectivity:** Tableau workbooks relied on embedded custom SQL queries within the workbook definition; Spotfire enforces data-source separation, requiring that all SQL be migrated to the database layer or a managed Spotfire data table. Workbooks with complex multi-table joins and dynamic calculated fields (e.g., conditional aggregations depending on filter state) required careful translation to ensure equivalent logic could be expressed in Spotfire's data wrangling layer before visualization.

**Interactive actions:** Tableau's action framework (highlight, filter, URL) is workbook-embedded; Spotfire's equivalent uses distinct action definitions with explicit source and target zones. This required one-to-one translation of action trigger logic and a careful review of cascading behaviors when multiple actions chained together.

**Calculated fields:** Tableau's formula syntax is specific to Tableau's type system and aggregation semantics. Spotfire supports calculated columns (during data load) and custom expressions (in visualizations), but the optimal translation point (load-time or query-time) required domain review to avoid performance or correctness trade-offs.

**Layout constraints:** Tableau's container-based layout model differs from Spotfire's zone-based arrangement. Workbooks with deeply nested containers or complex floating layouts required rebuilding rather than direct conversion.

### 4.6.4 Discovery Outcome and Reconstruction Path

Across the 20 selected workbooks, the AI discovery process generated a complete inventory of structural and logical components. Each workbook was then classified into one of three reconstruction paths:

1. **Direct rebuild**: Workbooks with simple datasources (single query or straightforward join), few calculated fields, and standard filter patterns could be rebuilt in Spotfire by translating the discovered structure directly.
2. **SME-assisted rebuild**: Workbooks with moderate complexity, bespoke calculated logic, or heavy reliance on Tableau-specific features required SME review of the discovery report to resolve ambiguities before rebuilding began.
3. **Deferred or alternative**: A small number of workbooks were identified as candidates for phased deferral or alternative presentation in the new Spotfire environment, pending business prioritization.

The discovery reports, together with screenshots and business context from the selection phase, formed the complete handoff package to the conversion team. This structure ensured that conversion could begin immediately without a separate analysis phase, while preserving the ability to escalate unforeseen technical issues as they arose during rebuild.

## 4.7 Labor and Feasibility Analysis

Selection and discovery work produced a clear backlog of 20 workbooks ready for conversion. Whether that backlog could be delivered before the 2026 Tableau license sunset was an entirely separate question, driven not by the technical scope of the reports but by the human capacity available to build them.

### 4.7.1 Team Composition and Participation Mode

The conversion team was assembled from existing personnel across two legacy organizations. On the CRC Asset Development Data Analytics side, the team included one Spotfire platform expert and one junior Spotfire developer. From the former Aera organization, the team included two Tableau developers with deep knowledge of the existing report library but no prior Spotfire development experience, two business subject-matter experts who provided operational context and user validation but held no development role, and the team lead — the only member assigned to the program full-time.

All other team members carried concurrent responsibilities. The CRC Spotfire developers were simultaneously supporting the broader CRC platform and other integration work. The former Aera developers were engaged in ongoing Aera-to-CRC operational integration activities. This part-time participation structure compressed the realistic weekly development hours available to the conversion program and created scheduling dependencies that affected review cycles, SME availability, and testing timelines.

### 4.7.2 Upskilling and Knowledge Transfer

Because the two former Aera developers arrived with no Spotfire experience, a parallel upskilling track operated alongside active conversion work. The challenge was compounded by a structural asymmetry in platform training accessibility. Tableau offers a broad ecosystem of publicly available training — official courses, community tutorials, certification programs, and documentation — all accessible without vendor negotiation. Spotfire's business model is oriented toward large enterprise clients, and formal training is not available through public channels. Access to structured Spotfire instruction requires direct engagement and contract negotiation with the vendor, a process that was still in progress during the active conversion period.

As a result, the upskilling approach was constrained to what internal resources could provide: peer instruction from the CRC Spotfire expert, self-directed exploration of the platform, and learning embedded in live conversion work. There was no dedicated training period; developers were expected to build functional Spotfire competency while simultaneously contributing to deliverables. This approach preserved program momentum but introduced quality risk in early deliverables and extended the effective ramp time, as developers worked through platform differences through iteration and correction rather than structured instruction.

The absence of formal Spotfire training access is not a temporary inconvenience but a persistent structural constraint. As long as vendor negotiations remain incomplete, any new developer joining the program faces the same steep self-directed ramp. This creates a single-dependency risk on the existing Spotfire expert as the de facto training resource — a dependency that compounds the bottleneck already created by that individual's part-time participation.

### 4.7.3 Large Dataset Performance as a Technical Bottleneck

A recurring and materially significant obstacle was the behavioral difference between Tableau and Spotfire when handling large datasets. Once a dataset exceeded approximately 500,000 rows, Spotfire's in-memory engine imposed substantial memory pressure during load, causing degraded performance in the web-delivered Spotfire Web Player environment used for all published reports. Tableau, by contrast, had handled similarly large extracts with less visible memory overhead in client-mode rendering.

This forced the conversion team to identify and apply technical workarounds on a per-report basis. The primary mitigation was cascading-parameter query patterns — pre-filtering data at the database layer before loading into Spotfire, so that the in-memory footprint remained within acceptable bounds. While effective, this approach required additional design and testing time for each affected report, and in some cases required coordination with database administrators to support query restructuring. The workarounds succeeded, but each added to the per-report effort beyond what the initial complexity-based effort estimates had anticipated.

### 4.7.4 Capacity Gap and Contractor Engagement

The cumulative effect of part-time participation, upskilling overhead, and per-report technical mitigation work created a visible gap between planned throughput and feasible throughput. Given the hard December 2026 license expiration, allowing this gap to persist carried the risk of a compressed delivery period later in the year, potential license extension costs, or loss of reporting continuity for owning engineering teams.

To close this gap without further loading the internal team — which was simultaneously supporting BRY integration and increased drilling permit activity — a managed contractor engagement was approved and initiated. The engagement targeted three specific priority reports representing eight underlying dashboards: the SA PROCESS High Water Cut List (owned by Thermal RMT), the Goldman Run Ticket (owned by Thermal RMT), and the West Flank Disposal Temperature Survey (owned by Asset Strategy).

These three reports were selected because each served a distinct operational decision pathway with no viable manual fallback: the High Water Cut List identifies wells whose rising water cut signals production maintenance candidates; the Goldman Run Ticket provides monthly production and volume balance summaries against planned targets; and the West Flank Temperature Survey monitors mechanical integrity on disposal wells by comparing current and prior temperature profiles. Conservative scoping estimated approximately 240 effort-hours to convert all three, representing a workload that a single experienced contractor could complete within one fixed month at a cost of $4,400 USD under a standard monthly engagement rate.

The contractor engagement was structured around two explicit acceptance gates for each delivered report. Technical sign-off required that the report load within acceptable performance bounds, draw from live corporate databases with automatic refresh, and be documented sufficiently for maintenance by internal personnel. User sign-off required formal acceptance by the owning engineering team — Thermal RMT or Asset Strategy as applicable — with any in-scope modifications or reasonable scope expansions handled within the engagement period before handoff.

This phased delegation model — internal team handling the higher-complexity analytical workbooks while a specialized contractor handled three technically bounded but time-sensitive reports — allowed the program to maintain forward momentum on both tracks simultaneously, reduce end-of-year compression risk, and preserve internal team capacity for integration priorities without creating a reporting continuity gap for the operational teams that depended on these workflows.

## 4.8 Integrated Findings Across Selection, Conversion, and Labor

The three analytical pipelines described in this part — usage-based selection, AI-assisted workbook discovery, and labor feasibility assessment — were designed independently but produced findings that shaped each other. This section synthesizes the cross-cutting patterns that emerged when those findings were considered together.

**Selection signal was a necessary but not sufficient predictor of conversion priority.** The probability and ROI scoring models converged on a set of 20 workbooks with demonstrated focus-cohort demand, forward-usage sustainability, and justifiable migration investment. However, high selection scores did not automatically translate to early scheduling. Two additional constraints intervened. First, conversion complexity varied significantly within the high-priority set: some TIER 1 workbooks contained complex multi-table custom SQL, cascading filter logic, and interaction models that required more time than their view count alone suggested. Second, labor availability was uneven across the team, meaning the highest-scoring workbooks were not always the first to enter active development.

**Labor constraints reordered the backlog more than technical complexity did.** The combination of part-time participation, concurrent integration obligations, and the absence of formal Spotfire training access created a delivery rate significantly below what a fully dedicated team would achieve. Within that constrained throughput, sequencing decisions were made pragmatically: workbooks assigned to team members with stronger Spotfire familiarity were progressed first, while workbooks requiring the deepest Tableau-specific knowledge translation were deferred pending upskilling progress. This means that the delivered sequence reflected team capability at a point in time as much as it reflected business priority rank — a finding with direct implications for how staffing should be planned in future migration programs of this type.

**The Spotfire training access gap introduced a structural risk not present for Tableau migrations.** The contrast between Tableau's open training ecosystem and Spotfire's enterprise-negotiated access model is not a minor inconvenience — it is a material program risk. Teams migrating from Tableau to Spotfire arrive at a skill asymmetry: deep Tableau competence built through years of accessible public instruction on one side, and a Spotfire platform that offers no comparable public learning path on the other. The single in-house Spotfire expert effectively became both the platform lead and the training institution, creating a concentration of dependency that constrained throughput regardless of how well the selection and discovery work was executed.

**Multi-source validation improved decision quality at the selection stage.** The combination of quantitative scoring (probability model + ROI model) with direct user validation prevented two categories of error: workbooks with strong historical visit counts but no ongoing operational relevance would have been over-prioritized by scoring alone; workbooks with moderate scores but critical and irreplaceable workflow roles would have been under-prioritized. The user validation step — consulting subject-matter experts from Thermal RMT, Asset Strategy, and other owning teams — added a qualitative signal that the usage data could not fully capture. The resulting 20-workbook scope reflects a higher-confidence selection than either model alone could have produced.

**The contractor engagement demonstrates the viability of phased delegation.** The decision to engage a specialized contractor for three operationally critical but technically bounded reports (8 dashboards, approximately 240 estimated effort-hours) validated a model for managing scope beyond internal capacity without sacrificing delivery quality. The two-gate acceptance structure — technical sign-off followed by user sign-off — ensured that delegated work met the same quality standard as internally developed conversions. This model is directly replicable for future phases as the Tableau sunset deadline in December 2026 approaches.

## 4.9 Limitations of the Analysis

Several methodological boundaries constrain the strength of conclusions that can be drawn from this analysis.

**Telemetry window length.** The six-month usage window captures current behavior but cannot account for historically significant reports that are infrequently accessed during normal operations but activated during critical events — well shutdowns, regulatory audits, or production anomalies. A workbook used only during quarterly planning cycles or emergency response could score as LOW ADOPTION or NOT SCORED despite being operationally critical. The user validation step partially mitigates this risk, but cannot guarantee identification of every edge case.

**Organizational enrichment quality.** Cohort construction depended on matching Tableau Server user identifiers to active employee and department records through email-based joins across multiple tables. The accuracy of this enrichment was contingent on the completeness and currency of the person registry data. Former employees not yet removed from active records, contractors without consistent email formats, or employees who accessed reports through shared accounts would introduce noise into the focus-cohort definition, potentially misclassifying usage as focus or non-focus.

**Normalization sensitivity.** Min-max normalization is sensitive to outliers at both ends of the population. A single workbook with an extreme visit count sets the ceiling for the entire population's normalized scores, compressing the range for all others. This means the relative differences between mid-range workbooks may be smaller in practice than the normalized values suggest, and small changes in the top or bottom of the population could shift bucket assignments for borderline cases.

**Labor and throughput observation limits.** The feasibility analysis was conducted against a team that was simultaneously ramping up on a new platform, working part-time, and operating under vendor negotiation constraints for formal training. Throughput observations from this period reflect an immature-team baseline rather than a steady-state delivery rate. Projections from this data will likely underestimate what the same team could achieve once upskilling is complete and training access is formalized — but they may also underestimate ongoing risk if training negotiations are not resolved before the license deadline.

**Contractor scope boundaries.** The three reports assigned to contractor conversion represent a curated subset of the 20-workbook scope. The findings from those conversions — including any technical obstacles, data availability issues, or user sign-off complications — are not yet available as of this writing and will inform future phases rather than the analysis reported here.

## 4.10 From Analysis to Governance

The analysis documented in Part 4 demonstrates that a data-driven, multi-stage pipeline can be constructed to make defensible, evidence-based decisions about which reports to migrate, in what order, and under what resource constraints — even in a complex organizational environment shaped by acquisition, compressed timelines, and constrained technical capacity. The selection models distilled 660 candidate workbooks down to a validated set of 20. The AI-assisted discovery workflow translated those 20 workbooks into actionable conversion packages. The labor analysis produced an honest accounting of what internal capacity could deliver and where delegation was necessary.

What the analysis also surfaces, however, are risks and questions that belong to the domain of governance rather than data science. The concentration of platform expertise in a single team member, the absence of formal Spotfire training access, the dependence on a hard license expiration to force organizational action, and the use of AI to make consequential decisions about which institutional knowledge assets to preserve — each of these carries implications that extend beyond the technical pipeline into questions of organizational ethics, knowledge stewardship, and responsible automation.

Part 5 takes up those questions directly. It examines what the findings mean for the sustainability of enterprise knowledge embedded in analytical tools, how AI-assisted decision-making in migration contexts should be governed and disclosed, and what risks remain unresolved as the program enters its next phase.
