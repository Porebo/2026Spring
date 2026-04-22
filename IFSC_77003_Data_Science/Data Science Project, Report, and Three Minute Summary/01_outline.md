# Project Outline — Semester Report Skeleton

**Course:** IFSC 77003-9U2 — Data Science & Technologies (Spring 2026)
**Author:** Lester Carcamo
**Supervisor:** Dr. Pierce
**Due:** 5/5/26
**Target length:** 10–20 pages, 12 pt, 1.15 spacing, 1-inch margins

---

## Working Title

A case study of institutional knowledge preservation during business intelligence platform migration in an upstream oil production enterprise.

## Locked Research Question

What framework can be used to identify, extract, and preserve institutional knowledge embedded in Tableau reports during migration to Spotfire in a post-acquisition upstream oil production environment?

## Supporting Subquestion

What report characteristics most strongly affect the labor and complexity required to migrate Tableau dashboards to Spotfire?

---

## Part-by-Part Map

Status legend: **Have** = drafted material already exists. **Partial** = raw notes only, needs rewrite. **Missing** = nothing written yet.

### Part 1 — Title Page — Missing
Target: ~1/2 page.
- Project title (working title above)
- Author: Lester Carcamo
- Supervisor: Dr. Pierce
- Institution / department
- Course: IFSC 77003-9U2 — Data Science & Technologies
- Semester: Spring 2026

**Feeds from:** none — build directly.
**Still needed:** final title decision, exact institution/department wording.

---

### Part 2 — Table of Contents — Optional / Skip
Assignment allows omission. Skip unless the final PDF crosses ~15 pages.

---

### Part 3 — Introduction — Partial
Target: ~1.5–2 pages.

Subsections:
1. **Topic and audience** — who cares: upstream oil producers, BI teams, any enterprise facing platform migration after acquisition.
2. **Background and context** — Aera Energy formation (1997), scale (10,000 → 50,000 wells), Oracle Data Warehouse, Tableau adoption (2008), CRC acquisition (2025).
3. **Problem statement** — Tableau reports encode years of institutional knowledge; CRC standardizes on Spotfire; dual-licensing is unsustainable; manual rebuild is 4–8 weeks per report; knowledge is at risk of loss.
4. **Research question and subquestion** — as stated above.
5. **Significance** — the finding matters beyond this case because acquisitions, platform consolidations, and retirements are common in any large enterprise; preserving analytical knowledge is a generalizable problem.

**Feeds from:** `introduction.md` (rich but in exploratory form).
**Still needed:** one committed version — strip the six "Current view after this stage" iterations; extract and polish the chosen framing.

---

### Part 4 — Literature Review — Partial
Target: ~3–4 pages.

**Required structure:** synthesized review, not ten parallel summaries. Organize thematically:

**Theme A — BI tools as enterprise knowledge infrastructure**
- Zierz & Lordsleem Junior (2026) — BI ecosystem
- Balakrishnan et al. (2020) — data-to-value pipeline, warehouse foundation
- Pham et al. (2013) — interactive visual analysis as sense-making

**Theme B — Dashboards as artifacts of professional expertise**
- Banerjee et al. (2025) — dashboards as organizational memory
- Caglar (2016) — dashboards as everyday decision-support environments
- Cogan et al. (2025) — dashboards as visually encoded expertise

**Theme C — Tacit vs. explicit knowledge and knowledge transfer**
- Schreiber et al. (2011) — tacit/explicit distinction; Tableau as codification layer

**Theme D — System migration as structured process**
- Panichelli (2022) — migration as assessment/planning/validation, not copy

**Theme E — AI as a domain-aware extraction and authoring tool**
- Sherman et al. (2025) — fine-tuned LLMs outperform generic LLMs on domain tasks
- Bhatti (2026) — strategic prompt engineering as the quality lever

**Gap statement** — The literature treats BI migration, knowledge management, and AI-assisted analysis as separate conversations. No source in this set addresses how AI-assisted extraction can operationalize knowledge preservation *during* BI platform migration in a post-acquisition enterprise. That is the gap this project fills.

