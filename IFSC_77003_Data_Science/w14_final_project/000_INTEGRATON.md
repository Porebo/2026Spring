# Integrated Final Project Draft

This file integrates the current markdown project components in order.

---

# Title Page

**Status:** Missing
**Target length:** about half a page

## What this Part contains
- Project title
- Author
- Supervisor
- Institution or department
- Course
- Semester

## Feeds from
None. This stage can be built directly once the wording is finalized.

## Still needed
- Final title decision
- Exact institution or department wording

---

_Draft content goes below this line._

---

# Table of Contents

**Status:** Optional / Skip

The assignment allows this Part to be omitted unless the final report grows beyond roughly 15 pages.

## Decision rule
- Skip unless the final PDF becomes long enough to justify navigation support.

---

_If the TOC becomes necessary, draft content goes below this line._

---

# Part 1: Introduction

## 1.1 Background and Motivation

Business intelligence platforms in data-intensive industries, such as upstream oil exploration and production, serve not only to display information but to encode the operational knowledge of their workforces (Banerjee et al., 2025; Cogan et al., 2025; Zierz & Lordsleem Junior, 2026). When organizational change forces a platform migration, the risk is not simply one of software conversion. It is the potential loss of institutional knowledge accumulated over years within reports, queries, and visualizations developed by domain experts (Banerjee et al., 2025; Panichelli, 2022). This paper examines that risk through a real-world case involving a large upstream oil production company and its post-acquisition migration from Tableau™ to Spotfire™.

Aera Energy LLC was an upstream oil production company focused solely on California. It was formed in 1997 as a joint venture between Shell Oil Company and ExxonMobil, structured as a privately held LLC rather than a publicly traded entity. Although owned by these major companies, Aera operated as a standalone organization with its own workforce, systems, and decision-making processes. In an operational context, it was not integrated into the global structures of its parent companies and instead operated with its own resources and infrastructure rather than as a directly integrated subsidiary.

At its peak, the company managed nearly 50,000 wells and employed approximately 1,400 professionals in petroleum engineering, geology, and operations, supported by roughly 5,000 contractors. The scale and complexity of the operation required centralized data management. Over time, Aera consolidated information from multiple decentralized field systems into an Oracle-based data warehouse, from which technicians extracted and delivered data to professional users.

In 2008, Aera adopted Tableau™ as its enterprise data visualization platform. Earlier tools had not met the company's needs, but Tableau™ was rapidly adopted because it allowed domain professionals to translate operational experience directly into dashboard logic. Each completed Tableau™ report represented more than a visual output. It encoded domain-specific knowledge built through collaboration between engineers and analysts: SQL queries, regulatory compliance logic, and production surveillance methodologies. It also captured geological calculations and business-specific display structures refined over many years (Banerjee et al., 2025; Cogan et al., 2025). In this way, the Tableau™ report inventory became one of the primary repositories of Aera's accumulated operational expertise.

In 2023, Aera was sold to a financial buyer without direct operating experience in oil and gas, and its existing operational structure was largely maintained to ensure continuity. In 2025, the assets were subsequently acquired by California Resources Corporation (CRC), a company with extensive experience in California oil operations. By that point, more than 1,000 Tableau™ reports existed across the enterprise.

## 1.2 Problem Statement

CRC's standard analytics platform was Spotfire™, not Tableau™. Following the acquisition, the company faced a decision: maintain two parallel visualization platforms at significant cost and duplication, or migrate the Aera Tableau™ inventory into Spotfire™ and retire Tableau™. The migration path was selected, but it exposed a critical and initially underappreciated challenge.

Each Tableau™ report required substantial reverse engineering before it could be reproduced in Spotfire™. The platforms differ significantly in data handling, query construction, and visualization logic. A technical worker had to download the original file and identify each embedded SQL query. Formulas and filter logic then had to be reconstructed, and the report's operational purpose had to be understood before rebuilding could begin in Spotfire™. In practice, the estimated effort per report ranged from four to eight weeks.

