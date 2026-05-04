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
