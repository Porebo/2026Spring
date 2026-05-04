# AI Session Handoff Summary
**Created:** May 4, 2026  
**Purpose:** Pick up exactly here tomorrow — no re-orientation needed  
**Due:** May 5, 2026 at 9:59 PM PDT (TOMORROW)

---

## 1. Paper Identity

**Title (working):** Data-Driven Migration of Enterprise Analytical Assets: A Case Study in Tableau™-to-Spotfire™ Conversion at a Major Oil and Gas Producer

**Course:** IFSC 77003 — Data Science and Technologies  
**Program:** Graduate (MS)

**Subject:** Real-world project at Aera Energy / CRC (California Resources Corporation). Author is the team lead of the Tableau-to-Spotfire migration program in the Asset Development department. Aera was acquired by CRC; Tableau license expires December 2026. The project builds a data-driven pipeline to select, score, and convert Tableau workbooks into Spotfire.

**Key constraint:** No personal names anywhere in the paper — role-based descriptions only (team lead, Spotfire expert, junior developer, domain expert, etc.).

---

## 2. File Map

All files live in:  
`C:\Users\leste\OneDrive - UA Little Rock\2026\2026Spring\IFSC_77003_Data_Science\w14_final_project\`

| File | Part | Status |
|---|---|---|
| `01_introduction.md` / `.docx` | Part 1 — Introduction | ✅ Complete, committed to git |
| `02_literatureReview.md` / `.docx` | Part 2 — Literature Review | ✅ Complete, committed to git |
| `03_dataSelectionResearchDesignAndMethods.md` / `.docx` | Part 3 — Data Selection, Research Design & Methods | ✅ Substantially complete — **NOT YET committed** |
| `04_analysisWork.md` / `.docx` | Part 4 — Analysis Work | ✅ **FULLY COMPLETE** — all 10 sections, docx generated — **NOT YET committed** |
| `05_discussionEthicsPrivacyAIDisclosure.md` | Part 5 — Discussion / Ethics / AI Disclosure | ❌ **PLACEHOLDER ONLY — must be drafted tomorrow** |
| `06_conclusionsAndClosingThoughts.md` | Part 6 — Conclusions | ❌ **PLACEHOLDER ONLY — must be drafted tomorrow** |
| `07_appendix.md` | Part 7 — Appendix | ❌ Placeholder — lower priority |
| `08_threeMinuteThesis.md` | Part 8 — Three-Minute Thesis | ❌ Placeholder — separate deliverable |
| `_H_probability_model_sql.sql` | Reference SQL: Probability model | ✅ Saved with inline comments |
| `_I_roi_priority_scoring_sql.sql` | Reference SQL: ROI priority model | ✅ Saved with inline comments |
| `04_analysisWork_Image_1.png` | Figure 4.2 — Spotfire dashboard screenshot | ✅ Embedded in docx |
| `04_analysisWork_Image_2.png` | Figure 4.1 — ENGSB ER diagram (exported from Relational_1.svg) | ✅ Embedded in docx |

---

## 3. Part 4 Section Map (complete — for reference only)

| Section | Title | Status |
|---|---|---|
| 4.1 | Analysis Scope and Approach | ✅ |
| 4.2 | Data Preparation and Schema | ✅ |
| 4.3 | Predictive Usage Sustainability Model | ✅ |
| 4.4 | ROI Priority Scoring Implementation | ✅ |
| 4.5 | Selection Results | ✅ |
| 4.6 | Conversion Fidelity Findings | ✅ |
| 4.7 | Labor and Feasibility Analysis | ✅ |
| 4.8 | Integrated Findings Across Selection, Conversion, and Labor | ✅ |
| 4.9 | Limitations of the Analysis | ✅ |
| 4.10 | From Analysis to Governance *(renamed from "Transition to Part 5")* | ✅ |

---

## 4. What Must Be Done Tomorrow

### Priority Order

1. **Draft Part 5** (Discussion / Ethics / Privacy / AI Disclosure) — 2 to 3 pages — **this is a major grading area**
2. **Draft Part 6** (Conclusions and Closing Thoughts) — ~1 page
3. **Git commit** Parts 3 and 4 (both complete but uncommitted)
4. **Part 7 Appendix** — assemble hours log, APA references, sanitized discovery example
5. **Part 8 Three-Minute Thesis** — script + one slide (separate deliverable, may be submitted after paper if needed)

---

## 5. Part 5 — What to Draft (content brief)

File: `05_discussionEthicsPrivacyAIDisclosure.md`  
Target: 2–3 pages of academic prose

### Required content per the assignment:
- Interpretation of findings
- Limitations (some already in 4.9 — cross-reference or summarize)
- Business implications
- Security considerations
- Privacy considerations
- Ethics
- AI-use disclosure

### Themes ready to write from Part 4's closing paragraph (4.10):
- **Institutional knowledge stewardship** — 660 workbooks collapsed to 20; the discarded 640 represent embedded knowledge not preserved
- **AI in consequential decisions** — AI-assisted discovery ranked workbooks; humans validated but AI shaped the shortlist; governance of this needs examination
- **Training access asymmetry** — Tableau's open ecosystem vs. Spotfire's enterprise-negotiated access; structural risk to sustainability
- **Platform dependency concentration** — single Spotfire expert is de facto training resource; single-point-of-failure
- **License expiration as governance lever** — forced organizational action by hard deadline; contrast with proactive governance
- **Privacy:** Tableau telemetry identifies individual user behavior by name/email; cohort construction used PII joins; data was stored in ENGSB (Engineering Sandbox), not production DW
- **Security:** ENGSB is Oracle staging, not production; SQL views contain no raw PII output but build from PII joins; contractor access to ENGSB scope was limited
- **AI-use disclosure:** GitHub Copilot (Claude Sonnet 4.6) was used throughout this paper for prose drafting, SQL commenting, and document structuring; all domain facts, SQL, project data, and analysis were provided by the author; AI did not have access to corporate systems

### Suggested section outline for Part 5:
```
5.1 Interpretation of Principal Findings
5.2 Business Implications for Enterprise Analytics Migration
5.3 Data Privacy and User Telemetry Considerations
5.4 Security Boundaries and Data Stewardship
5.5 Ethical Use of AI in Migration Decision-Making
5.6 AI Assistance Disclosure
```

---

## 6. Part 6 — What to Draft (content brief)

File: `06_conclusionsAndClosingThoughts.md`  
Target: ~1 page

### Required content:
- Summary of the project and its findings
- Contribution (what this paper adds that prior work did not cover)
- Lessons learned
- Future work

### Angle to use:
- This is the first documented case (in the literature reviewed) of using Oracle-staged normalized telemetry + quantitative scoring models to drive an enterprise BI migration selection
- Lesson: staffing and training access constrain delivery more than technical complexity does
- Future work: extend model to remaining ~640 workbooks, formalize Spotfire training program once vendor access is secured, automate conversion handoff pipeline

---

## 7. Key Technical Facts (needed across all remaining parts)

### ENGSB Schema (8 tables used):
Core: `TBX_PROJECT_DMN`, `TBX_WORKBOOK_DMN_2`, `TBX_VIEW_DMN_2`, `TBX_PERSON_DMN`, `TBX_USAGE_VIEWS_FACT_2`  
Enrichment: `TBX_USER_DMN_2`, `TBX_PERSON_REGISTRY_FACT`, `TBX_DEPARTMENT_DMN`

### Probability Model (Section 4.3):
- View: `ENGSB.TBX_MAIN_PROBABILITY_FOCUS_2`
- 4 normalized features: recency (40%), persistence (30%), adoption (20%), volume (10%)
- Alignment tax: × (focus_hits / enterprise_hits)
- Free Rider threshold: ownership ratio < 0.15
- Buckets: HIGH SUSTAINABILITY (≥0.50), MODERATE ADOPTION (≥0.25), LOW ADOPTION/STALE, ENTERPRISE UTILITY (Free Rider), NOT SCORED

### ROI Priority Model (Section 4.4):
- View: `ENGSB.TBX_MAIN_DETAILED_VIEW_2`
- Activity floor: < 10 focus visits = EXCLUDED
- Alignment hard cut: ratio < 10% = ENTERPRISE FUNDING REQ.
- Score = 0.20×effort + 0.30×utilization×alignment + 0.50×usage_interest×alignment
- Priority buckets: PRIO 1 (≥0.35), PRIO 2 (≥0.10), PRIO 3 (<0.10)
- Tiers: TIER 1 STRATEGIC CORE (≥0.40) → TIER 5 ENTERPRISE FUNDING

### Selection Results:
- 660 workbooks survived validity filter
- 20 workbooks met all three gates (probability + ROI + user validation)

### Team:
- 1 CRC Spotfire platform expert (part-time)
- 1 CRC junior Spotfire developer (part-time)
- 2 former Aera Tableau experts / zero Spotfire (part-time)
- 2 business SMEs (validation only)
- Team lead = author = full-time, former Aera employee

### Contractor engagement:
- Approved, communication sent to management 4/29/2026
- 3 reports / 8 dashboards
  - SA PROCESS High Water Cut List (Thermal RMT)
  - Goldman Run Ticket (Thermal RMT)
  - West Flank Disposal Temperature Survey (Asset Strategy)
- $4,400 USD, one-month fixed, June 2026 target
- Two-gate acceptance: technical sign-off + user sign-off

### Key dates:
- 05/29/2025 — Management communication
- 06/04/2025 — Project initiation
- 12/30/2025 — Initial phase target
- 12/2026 — Tableau license expires (hard sunset)

---

## 8. Pandoc Commands

```powershell
cd "C:\Users\leste\OneDrive - UA Little Rock\2026\2026Spring\IFSC_77003_Data_Science\w14_final_project"