Beyond technical complexity, many original report authors had retired or departed. Knowledge transfer had occurred primarily through mentorship and informal training rather than formal documentation — a pattern consistent with how organizations transmit tacit knowledge when explicit codification is absent (Schreiber et al., 2011). As a result, Tableau™ reports had become the primary surviving artifacts of much of Aera's specialized domain knowledge.

## 1.3 Practitioner Perspective and Study Scope

This paper is written from a practitioner perspective. The author served as project team lead for the Tableau™-to-Spotfire™ migration effort, responsible for translating management direction into execution, overseeing production, coordinating between technical staff and operational stakeholders, and maintaining progress across a complex and iterative workflow. This role provided direct visibility into both the technical challenges of migration and the organizational dynamics influencing the effort.

The analysis is structured as a case study grounded in that experience. The scope includes the migration process as encountered in practice and the knowledge embedded in selected reports. It also covers the methods used to extract and reconstruct that knowledge, and the implications for analytical continuity and decision support.

## 1.4 Research Questions

This project is guided by the following primary research question:

**How can institutional knowledge embedded in enterprise Tableau™ dashboards be identified, extracted, and preserved during migration to Spotfire™ in a post-acquisition upstream oil production environment?**

A supporting sub-question addresses migration complexity:

**What report characteristics most strongly affect the labor and risk involved in migrating Tableau™ dashboards to Spotfire™?**

## 1.5 Significance

The Tableau™-to-Spotfire™ migration at the former Aera operation is not an isolated case. Business intelligence platform migrations are a common outcome of mergers, acquisitions, and cost consolidation decisions across industries (Zierz & Lordsleem Junior, 2026). In data-intensive organizations, degradation of analytical fidelity during such transitions can directly impact operational decision-making and diminish organizational effectiveness (Banerjee et al., 2025; Panichelli, 2022). This study provides a practitioner-grounded analysis of how institutional knowledge is preserved or lost during migration, and what factors determine whether decision-support capability is maintained.

## 1.6 Paper Organization

The remainder of this paper is organized as follows. Part 2 reviews relevant literature on knowledge management, business intelligence systems, organizational memory, and platform migration. Part 3 describes the research design, data sources, and methods. Part 4 presents the analysis of selected Tableau™ reports and their migration outcomes. Part 5 discusses implications for institutional knowledge retention, analytical fidelity, and migration strategy. Parts 6 through 8 present conclusions, references, and supplementary materials.

---

# Part 2 — Literature Review

## 2.1 Balakrishnan et al. (2020): Data Strategy as the Foundation for BI Value

Balakrishnan et al. (2020) argue that organizations create value from data through connected stages: extraction, transformation, centralization, governance, and delivery. Their framework is important to this project because it positions dashboards as downstream products of a larger data architecture rather than standalone tools. In the Aera-to-CRC case, this supports the interpretation that Tableau™ reports depended on curated warehouse structures and established business rules, not only on visualization choices.

For the primary research question, this paper supports the need to preserve upstream logic (data definitions, transformations, governance assumptions) when migrating reports to Spotfire™. For the secondary question, it implies that reports with heavier dependence on complex upstream transformations will carry higher migration labor and risk.

## 2.2 Zierz and Lordsleem Junior (2026): BI Platform Adoption and Migration Friction

Zierz and Lordsleem Junior (2026) describe BI tools as organizational systems for integrating heterogeneous data into decision-ready outputs. They also identify common implementation barriers, including interoperability issues, standardization gaps, infrastructure constraints, and user resistance.

This paper strengthens the business case by showing that migration challenges are usually socio-technical, not just technical. For this study, it reinforces that preserving institutional knowledge requires handling both report logic and organizational adoption realities. It also supports the view that migration effort rises when reports depend on non-standard integrations or when user workflows are tightly coupled to legacy platform behavior.

## 2.3 Caglar (2016): Dashboards as Operational Decision Environments

