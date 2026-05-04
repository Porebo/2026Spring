# Part 3 — Data Selection, Research Design, and Methods

## Problem Framing

This section addresses three linked problems created by the post-acquisition Tableau™-to-Spotfire™ transition.

1. **Portfolio-scale selection challenge.** The organization holds more than 1,000 Tableau™ reports, but migration resources are limited. As a result, not all reports can be converted at once, and the team must determine which reports should be migrated first, deferred, or retired.

2. **Platform-conversion challenge.** Tableau™ and Spotfire™ overlap in some capabilities but diverge in others, especially in advanced calculation logic, interaction behavior, and dashboard design patterns. This creates uncertainty about what can be directly translated versus what must be adapted or redesigned.

3. **Technical labor constraint.** Performing the migration requires practitioners who hold working knowledge of both platforms simultaneously — understanding what a Tableau™ report is doing analytically and knowing how to reproduce or adapt that behavior in Spotfire™. This dual-platform expertise is uncommon. Most analysts specialize in one tool or the other, and the window of overlap — where staff are actively fluent in Tableau™ while also developing Spotfire™ competency — is narrow and organizationally fragile. As Tableau™ access is reduced and Spotfire™ becomes the standard, institutional familiarity with Tableau™ erodes, making the conversion window progressively harder to execute without documented specifications or AI-assisted discovery.

Together, these three constraints define the core research and methods problem for Part 3: how to make defensible migration decisions at scale while preserving decision-support value and minimizing institutional knowledge loss, within the limits of available expertise.

## 3.1 The Selection Pipeline

The selection pipeline addresses the first problem: reducing an enterprise-scale portfolio of Tableau™ reports to a workable, prioritized set for migration. Given that the organization holds more than 1,000 Tableau™ reports spanning all business units, migrating the full portfolio at once is not feasible. The selection pipeline applies successive filters to identify which reports should be migrated now, deferred for a later phase, or retired entirely.

### 3.1.1 First-Level Filter: Department Scope

The initial constraint on the selection pipeline was established by management direction. Leadership within the Asset Development department designated that function as the primary migration target. All other departments were explicitly deferred to a subsequent phase.

Asset Development is the organizational unit responsible for reservoir surveillance and geological knowledge management within the upstream operation. The department is staffed by reservoir engineers, professional geologists, and associated technicians. Its core functions include ensuring that production continues to meet established production goals, conducting forward planning for field development, maintaining production stability or managing production decline within acceptable bounds, and fulfilling technical compliance obligations with governmental regulatory agencies. Because these functions are analytically intensive and directly tied to production outcomes, the department relies heavily on Tableau™ dashboards to monitor, communicate, and act on subsurface and surface data.

This operational profile makes Asset Development an appropriate first-priority migration target. The dashboards serving this department are not decorative or informational in a passive sense — they encode domain-specific logic developed by subject-matter experts over years of operational experience. The analytical intelligence embedded in those dashboards represents exactly the kind of institutional knowledge that is at risk of loss during a platform transition.

The management direction established the organizational legitimacy and priority ordering of the selection process, grounding it in a strategic decision from within the department being served. This aligns with Balakrishnan et al. (2020), who argue that effective data strategy decisions require executive sponsorship and organizational alignment to sustain momentum through implementation.

However, that management mandate did not by itself define a bounded list of reports. Tableau™ Server houses reports without enforced departmental ownership boundaries — a report may be accessible to or used by employees across multiple departments, and no automated tag or metadata field identifies a report as belonging exclusively to Asset Development. The actual scope reduction therefore required analysis. The approach taken was to examine which Tableau™ reports were actively used by current Asset Development employees.

Importantly, the root usage data did not include employee-status or department attributes; it only identified the accessing user account. To determine whether an access event came from a current Asset Development worker, user accounts were enriched from external organizational sources (user directory, active-person registry, and department mappings). Usage by current workers served as the primary evidence that a report was operationally relevant to the department and therefore a legitimate candidate for migration consideration. This usage-first approach reduced the candidate pool from more than 1,000 enterprise-wide reports to a workable set of fewer than 50 reports actively consumed within Asset Development — a meaningful scope boundary that made structured assessment feasible.

