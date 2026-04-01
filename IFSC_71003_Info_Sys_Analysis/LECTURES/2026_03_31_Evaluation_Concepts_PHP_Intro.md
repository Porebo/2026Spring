# Lecture Notes: Evaluation Concepts & PHP Introduction Preview
**IFSC 71003 – Information Systems Analysis | March 31, 2026 | Daniel Berleant**

---

## Administrative Updates

- **Welcome back from spring break.** Approximately 4 weeks left in the semester.
- **Curriculum change:** The Lean Six Sigma material has been replaced with a new unit on **Evaluation**. Today begins that unit; it may continue into next Tuesday depending on depth.
- **HW9 is due tonight (March 31).** No questions surfaced in class.
- **Thursday (April 2):** Introduction to **PHP** — a third web language (after HTML and JavaScript) that completes the basic web stack.
- **Note preparation:** Daniel prepared the lecture notes in Notepad (.txt), then used both Claude and Gemini to convert them to HTML for presenting. He compared the outputs — both did a reasonable job but each omitted or altered small items. The original .txt remains the authoritative reference. Gemini added spurious `<cite>` tags.

---

## HW10 Overview

HW10 covers two parallel tracks: PHP fundamentals and Evaluation application.

### PHP Track
- Take your existing **HTML + JavaScript demo page** and add one PHP command: the **`echo`** command.
- **Rename the file** from `.html` to `.php`. This is required for the PHP server engine to process it; an `.html` extension causes PHP code to be treated as literal text printed to the screen.
- Changing the extension will not break the existing HTML or JavaScript.
- Thursday's class will provide a full PHP introduction and explain why you can't run PHP just by clicking a button (requires a server context).
- Use **Socratic dialogue with an AI** to learn about PHP. Screenshot your transcript as evidence (do not let the AI generate the Q&A for you — it must be a real back-and-forth).

### Evaluation Track
1. **Evaluation game:** Feed today's lecture notes to an AI and ask it to make a quiz/game about Evaluation. Play the game, hand in the link and a screenshot.
2. **Evaluate Blackboard:** Using the evaluation concepts covered in today's lecture, evaluate the Blackboard LMS. (Details on what good evaluation means — see lecture below.)
3. **Project progress:** Work on individual or team project. Teams must create a **separate InfinityFree account** (do not share your personal account). Send Daniel the project link and team members so he can maintain a record for the end-of-semester demo.

---

## What Is Evaluation?

**Dictionary.com definition (critique):** "An act or instance of evaluating or appraising." This definition is circular — it uses a form of the same word being defined. The word "appraising" provides the off-ramp.

**Better definition:** A **systematic quality assessment**.  
- Evaluation is not just *whether* something works — it's *how well* it works.
- "Works / doesn't work" is a binary (pass/fail) evaluation. Better evaluation uses a **scale**: categorical (A/B/C/D/F) or numerical (continuous spectrum).

**In technical and professional contexts**, evaluation becomes more formalized: weighted criteria, documented protocols, defined percentages for each factor.

---

## Key Considerations in Any Evaluation

Before you can evaluate, several foundational questions must be answered:

| Question | Examples |
|---|---|
| **What concerns are being evaluated?** | In this course: spelling is not graded. In an English class: it is. An IT person evaluates classroom connectivity; an interior decorator evaluates color/warmth. |
| **Whose concerns are being served?** | For grades: student? Instructor? University? Parents? Employer? All of the above? Someone has to decide. |
| **How rigorous is the standard?** | 90% threshold for an A vs. 10% threshold — same grading system, very different standards. True for DFDs, FMEAs, or any artifact. |
| **What factors are included?** | You must explicitly define what goes into the evaluation — and provide transparency about it. Evaluatees *should* know the criteria in advance. |
| **Who does the measuring?** | TA, instructor, expert, customer, the person being evaluated? Each introduces different biases and perspectives. |
| **What do you do when appraisal is uncertain?** | Accept a fishbone diagram as-is, or require more detail? Different philosophies have different thresholds. |