Caglar (2016) finds that users value dashboards as a centralized environment for monitoring, sharing, and decision-making. Although the context is education, the core insight is transferable: dashboard value comes from workflow utility, not only from visual output.

Applied to this project, the finding supports treating Tableau™ assets as operational infrastructure for engineers and analysts. For the primary research question, this means preservation must include usability intent and decision pathways, not only data fields. For the secondary question, reports that are deeply embedded in daily workflow likely create higher transition risk if recreated without equivalent interaction patterns.

## 2.4 Cogan et al. (2025): User-Centered Design Encodes Domain Expertise

Cogan et al. (2025) show that dashboards evolve through iterative collaboration with stakeholders and that this process embeds interpretive logic into the final artifact. The study highlights that dashboard meaning is co-produced through layout, emphasis, sequencing, and interaction design.

This paper is directly useful for the migration problem because it broadens what counts as “knowledge” in a report. Knowledge includes not only SQL and formulas but also design choices that guide interpretation. For migration risk, this implies reports with more custom interactions, specialized layouts, or domain-specific storytelling are more labor-intensive to reproduce with analytical fidelity.

## 2.5 Banerjee et al. (2025): Dashboards as Organizational Memory Mechanisms

Banerjee et al. (2025) frame web-based dashboards as mechanisms for organizational monitoring, knowledge sharing, and innovation continuity. Their work supports the argument that dashboards can preserve institutional memory beyond staff turnover.

For this project, the implication is clear: retiring a legacy BI platform without extraction protocols can produce knowledge loss, not just software replacement cost. This paper strengthens the business relevance of the study by linking dashboard continuity to enterprise performance and decision stability.

## 2.6 Pham et al. (2013): Interactive Visualization as Sense-Making Infrastructure

Pham et al. (2013) demonstrate that interactive visual analysis supports exploratory reasoning, hypothesis generation, and pattern discovery more effectively than static reporting. Interactivity is therefore a core part of analytical value.

In this migration context, the study supports evaluating whether reconstructed Spotfire™ reports preserve exploratory capabilities that existed in Tableau™. For migration labor and risk, reports with high interaction density (filters, drill paths, linked views) are likely to require more reverse engineering and more user validation cycles.

## 2.7 Schreiber et al. (2011): Tacit vs Explicit Knowledge in Organizational Transfer

Schreiber et al. (2011) distinguish explicit knowledge (codified and transferable) from tacit knowledge (experience-based and difficult to formalize). This distinction provides a theoretical lens for interpreting report migration.

In this study, Tableau™ reports can be viewed as partial codifications of tacit domain expertise. The implication for the primary research question is that preservation must target explicit artifacts (queries, calculations, structures) while acknowledging residual tacit knowledge that requires expert interpretation. For migration risk, reports built on highly contextual business logic are more vulnerable when original authors are unavailable.

## 2.8 Panichelli (2022): Migration Failure Risk from Incomplete Discovery

Panichelli (2022), writing on CMMS migration, emphasizes that failures typically arise from poor discovery, unclear workflows, inconsistent historical data, and weak validation planning. Although the domain differs, the migration principles map closely to BI platform transitions.

This paper strongly supports the need for a pre-migration discovery phase in the Tableau™-to-Spotfire™ workflow. It also provides practical support for the secondary research question: labor and risk increase when report internals are poorly documented, when dependencies are opaque, and when validation criteria are not defined before rebuild work starts.

## 2.9 Sherman et al. (2025): Domain-Tuned AI for Technical Translation Tasks

Sherman et al. (2025) show that domain-tuned LLM workflows can substantially improve technical translation tasks compared with generic baselines. Their geospatial example demonstrates that structure, domain context, and constrained prompting improve output reliability.

For this project, the paper supports using AI-assisted extraction to scale discovery across many reports, especially for parsing logic patterns and documenting technical components. It also cautions that performance depends on domain grounding, so AI must be embedded in a controlled workflow with human review.