**Feeds from:** the ten lit-note files (`knowledgeConservation.md`, `dashboardPracticalValue.md`, `dashboardEncodedExpertise.md`, `domainTunedAI.md`, `strategicPrompting.md`, `tacitExplicitKnowledge.md`, `dataWarehouseFoundation.md`, `interactiveVisualAnalysis.md`, `businessIntelligenceTools.md`, `migrationProcess.md`).
**Still needed:**
- 2–5 additional sources to push total to 12–15 (target areas: organizational knowledge loss during M&A, Tableau workbook XML structure, LLM code/logic extraction).
- Rewrite from per-source paragraphs to thematic synthesis.
- Add explicit comparison/contrast sentences and the gap statement.

---

### Part 5 — Data Selection, Research Design, and Methods — Partial
Target: ~2–3 pages.

Subsections:
1. **Restated objective** — from the research question.
2. **Overall strategy** — case-study method; AI-assisted discovery applied to a selected sample of Tableau workbooks; evaluate what is extracted, what requires human validation, and what cannot be recovered.
3. **Data sources** —
   - Population: ~1,000+ Tableau reports from the former Aera enterprise.
   - Sample: *to be defined* — propose 3–5 workbooks selected to span complexity (simple single-dataset, medium multi-dataset, high-complexity multi-join/custom SQL). `New_InjCentered_Daily2_3957.twbx` is already one.
   - Data quality note: workbooks contain proprietary SQL, field names, and business logic; anonymization/redaction approach needed.
4. **Analytical techniques** — workbook package unpacking (twbx → XML), field/query/calculation/filter extraction, layout inspection, AI-generated discovery package, structured comparison across workbooks.
5. **AI role in method** — discovery assistant, not converter; generates structured documentation; outputs reviewed by human analyst before use.
6. **Evaluation framework** — criteria for "knowledge preserved":
   - (a) datasource and SQL captured
   - (b) calculated fields and filters captured
   - (c) dashboard layout and interaction behavior captured
   - (d) business purpose identifiable
   - (e) Spotfire rebuild path actionable without re-opening Tableau

**Feeds from:** `solutions.md`, `introduction.md`.
**Still needed:**
- Final sample list (workbook names, why chosen).
- Written evaluation-criteria subsection.
- Data-quality and confidentiality caveats paragraph.
- Written methods section (currently zero prose outside notes).

---

### Part 6 — Analysis Work — Partial
Target: ~3–4 pages.

Subsections:
1. **Workbook-by-workbook discovery results** — for each sampled workbook, present what AI extracted (datasources, SQL, calcs, filters, layout) and what still required human work.
2. **Cross-case patterns** — where extraction succeeded across workbooks, where it failed, what distinguishes easy from hard cases.
3. **Labor/complexity analysis** — the 4-to-8-week manual-rebuild estimate: source it, show how AI-assisted discovery changes it.
4. **Examples/figures** — discovery-package excerpts, before/after comparisons, complexity classification table.

**Feeds from:** `solutions.md` (contains the `New_InjCentered_Daily2_3957.twbx` example).
**Still needed:**
- Pick 2–4 additional workbooks, run the discovery process, capture results.
- Write up cross-case comparison.
- Build at least one summary table and one figure.
- Defend/source the 4–8-week estimate.

---

### Part 7 — Discussion of Results, Ethics, Privacy, AI Disclosure — Missing
Target: ~2–3 pages. **This is a major grading point — treat as load-bearing.**

Subsections:
1. **How findings answer the main RQ** — does the AI-assisted discovery framework work; where it falls short.
2. **How findings answer the subquestion** — which workbook characteristics drive complexity.
3. **Benefits of AI-assisted discovery** — speed, repeatability, knowledge capture independent of Tableau access.
4. **Limitations** — AI hallucination, missing semantic context, inability to recover undocumented business intent.
5. **Business-continuity and cost implications** — retiring Tableau, dual-tool cost, staff-turnover resilience.
6. **Security and privacy** — proprietary enterprise data, confidentiality of SQL and field names, handling of California regulatory data, redaction approach.
7. **Ethical considerations** — responsible AI use, human validation of AI output, risk of over-trusting AI-generated documentation, attribution of extracted knowledge to originating domain experts.
8. **AI-use disclosure for this paper** — which tools were used (Claude / other), for what (lit-note drafting, structure, discovery packages), and how output was validated.

