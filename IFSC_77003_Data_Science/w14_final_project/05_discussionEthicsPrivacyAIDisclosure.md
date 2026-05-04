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