## 2.10 Bhatti (2026): Strategic Prompting as a Quality Control Mechanism

Bhatti (2026) argues that AI quality is strongly determined by prompt design, iteration discipline, and alignment to task intent. The paper is not about BI directly, but it is highly relevant methodologically.

For this study, Bhatti supports the proposition that AI-assisted migration discovery should use repeatable prompt templates, scoped objectives, and verification checkpoints. This is important for preserving analytical fidelity and for reducing inconsistency across extracted report documentation.

## 2.11 Integrative Synthesis, Research Questions, and Gap

Taken together, these ten papers support the following conclusions and implications:

1. BI reports are organizational knowledge assets embedded in enterprise data architecture and user workflows (Balakrishnan et al., 2020; Zierz & Lordsleem Junior, 2026; Caglar, 2016; Cogan et al., 2025; Banerjee et al., 2025; Pham et al., 2013).
2. Knowledge preservation during migration requires both technical extraction and interpretation of tacit context (Schreiber et al., 2011; Panichelli, 2022).
3. AI can improve extraction scale and consistency when domain-tuned and prompt-disciplined (Sherman et al., 2025; Bhatti, 2026).

### 2.11.1 Relation to Research Questions

1. **Primary Research Question**: The literature indicates that institutional knowledge preservation during Tableau™-to-Spotfire™ migration requires four linked actions: discovery of embedded report logic, extraction and documentation of dependencies, reconstruction that preserves workflow intent, and validation with domain experts.
2. **Secondary Research Question**: The literature indicates that migration effort and failure risk are shaped by report characteristics, especially calculation complexity, interaction density, hidden data dependencies, and context-specific business rules that are difficult to infer without expert input.

### 2.11.2 Remaining Gap

The remaining gap is specific and practical:

1. Current literature does not directly examine post-acquisition migration of large enterprise Tableau™ inventories to Spotfire™ in an upstream oil production environment where workforce turnover and platform standardization pressures occur simultaneously.
2. This project addresses that gap with a practitioner-grounded analysis focused on preserving decision-support capability while reducing institutional knowledge loss.

---

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

---

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

---

# Part 5 - Discussion, Ethics, Privacy, and AI Disclosure

Part 4 established that a quantitative selection pipeline can narrow a large report inventory into a defensible migration scope. It also showed that technical feasibility is not determined only by report complexity, but by staffing constraints, training access, and governance choices made under deadline pressure. This part interprets those results at the organizational level and examines their implications for business continuity, privacy, security, and responsible AI use.

## 5.1 Interpretation of Principal Findings

The strongest finding of this project is that migration prioritization improves when usage telemetry, economic scoring, and human validation are used together rather than in isolation. The combined pipeline reduced 660 valid Tableau workbooks to a shortlist of 20 workbooks that satisfied three conditions: measurable usage sustainability, sufficient ROI potential, and user-confirmed operational relevance. This three-gate approach lowered the risk of carrying forward low-value assets while preserving high-value analytical workflows.

At the same time, the findings indicate that selection quality does not guarantee delivery speed. Several workbooks ranked highly by usage and ROI still required slower conversion sequencing because of labor bottlenecks, limited Spotfire proficiency across the team, and dataset-specific performance mitigation work. The practical implication is that prioritization and execution must be treated as separate governance domains. Selection models can identify what should be migrated first; staffing and capability models determine what can be migrated first.

Another important interpretation is that migration programs are also knowledge stewardship programs. Only 20 workbooks were selected in the first wave. The remaining 640 workbooks represent institutional memory distributed across business processes, calculations, and report narratives that may not be fully documented elsewhere. Therefore, non-selection should not be interpreted as zero value. It should be interpreted as deferred value requiring explicit archival and lifecycle policy.

## 5.2 Business Implications for Enterprise Analytics Migration