### 3.1.2 Usage Data: Collection, Structure, and Limitations

Determining which reports were actively used by Asset Development employees required working with Tableau™ Server's built-in access logs. This introduced both a data availability constraint and a structural data challenge.

**Time limitation.** Tableau™ Server retains usage logs for only six months prior to the date of access. There is no longer historical record available from the platform itself. As a result, the usage analysis is bounded to a six-month window and cannot distinguish between reports that were heavily used in prior years versus those that were consistently active throughout the tool's deployment. A report that was central to operations two years ago but fell out of use recently would appear as inactive in this dataset, even if it still holds institutional knowledge of ongoing relevance.

**Data structure.** The log records available from Tableau™ Server contained only four fields: date of access, user ID, view name, and workbook name. No additional metadata — such as department, job title, data source, or report purpose — was present in the raw log. This sparse schema required additional processing before the data could support meaningful analysis.

To construct analyzable usage cohorts, the usage fact table was joined to a Tableau user dimension, then linked by normalized email to an active-person registry and department dimension. This enrichment step provided employee identity and organizational context needed to isolate the Asset Development focus group and to exclude non-analytical support traffic.

A critical structural distinction is that what a user sees and interacts with on screen is called a *view* — a single dashboard or worksheet within a Tableau™ workbook. A single workbook may contain multiple views, and each view access is logged as a separate record. This means the log captures engagement at the view level, not the workbook level. To assess usage at the workbook level — which is the unit of migration — the data had to be aggregated and restructured so that view-level access events were rolled up to their parent workbooks.

**Data volume.** Despite covering only six months and containing only four fields, the Tableau™ Server log produced over 16 million rows of access records. This volume reflects the breadth of the enterprise user base and the frequency with which analytical tools are accessed across the organization. It also underscores that meaningful selection analysis required filtering and aggregation before patterns at the workbook and department level could be examined. At this scale, Excel was not suitable for reliable analysis because of row-limit, performance, and transformation constraints for repeated aggregations across view-to-workbook relationships. Detailed data preparation and analysis procedures are presented in Part 4 (Analysis Work).

### 3.1.3 Second-Level Filters: Within-Department Prioritization

With the candidate set established through current-employee usage analysis, within-department prioritization was performed using a three-prong method tailored to the realities of Tableau™ Server activity data.

**Prong 1: Clean analytical usage signal.** View activity generated by technical support workers was excluded from prioritization calculations. In implementation, records associated with the Asset Dev Data Analytics support function were removed from the focus cohort. Technical support personnel frequently open reports to build, correct, or expand dashboard content rather than to consume analytics for decision-making. Including those events would inflate activity counts in ways that do not represent business-use importance.

**Prong 2: Usage intensity plus continuation-likelihood scoring.** Visit count per view was treated as the most logical first indicator for Priority 1 candidates, but it was not used alone. Raw visit volume can be distorted by one-time events (for example, a dashboard shown in a large meeting) that produce high counts without reliably indicating sustained operational dependence. To address this limitation, the method used a weighted continuation-priority score derived from repeated user-to-dashboard activity and enterprise alignment metrics.

At workbook level, the scoring process included: (a) focus-group visit totals and unique-user counts, (b) focus-to-enterprise alignment coefficient (focus workbook visits divided by enterprise workbook visits), (c) normalized usage interest based on min-max scaling of workbook visits above a minimum activity threshold (15 visits), (d) relative utilization score based on normalized focus-share ratios, and (e) normalized migration effort derived from workbook complexity (number of views). These components were combined into a weighted composite (effort 20%, utilization-alignment 30%, usage-interest-alignment 50%) to produce the priority number used for bucket assignment.