**Feeds from:** none directly — this section is missing entirely.
**Still needed:** full draft. Create a standalone `ethics.md` scratch file first, then fold into the report.

---

### Part 8 — Conclusions and Closing Thoughts — Missing
Target: ~1 page.

Subsections:
1. Summary of findings tied to the research question.
2. Contribution — the AI-assisted knowledge-preservation framework as reusable beyond this case.
3. Lessons learned.
4. Future work — full pipeline automation, Spotfire-side reconstruction validation, broader sample, other BI platforms.

**Feeds from:** to be written after analysis and discussion.
**Still needed:** full draft.

---

### Part 9 — Appendix — Missing
Target: as needed (not counted toward 10–20 page body).

Contents:
1. **Project schedule** — week-by-week plan from topic selection through 5/5/26 submission.
2. **Hours log** — categorized (reading, writing, analysis, AI work, presentation), totaling 40–60 hours.
3. **Reference list** — consolidated APA for all 12–15 sources.
4. **Discovery-package example** — sanitized output for at least one workbook.
5. **Figures / screenshots** — if they support the analysis.
6. **Code / scripts / notebook links** — if used in the discovery work.

**Feeds from:** the ten lit-note files (citations), `solutions.md` (discovery example).
**Still needed:** schedule document, hours log, consolidated references.

---

### Part 10 — Three-Minute Thesis — Missing
Target: 3:00 max spoken, one static slide.

Components:
1. **Script** — written to be spoken; non-specialist audience.
2. **One static slide** — no transitions, no animations, no media. One compelling visual plus minimal text.
3. **Talk arc** — hook → problem (lost knowledge during BI migration) → approach (AI-assisted discovery) → finding (what was preserved, what was not) → why it matters beyond oil.
4. **Delivery format** — one-slide PowerPoint with audio OR selfie video.

**Feeds from:** `introduction.md` (narrative), `solutions.md` (finding).
**Still needed:** script draft, slide design, recording.

---

## What We Have vs. What We Do Not Have — Summary Table

| Part | Status | Source material exists? | Written section exists? |
|------|--------|-------------------------|-------------------------|
| 1 Title page | Missing | N/A | No |
| 2 TOC | Optional | N/A | N/A |
| 3 Introduction | Partial | Yes (`introduction.md`) | No (needs rewrite) |
| 4 Literature Review | Partial | Yes (10 lit notes) | No (needs synthesis + 2–5 more sources) |
| 5 Methods | Partial | Yes (`solutions.md`, `introduction.md`) | No |
| 6 Analysis | Partial | Yes (1 workbook example) | No (need 2–4 more workbooks) |
| 7 Discussion + Ethics + AI disclosure | Missing | No | No |
| 8 Conclusions | Missing | No | No |
| 9 Appendix (schedule, hours, refs) | Missing | Partial (citations in notes) | No |
| 10 Three-Minute Thesis | Missing | Narrative material only | No |

---

## Writing Sequence Recommendation

To minimize rework, write in this order:
1. Lock title + research question (done in this file).
2. Draft methods (Part 5) — forces sample, evaluation framework, and scope commitments.
3. Complete analysis on 2–4 more workbooks (Part 6 fuel).
4. Write literature review (Part 4) — now you know which sources matter to your actual method.
5. Draft ethics/AI disclosure (Part 7) — load-bearing, don't leave for last.
6. Write introduction (Part 3) — easier to introduce a paper whose body exists.
7. Write analysis (Part 6) and discussion (Part 7) prose.
8. Write conclusion (Part 8).
9. Build appendix: schedule, hours log, references (Part 9).
10. Write 3MT script and slide, record (Part 10).
11. Final title page, proofread, format (Part 1).