From a business perspective, this project demonstrates that enterprise BI migration can be governed as a portfolio decision rather than a one-time technical conversion event. The scoring framework made tradeoffs visible and repeatable. Instead of relying on ad hoc requests, the organization can classify reports into categories that map directly to action: immediate conversion, staged conversion, enterprise-funded utility, or retirement.

The ROI scoring method was designed to favor workbooks that combine sustained focus-cohort use with alignment to business ownership. In simplified form, priority is influenced by effort, utilization, and usage-interest under alignment constraints:

$$
P = 0.20 \cdot E + 0.30 \cdot (U \cdot A) + 0.50 \cdot (I \cdot A)
$$

where $P$ is the priority score, $E$ is effort, $U$ is utilization, $I$ is usage interest, and $A$ is alignment.

This framing is business-relevant because it links investment directly to probable operational return. It also helps explain why some historically popular reports should not be first in line if they have weak ownership alignment or low focus-cohort relevance.

The project further shows that migration risk is not purely technical debt. It includes capability debt. Where training access is constrained and platform expertise is concentrated in a small number of people, migration velocity and quality are exposed to personnel availability. In this case, phased contractor delegation was a rational risk-control mechanism: internal resources retained higher-ambiguity analytic conversions while bounded, high-urgency reports were delegated under two-gate acceptance criteria.

Finally, the December 2026 Tableau license sunset functions as a governance forcing mechanism. While a hard deadline can create urgency and alignment, it can also encourage short-horizon optimization if leadership treats deadline compliance as the sole metric. A stronger business position is to treat sunset compliance as a baseline requirement and sustainability of analytics capability as the strategic objective.

## 5.3 Data Privacy and User Telemetry Considerations

The analytical pipeline used Tableau Server telemetry linked to user and organizational metadata to distinguish focus-cohort usage from enterprise-wide usage. This approach is methodologically necessary for targeted migration, but it introduces direct privacy obligations because telemetry records can reveal patterns of identifiable employee behavior.

In this project, cohort construction depended on joins that included user identifiers such as email and associated person dimensions. Even when downstream scoring outputs did not expose raw identifiers, the intermediate join logic relied on personally identifiable information (PII). This makes purpose limitation and access control central privacy requirements. The acceptable purpose in this case was operational continuity planning for enterprise analytics migration, not generalized employee surveillance.

Three privacy principles emerge from the work:

1. Data minimization in outputs: final scoring views should expose report-level decision variables and avoid unnecessary person-level fields.
2. Role-based access to intermediate logic: only authorized analysts should access PII-linked join layers used for cohort derivation.
3. Retention discipline: telemetry extracts and intermediate mapping artifacts should follow explicit retention windows aligned to migration governance needs.

The broader governance lesson is that usage analytics can be both useful and sensitive. A technically correct model can still be privacy-inadequate if process controls are weak. Therefore, privacy review should be integrated into model lifecycle checkpoints, not deferred to final publication.

## 5.4 Security Boundaries and Data Stewardship

The project was implemented in ENGSB (Engineering Sandbox), an Oracle staging schema rather than the production enterprise data warehouse. This architecture provided a practical security boundary for iterative model development and validation. It enabled exploratory joins and scoring logic without direct modification of production reporting assets.

However, sandbox placement does not remove security obligations. Staging environments can become risk concentration zones if controls are weaker than production controls. In this project, security posture was strengthened by keeping contractor access scoped and by using acceptance gates that required technical verification before operational handoff.

Security stewardship for this type of migration pipeline should include at least the following controls:

1. Principle of least privilege for schema access, including explicit separation between model development and publication roles.
2. Auditability of view definitions and update events for scoring logic that affects resource allocation decisions.
3. Change management for model thresholds and weights, with traceable approval records.
4. Controlled promotion path from staging outputs to production consumption layers.

A migration program that uses scoring outputs to shape funding and delivery priorities should treat those outputs as decision infrastructure. Decision infrastructure requires controls comparable to those applied to financial or operational reporting systems.