**Prong 3: Direct user validation.** Final priority validation was performed through direct user confirmation using three questions: (1) Do you use this report? (Y/N), (2) How often do you use it?, and (3) What business process does it support? This step grounded ranking decisions in declared business purpose, not only telemetry patterns.

Together, these three prongs produced a more reliable prioritization basis than log counts alone by combining cleaned behavioral evidence, continuation likelihood, and explicit business-process validation.

### 3.1.4 Decision Output: Migrate Now, Defer, or Retire

The output of the selection pipeline was a classification of each report into one of three categories:

- **Migrate Now**: Reports that are actively used, business-critical, and technically feasible to convert within the current project phase. These become the immediate work queue for the conversion pipeline.
- **Defer**: Reports that have merit for eventual migration but that are either lower priority, more technically complex, or dependent on data infrastructure not yet available. These are held for a subsequent migration phase.
- **Retire**: Retirement from Tableau™ is an enterprise-wide end-state for all reports by the end of 2026, when the Tableau™ license expires. Reports not migrated in the current phase remain deferred candidates in the short term, but all legacy Tableau™ assets must ultimately be either migrated to Spotfire™ or retired at license sunset.

This three-way classification is consistent with portfolio rationalization practices described in the BI migration literature. Zierz and Lordsleem Junior (2026) observe that organizations that fail to triage legacy report portfolios before migration typically carry unnecessary complexity into the new platform, compounding conversion cost and risk. The Migrate Now / Defer / Retire framework addresses this risk by making explicit what will be done with each report and why, while also enforcing a time-bounded end-state driven by the 2026 Tableau™ license sunset.

## 3.2 The Conversion Pipeline

The conversion pipeline addresses the second problem: how to technically translate selected Tableau™ reports into Spotfire™ dashboards while preserving their analytical logic, institutional knowledge, and decision-support function.

Tableau™ and Spotfire™ are both enterprise-grade visual analytics platforms, but they differ substantially in architecture, calculation language, data connection model, and interaction design. A direct export from one platform to the other does not exist. Each report must be reconstructed in Spotfire™ by a practitioner who understands both what the original dashboard was doing and how to replicate that behavior in the target environment.

The conversion pipeline developed for this project uses AI-assisted documentation as an intermediate layer between the Tableau™ source and the Spotfire™ rebuild. Rather than attempting automated code conversion, the pipeline first extracts and structures the embedded logic of each Tableau™ workbook into a human-readable discovery package, which then serves as the specification for the Spotfire™ reconstruction.

### 3.2.1 AI-Assisted Workbook Discovery

For each report selected in the Migrate Now category, an AI discovery process was applied to the Tableau™ packaged workbook (`.twbx`) file. The `.twbx` format is a zip archive containing the workbook XML, packaged data extracts, and any embedded resources. By extracting and parsing this structure, an AI assistant was able to produce a structured documentation package covering:

- Datasource inventory and connection types (including Oracle named connections and embedded custom SQL)
- Worksheet and dashboard inventory
- Join logic between datasources (including non-standard joins such as right joins between producer and injector datasets)
- Field mappings from joined relations into the Tableau™ datasource layer
- Calculated field definitions and logic
- Business filtering patterns (shared-view filters and worksheet-level filters)
- Interaction behavior (highlight actions, filter actions)
- Dashboard layout structure

This discovery output serves two purposes. First, it preserves the institutional knowledge embedded in the workbook in a form that is independent of Tableau™ access — which matters if the Tableau™ license is retired before reconstruction is complete. Second, it provides a structured specification that a Spotfire™ developer can follow without needing to interpret raw XML or reconstruct intent from memory.

### 3.2.2 Reconstruction in Spotfire™

With the discovery package in hand, the conversion step involves rebuilding the report in Spotfire™ by a practitioner familiar with the target platform. The discovery package does not eliminate the need for human judgment — it relocates and focuses that judgment. Instead of spending time on discovery and interpretation, the Spotfire™ developer works from a clear specification of what the original report was doing and applies their knowledge of the target platform to reproduce or adapt that behavior.