pandoc "03_dataSelectionResearchDesignAndMethods.md" -o "03_dataSelectionResearchDesignAndMethods.docx"
pandoc "04_analysisWork.md" -o "04_analysisWork.docx"
pandoc "05_discussionEthicsPrivacyAIDisclosure.md" -o "05_discussionEthicsPrivacyAIDisclosure.docx"
pandoc "06_conclusionsAndClosingThoughts.md" -o "06_conclusionsAndClosingThoughts.docx"
```

---

## 9. Git Status Reminder

- **Branch:** `copilot/website-sync-fixes-20260428`
- **Uncommitted:** Parts 3 and 4 (fully drafted)
- **Not yet drafted:** Parts 5, 6, 7, 8

Commit command after drafting tomorrow:
```powershell
cd "C:\Users\leste\OneDrive - UA Little Rock\2026\2026Spring"
git add .
git commit -m "Add Parts 3, 4, 5, 6 drafts - final paper content"
git push
```

---

## 10. Style Rules (enforce throughout)

- No personal names — role-based only
- KaTeX `$$...$$` for scoring equations
- Tables for classification rules and feature inventories
- Part 3 = what and why | Part 4 = how and results | Part 5 = so what / governance | Part 6 = conclusions
- ENGSB = Engineering Sandbox (Oracle staging schema, not production)
- Author = team lead throughout

---

*This summary was generated by GitHub Copilot (Claude Sonnet 4.6) at the end of the May 4, 2026 session.*