## 5.5 Ethical Use of AI in Migration Decision-Making

AI support in this project primarily accelerated discovery and documentation of workbook structures needed for conversion handoff. The ethical issue is not whether AI wrote code autonomously. The ethical issue is whether AI participation influenced consequential organizational decisions without sufficient human accountability.

Here, AI-assisted processes were used upstream of conversion and therefore upstream of resource allocation. Shortlisting decisions affect which analytical assets are preserved first, which business groups receive continuity sooner, and which workflows face delay or retirement. For that reason, ethical use requires clear governance around three areas.

First, transparency: stakeholders should understand where AI-assisted outputs entered the process and what role they played in ranking or recommendation.

Second, contestability: human reviewers, including business SMEs, must be able to challenge AI-influenced outputs and override them when operational context indicates a different priority.

Third, accountability: final decisions must remain attributable to named organizational roles (for example, team lead, platform owner, business approver), not to the AI tool.

A related ethical concern is institutional knowledge preservation. When a large legacy report portfolio is filtered aggressively, the non-selected set can disappear from active governance attention. Ethically responsible migration should include a documented archival pathway for deferred assets so that de-prioritization does not become silent deletion of organizational memory.

## 5.6 AI Assistance Disclosure

AI tooling was used in this project for writing support, document structuring, and code-comment refinement. Specifically, GitHub Copilot support was used to assist prose drafting, revise section flow, and annotate SQL logic for readability.

All domain facts, organizational context, report inventory interpretation, migration decisions, and analytical judgments were provided and validated by the author in the team-lead role. AI tools did not originate corporate data, did not access corporate systems directly, and did not independently execute production-impacting decisions.

This disclosure is important for research integrity. It clarifies that AI was used as an assistive productivity instrument rather than as an autonomous analytical authority. The distinction preserves authorship accountability while still acknowledging modern human-AI co-production practices in technical writing and analysis.

In summary, the project's discussion findings support a governance-first view of enterprise BI migration. Quantitative prioritization improves decision quality, but sustainable outcomes require deliberate controls for privacy, security, capability development, and ethically bounded AI use.

---

# Part 6 - Conclusions and Closing Thoughts

This project shows that Tableau-to-Spotfire migration should be managed as a knowledge-preservation and governance problem, not only a technical rebuild. Using telemetry scoring, ROI weighting, and business-user validation together, the team narrowed 660 valid workbooks to 20 high-value migration candidates with defensible priority and clear rationale.

The main contribution is a practical decision pipeline that links selection quality with delivery reality. AI-assisted workbook discovery improved reconstruction readiness, but actual delivery depended heavily on staffing, training access, and platform constraints. In other words, strong prioritization identifies what should be migrated first, while workforce capacity determines what can be migrated first.

Overall, the case demonstrates that reliable BI transition requires four controls: evidence-based selection, explicit knowledge handoff, labor-aware execution planning, and accountable human oversight of AI-assisted steps. With those controls in place, organizations can reduce migration risk, preserve decision-support capability, and execute phased modernization under deadline pressure.

---

# Part 7 — Appendix

**Status:** In progress

This supporting stage gathers the project schedule, hours log, references, sanitized discovery example, figures, and any code links.

## What this Part contains
- Project schedule.
- Hours log (can pull from `_D_hourslog.md`).
- Consolidated APA references.
- Sanitized discovery example.
- Figures.
- Any code links.

## Feeds from
- Citations in the 10 `L_` literature notes.
- Examples in `05_dataSelectionResearchDesignAndMethods.md`.
- Running time log in `_D_hourslog.md`.

## Still needed
- Schedule document.
- Sanitized workbook example.

---

## 7.1 Consolidated References (APA 7th)

Balakrishnan, R., Das, S., & Chattopadhyay, M. (2020). Implementing data strategy: Design considerations and reference architecture for data-enabled value creation. *Australasian Journal of Information Systems, 24*. https://doi.org/10.3127/ajis.v24i0.2504