Where direct equivalents exist in Spotfire™, the reconstruction is relatively straightforward. Where divergence exists — particularly in advanced calculation logic and interaction models — the developer must make design decisions about the best Spotfire™-native approach to preserve the intended analytical function.

### 3.2.3 Labor Inventory and Team Formation

The third problem identified in the framing section — technical labor constraint — was not theoretical in this case; it was a concrete staffing reality. At the outset of the migration effort, CRC Asset Development Data Analytics had one Spotfire™ expert and one junior Spotfire™ developer. Former Aera employees who transitioned to CRC contributed two Tableau™ expert developers with zero Spotfire™ experience at project start. This four-person developer set constituted the core technical labor inventory available for platform migration work.

One of the former Aera developers (the author of this study) was assigned as team lead and treated the migration as both a platform translation task and a business-knowledge transfer problem. The working assumption was that Tableau™ workbooks encoded not only visualization logic but also domain-specific interpretations of operational data that could not be preserved through technical conversion alone.

To address that risk, a formal Tableau™-to-Spotfire™ Conversion Team was organized with six members total:

- Four developers with uneven platform depth: two Tableau™ experts with no initial Spotfire™ experience, one Spotfire™ expert, and one junior Spotfire™ developer
- Two business experts (former Aera employees) with deep technical knowledge of the underlying operational data and decision context

The team was mobilized through weekly working meetings designed to establish shared understanding across platform specialists and domain experts. The initial objective of these sessions was to craft and align project scope before large-scale conversion work began. This early cadence reduced role ambiguity, surfaced hidden dependencies, and created a common decision framework for report selection and reconstruction sequencing.

### 3.2.4 Labor Constraints and Delivery Risk

Beyond skill asymmetry, effective labor capacity was reduced by concurrent organizational transition work associated with integrating former Aera operations into CRC. Most team members could participate only part time in migration activities, while only the team lead was allocated full time. As a result, nominal team size overstated practical throughput.

This constraint created four execution risks. First, the single Spotfire™ expert remained a bottleneck for high-complexity rebuild decisions. Second, the two Tableau™ experts required concurrent upskilling in Spotfire™, reducing near-term conversion velocity. Third, business-expert availability had to be scheduled carefully to prevent loss of domain context during reconstruction. Fourth, part-time participation increased coordination overhead and elongated cycle time from discovery to rebuild.

Methodologically, these labor constraints directly shaped project design: priority was given to reports with highest validated business value and strongest continuation signals, scope was tightly controlled, and weekly governance was used to maintain alignment under limited capacity. The end-of-2026 Tableau™ license sunset further intensified the need to sequence work according to labor-constrained feasibility rather than theoretical migration completeness.

### 3.2.5 Charter Alignment: Scope, Objectives, and Milestones

The project charter established Spotfire™ as the standard analytics platform, ending new Tableau™ development and initiating strategic conversion of existing Tableau™ dashboards. This charter position directly informed both the selection and labor methods described above.

Charter-level objectives translated into method constraints as follows:

- **Standardize platform use**: New analytics development targets Spotfire™ as the default environment.
- **Discontinue new Tableau™ build**: Creation of new Tableau™ reports is out of scope, which prevents growth of migration backlog during transition.
- **Prioritize business-critical migration**: High-use reports are migrated first, beginning with Asset Development.
- **Support user transition**: Team design includes business experts to preserve context and support adoption.
- **Enforce execution discipline**: Reports are classified by complexity and phased by feasible delivery capacity.
- **Maintain transparent governance**: Progress is tracked through recurring cadence and shared project management artifacts.

Charter scope boundaries were also explicit:

- **In scope**: Tableau™ to Spotfire™ conversion, Spotfire™ report development needed for continuity, and alignment with existing Spotfire™ assets.
- **Out of scope**: Reports not used by Asset Development, maintenance expansion of legacy Tableau™ assets beyond transition needs, and creation of new Tableau™ reports.