**Important:** Evaluation criteria are often *unstated* but assumed (an interior decorator probably won't evaluate wiring connectivity), or may even be *wrong* (evaluating the wrong dimension entirely). Evaluation is never fully neutral.

---

## Evaluation Is Both Objective and Interpretive

Evaluation is **not purely data-driven**. Even with correct data, evaluation involves interpretation:
- **Objective part:** collecting data, computing numbers, checking boxes.
- **Interpretive part:** deciding *what* data to collect, *why* those metrics, *who* decides what counts, and *how* to interpret ambiguous results.

Likert-scale course evaluations (1–5 agree/disagree) are an example: two students who feel exactly the same way may still choose different numbers.

> *True or false: "Evaluation in systems analysis is straightforward once you have the right data."*  
> **False.** Having data is necessary but not sufficient. The "right" data is itself a judgment call — an interior decorator and an IT person define "right data" completely differently. You still need to decide what the data means, who collected it, and whether it was the right data to begin with.

---

## Stakeholders

A **stakeholder** is a person or group with a stake in the outcome — they care what the evaluation finds.

Stakeholders include: **users, investors, engineers/IT staff** who built the system, and the organization.

> *Can two stakeholders reach opposite conclusions about whether a system is working?*  
> **Yes.** They may have different data, different concerns, and different standards. (Example: "I personally have my doubts about whether Blackboard is working well." — Daniel Berleant)

---

## Dimensions of Evaluation

Just as information quality has multiple dimensions (timeliness, correctness, etc.), evaluation can be applied along several dimensions. Weakness in *any one* dimension compromises the entire evaluation.

| # | Dimension | Key Question | Example |
|---|---|---|---|
| 1 | **Overall system** | Does it work? How well? Give it a rating. | Does the demo page load correctly? |
| 2 | **Criteria** | What does "works" mean? What standards apply? | Does it meet speed requirements? Is it fast enough for real-time use? |
| 3 | **Analysis process** | Was the evaluation done well? | Was the measurement methodology sound? Were the right tests run? |
| 4 | **Evaluators** | Who did the evaluation? Are they independent and qualified? | Can an evaluator evaluate themselves? (Generally: no, in formal settings.) |
| 5 | **Timing** | When was the evaluation done — during the project (formative) or after (summative)? | Evaluate progress throughout, not just at the end, to make corrections. |

**Mars Climate Orbiter example:** The spacecraft ($125M) was destroyed in 1999 when entering Mars' atmosphere at the wrong angle. One contractor used pound-force·seconds; NASA assumed Newton·seconds. Each subsystem passed its own evaluation — but **Dimension 3 (analysis process)** failed: no one evaluated the interface between the two software chunks. The units mismatch went undetected.

---

## Multiple-Choice Review Questions (Class Discussion)

**Q: Which dimension applies when the issue is evaluating project *success* vs. tracking project *progress*?**  
→ **Dimension 5 (Timing).** The question is simply *when* you evaluate — at the end (success) vs. throughout (progress tracking). Note: if you can't trust a late-stage evaluation, you're also touching Dimension 4.

**Q: Which dimension applies when the goal is to anticipate cost or time overruns as early as possible?**  
→ **Dimension 5 (Timing)** — specifically, evaluating *early and continuously* while the project is underway.

**Q (True/False): If a system meets all its stated goals, the evaluation is complete.**  
→ **False.** Meeting *stated* goals addresses Dimension 1, but: the stated goals may themselves be wrong (Dimension 2); the measurement process may be flawed (Dimension 3); the evaluators may be biased or compromised (Dimension 4); and new criteria may emerge over time.

---

## Evaluator Independence

Evaluators can be corrupted by:
- **Organizational pressure:** evaluators hired by the project's sponsor may feel pressure to deliver positive results.
- **Self-interest:** an evaluator doesn't want to lose their job for giving an unflattering-but-accurate assessment.
- **Conflict of interest:** placing someone in their own evaluation chain. (Daniel declined to participate in a case where a colleague was in his own promotion review chain.)

**Solution: third-party independent evaluation.** Example: Underwriters Laboratories (UL) certifies electrical appliances. An external lab has no incentive to please the manufacturer.

**Space Shuttle Challenger (1986):** Engineers knew the O-rings would fail in cold weather. Under intense real-time management pressure, they approved the launch anyway. The organizational pressure on evaluators overrode valid technical judgment.

---

## Evaluation Failure Case Studies

### Case 1 — Personal Life: Study Habits
A student evaluates their study habits by **counting hours studied**. They budget more hours; grades don't improve.

**What went wrong:** Hours is an easy metric to measure, but *quality and method* of study was the bottleneck — not quantity.

**Better approaches:**
- Set learning goals per session; measure goal completion rate
- Test different study methods and compare quiz results
- Track previous failure areas and measure improvement specifically in those

### Case 2 — Mobile Health App in a Developing Country
A health app is deployed to rural clinics in a developing country. Evaluation tracks: *system uptime* and *new account registrations*. Results look great — system pronounced a success. Then the project collapses.

**What went wrong:** Wrong criteria entirely.

| What was measured | What should have been measured |
|---|---|
| System uptime | Availability of local IT support staff |
| New account registrations | Sustainable staff training and turnover plans |
| *(nothing)* | Integration with existing paper-based workflows |

Without local IT people, the system can't be maintained. Without trainers, staff reverts to old methods. Without workflow integration, the technology is an island. The evaluation was technically sound on Dimension 3 but completely failed on Dimension 2.

### Case 3 — Enterprise IT: Workday at UALR
The University of Arkansas System mandated the **Workday ERP** across all campuses. At UALR, the rollout has been painful and the system is still not fully functional years later.

**What went wrong:**
- No pilot campus tested Workday first before mandating it system-wide
- No staff or faculty usability testing before deployment
- No structured training program; people who knew how to use it were too busy firefighting to help others
- No real assessment of training burden or the hidden salary increase required to attract staff with Workday competency

**Evaluation dimensions missed:**
- Dimension 3: No independent evaluation of usability before rollout
- Dimension 4: Decision-makers (evaluators) appeared to have no direct experience with the system's complexity
- Dimension 5: No formative evaluation during rollout; problems weren't identified until after the full deployment

---

## Key Takeaways

1. Evaluation is multidimensional — all five dimensions must be addressed; failure in one undermines the rest.
2. Having the right data is necessary but not sufficient — *who decides what's "right"* is the harder question.
3. Evaluators must be independent; organizational pressure is a constant threat to valid evaluation.
4. Wrong criteria are the most common cause of evaluation failure — pass all the tests, still fail in practice.
5. Formative evaluation (throughout the project) is almost always more valuable than summative evaluation (after the fact).

---

## Next Class (Thursday, April 2)
- Introduction to **PHP** programming: basic commands, `echo`, server context, why PHP can't run by clicking a button.
- Next Tuesday: Evaluation unit continues (starting from Dimension 4 onward).