Banerjee, S., Fullerton, C. E., Gaharwar, S. S., & Jaselskis, E. J. (2025). Strategic web-based data dashboards as monitoring tools for promoting organizational innovation. *Buildings, 15*(13), 2204. https://doi.org/10.3390/buildings15132204

Bhatti, A. (2026). Strategic prompt engineering for enhancing AI-generated content in English language teaching: Empowering EFL contexts. *International Journal of Computer-Assisted Language Learning and Teaching, 16*(1). https://doi.org/10.4018/IJCALLT.398504

Caglar, E. (2016). *Administrators' perceptions of the implementation of a data dashboard in one Texas charter school system* (Publication No. 10146951) [Doctoral dissertation, Lamar University]. ProQuest Dissertations Publishing.

Cogan, A. M., Gaudino, S. G., Green, J. E., II, Kazis, L. E., Slavin, M. D., Schneider, J. C., & Giacino, J. T. (2025). Developing a data visualization tool for adults with disorders of consciousness: Qualitative analysis of user perspectives. *Learning Health Systems, 9*, e70023. https://doi.org/10.1002/lrh2.70023

Panichelli, R., Jr. (2022). CMMS database migration in clinical engineering: Penn Medicine's experience. *Biomedical Instrumentation & Technology, 56*(1), 41-45.

Pham, T., Jones, J., Metoyer, R., Swanson, F., & Pabst, R. (2013). Interactive visual analysis promotes exploration of long-term ecological data. *Ecosphere, 4*(9), Article 112. http://dx.doi.org/10.1890/ES13-00121.1

Schreiber, D., Vilela Junior, D. C., Vargas, L. M., & Maçada, A. C. G. (2011). Knowledge transfer in product development: An analysis of Brazilian subsidiaries of multinational corporations. *Brazilian Administration Review, 8*(3), 288-304.

Sherman, Z., Sharma Dulal, S., Cho, J.-H., Zhang, M., & Kim, J. (2025). Generative AI for geospatial analysis: Fine-tuning ChatGPT to convert natural language into Python-based geospatial computations. *ISPRS International Journal of Geo-Information, 14*(8), 314. https://doi.org/10.3390/ijgi14080314

Zierz, O. I. S., & Lordsleem Junior, A. C. (2026). Business intelligence tools in organizations with a focus on Power BI applications in civil construction: A systematic literature review. *Buildings, 16*(4), 869. https://doi.org/10.3390/buildings16040869

## 7.2 Project Hours Log

Draft log based on Git history and file timestamps. Adjust as needed if you remember more exact session lengths.