Initial milestone anchors established in charter planning included management communication of the platform decision (05/29/2025), project initiation and scope definition (06/04/2025), enterprise report-list review kickoff (06/18/2025), and completion of the initial phase target (12/30/2025). The timeline was planned in phased form and extended through 2026, consistent with license-sunset constraints and labor-limited execution capacity.

## 3.3 Research Design

This study uses an applied, embedded case-study design in a single organizational setting: the post-acquisition Tableau™-to-Spotfire™ transition in Asset Development. The design is embedded because it evaluates three linked units of analysis within one case: portfolio selection, technical conversion fidelity, and labor-constrained delivery feasibility. This structure matches the project reality in which selection quality, reconstruction quality, and staffing constraints jointly determine migration outcomes.

The primary research question asks how institutional knowledge embedded in enterprise Tableau™ dashboards can be identified, extracted, and preserved during migration. The secondary research question asks which report characteristics and delivery constraints most strongly affect migration labor and risk. Both questions are exploratory and practice-oriented, making this design appropriate for method development in a real implementation context.

### 3.3.1 Units of Analysis and Decision Levels

The method operates across two technical granularity levels and one delivery level:

1. **Telemetry level (view-level events):** Access logs record usage at Tableau™ view level.
2. **Migration decision level (workbook-level decisions):** Prioritization and conversion decisions are made at workbook level.
3. **Delivery level (team capacity and governance):** Feasibility is shaped by labor inventory, skill distribution, and part-time availability under transition conditions.

This distinction is important because high activity at view level must be normalized and rolled up before workbook-level migration choices can be made.

### 3.3.2 Data Sources and Evidence Integration

The study integrates four evidence streams.

1. **Selection telemetry and metadata:** Tableau™ usage fact records; workbook, view, and project dimensions; Tableau user accounts; and external organizational mappings (active-person registry and department dimensions) used to identify current Asset Development usage cohorts.
2. **Conversion artifacts:** Tableau™ packaged workbook files (`.twbx`) and AI-generated discovery packages used as structured reconstruction specifications.
3. **User validation evidence:** Direct responses to three confirmation questions (use Y/N, frequency, and supported business process) used to validate ranking outputs.
4. **Execution context evidence:** Project charter constraints, phased milestones, and recurring team-governance practices used to interpret feasibility under labor limits.

Combining these streams reduces dependence on any single source and supports triangulation among behavioral logs, technical artifacts, and business-user confirmation.

### 3.3.3 Analytical Procedure

Analysis proceeds in three linked stages.

1. **Selection analysis:** Construct Asset Development cohorts from enriched user identity mappings, remove non-analytical support activity, aggregate view events to workbook level, and classify workbooks into priority buckets using usage, alignment, complexity, and validation signals.
2. **Conversion analysis:** For selected workbooks, evaluate whether AI-assisted discovery captures the operational logic required for Spotfire™ reconstruction and identify ambiguity or loss points.
3. **Labor-feasibility analysis:** Evaluate whether priority and sequencing decisions are executable under observed staffing constraints (single expert bottlenecks, upskilling demand, part-time participation, and governance cadence).

Computational details for scoring, normalization, thresholds, and aggregation mechanics are reported in Part 4 (Analysis Work), while Part 3 defines the method logic and decision structure.

### 3.3.4 Validity Considerations and Limitations

Several design limitations are acknowledged.

1. **Time-bounded telemetry:** Tableau™ access logs capture a six-month window, which may underrepresent historically important but recently inactive reports.
2. **Sparse native metadata:** Root usage logs do not contain department or employee-status attributes; organizational enrichment is required and depends on directory quality.
3. **Labor-constrained execution:** Concurrent Aera-to-CRC integration reduced practical capacity because most contributors were part time and only the team lead was full time.

These limitations were mitigated through multi-source triangulation, direct user confirmation, and phased governance, but they remain boundary conditions for interpretation of results.