| Session # | Date | Approx. time | Session hours | Cumulative hours | Work completed |
|---|---|---:|---:|---:|---|
| 1 | 4/22/26 | 1:00 PM - 2:15 PM | 1.25 | 1.25 | Started research, gathered source PDFs, and created initial project notes |
| 2 | 4/22/26 | 2:15 PM - 3:30 PM | 1.25 | 2.50 | Reviewed professor feedback and built the first outline structure |
| 3 | 4/22/26 | 3:30 PM - 5:00 PM | 1.50 | 4.00 | Expanded introduction notes and developed methods/solution framing |
| 4 | 4/23/26 | 8:00 AM - 8:30 AM | 0.50 | 4.50 | Light cleanup, file organization, and assignment renaming |
| 5 | 4/24/26 | 8:00 AM - 8:58 AM | 0.97 | 5.47 | Created roadmap to organize the outline into the sections that need draft 1 |
| 6 | 4/24/26 | 9:10 AM - 9:35 AM | 0.42 | 5.89 | files organization |
| 7 | 4/25/26 | 8:00 AM - 10:45 AM | 2.75 | 8.64 | Part 1 setup: refined project framing, title direction, and scope statement |
| 8 | 4/25/26 | 11:00 AM - 1:30 PM | 2.50 | 11.14 | Part 1 drafting: introduction narrative and case context alignment |
| 9 | 4/26/26 | 8:00 AM - 11:00 AM | 3.00 | 14.14 | Part 2 structure: literature buckets and source grouping by theme |
| 10 | 4/26/26 | 11:15 AM - 1:45 PM | 2.50 | 16.64 | Part 2 writing pass: synthesis language and transition cleanup |
| 11 | 4/27/26 | 8:00 AM - 11:00 AM | 3.00 | 19.64 | Part 3 methods outline: data selection criteria and research design flow |
| 12 | 4/27/26 | 11:15 AM - 2:15 PM | 3.00 | 22.64 | Part 3 methods drafting: ENGSB table inventory and feature rationale |
| 13 | 4/28/26 | 8:00 AM - 10:30 AM | 2.50 | 25.14 | Part 3 edits: validity filter language and gate definitions |
| 14 | 4/28/26 | 10:45 AM - 2:00 PM | 3.25 | 28.39 | Part 4.1-4.2 drafting: analysis scope, approach, and schema narrative |
| 15 | 4/29/26 | 8:00 AM - 11:15 AM | 3.25 | 31.64 | Part 4.3 drafting: probability model logic, buckets, and interpretation |
| 16 | 4/29/26 | 11:30 AM - 2:15 PM | 2.75 | 34.39 | Part 4.4 drafting: ROI model weighting explanation and priority tiers |
| 17 | 4/30/26 | 8:00 AM - 11:15 AM | 3.25 | 37.64 | Part 4.5 writing: selection results framing and three-gate justification |
| 18 | 4/30/26 | 11:30 AM - 2:30 PM | 3.00 | 40.64 | Part 4.6 writing: conversion fidelity findings and reconstruction paths |
| 19 | 4/30/26 | 2:45 PM - 5:30 PM | 2.75 | 43.39 | Part 4.7 labor analysis: team composition, upskilling, and bottlenecks |
| 20 | 5/1/26 | 8:00 AM - 11:15 AM | 3.25 | 46.64 | Part 4.8 integrated findings: cross-linking selection, conversion, labor |
| 21 | 5/1/26 | 11:30 AM - 2:15 PM | 2.75 | 49.39 | Part 4.9 limitations write-up and boundary condition articulation |
| 22 | 5/2/26 | 8:00 AM - 11:15 AM | 3.25 | 52.64 | Part 4.10 governance transition section and narrative bridge to Part 5 |
| 23 | 5/2/26 | 11:30 AM - 2:30 PM | 3.00 | 55.64 | SQL documentation: probability model script comments and verification |
| 24 | 5/3/26 | 8:00 AM - 10:45 AM | 2.75 | 58.39 | SQL documentation: ROI script comments and final readability cleanup |
| 25 | 5/3/26 | 11:00 AM - 2:00 PM | 3.00 | 61.39 | Figure prep: image exports, captions, and Part 4 embedding checks |
| 26 | 5/4/26 | 8:00 AM - 11:30 AM | 3.50 | 64.89 | Part 5 drafting: discussion themes, privacy, security, ethics, AI use |
| 27 | 5/4/26 | 11:45 AM - 2:45 PM | 3.00 | 67.89 | Part 6 drafting: conclusions, contribution, lessons, and future work |
| 28 | 5/4/26 | 3:00 PM - 6:15 PM | 3.25 | 71.14 | Final integration: section coherence pass, citation/style checks, and handoff notes |

---

# Part 8 — Three-Minute Thesis

**Status:** Missing

This stage packages the project into a short spoken presentation with one static slide.

## What this Part contains
- A 3-minute spoken script.
- One static slide.
- A clear talk arc (hook → problem → method → finding → so-what).
- The final recording in the required format.

## Feeds from
- `03_introduction.md` (narrative, problem, significance).
- `05_dataSelectionResearchDesignAndMethods.md` (core finding / method framing).

## Still needed
- Script draft.
- Slide design.
- Recording.

---

_Draft content goes below this line._
