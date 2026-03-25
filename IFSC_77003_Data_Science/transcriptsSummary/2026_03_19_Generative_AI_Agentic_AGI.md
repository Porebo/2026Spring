# Lecture Summary: Generative AI, Citizen Development, Agentic AI & AGI
**IFSC 77003 – Data Science & Technologies | March 19, 2026 | Dr. Elizabeth Pierce**

---

## Administrative Reminders
- Spring break: take 45 minutes to watch **Tom Davenport's keynote** on companies using AI (shared via course link).
- Continue working on your **data science projects** — think carefully about domain expertise, not just data analysis.
- UALR AI policy and student resource page posted; Grammarly and Google Gemini/Microsoft Copilot available via university accounts.

---

## Major Lecture Sections

### 1. Generative AI — Review and Risks
Generative AI differs from traditional AI in that it *creates new content* — text, images, music, audio, and code — by learning patterns from massive datasets. Key models: ChatGPT, Google Gemini, Microsoft Copilot. The 2017 Google Transformer paper was a foundational breakthrough.

**Risks and concerns:**
- **Data privacy**: employee prompts can inadvertently leak trade secrets or sensitive data into public AI systems; internal ChatGPT deployments may expose confidential HR data (e.g., salary information) if not properly scoped.
- **Misinformation / Hallucinations**: probabilistic generation produces realistic-looking but factually wrong content.
- **Intellectual property**: copyright law currently requires human authorship; AI-generated images/text occupy a legal gray area.
- **Job market disruption**: ongoing debate about which roles AI will augment vs. displace.

### 2. UALR AI Policy & Grammarly Demo
Dr. Pierce highlighted UALR's developing AI policy page and recommended **Grammarly** as a practical writing assistant (spotting misspellings, punctuation errors, suggesting concise phrasing). Google Gemini and Microsoft Copilot are accessible through university Gmail and Microsoft accounts.

Live demo: Google Gemini generated an image of a gray tabby cat climbing an oak tree — illustrating how prompt engineering can produce professional-quality visuals and how style variations (oil painting, watercolor, Dr. Seuss style) can be specified.

### 3. Guiding Students on AI Use — "Be the Driver"
The key message: **students must stay in control**. AI should assist, not drive. Risks of over-reliance:

- A cohort of research-methods students submitted AI-generated research proposals; on the surface they looked correct, but the literature reviews contained hallucinated references and the cited articles didn't match their descriptions. The proposals couldn't be implemented.
- **Tilly Norwood** (fully AI-generated influencer/model) required over 6 months of development by 18 people — demonstrating that even cutting-edge generative output demands significant human oversight to be usable.

**Recommended student AI uses:**  
Brainstorming, outlining, explaining complex topics (e.g., gradient descent), extra practice/tutoring, debugging code, proofreading — always with the student verifying and understanding the output.

### 4. Tom Davenport on "Citizen Development"
Tom Davenport (Babson College professor, 200+ Harvard Business Review articles) presented research on enterprise AI adoption. The central theme is **citizen development**: AI tools are enabling non-IT business staff to build applications, automate workflows, and perform data analysis without traditional programming.

**Why this matters:**
- Eliminates the slow IT backlog: business users can now build working prototypes that IT then reviews and hardens for production.
- Business users can design low-code/no-code workflow automation — mapping manual email-handoff processes into automated, rule-based systems.

**Tools highlighted (citizen use):**
| Category | Tools |
|---|---|
| App Development | Power Platform, Airtable, Mendix, OutSystems |
| Data Analysis | Tableau Business Science, H2O.ai, Data Robot, ChatGPT, Alteryx, Qlik, Power BI |

**Risks of citizen development:** stale data, inconsistent data versions, incorrect variable transformations. IT and data specialists remain essential as reviewers and stewards.

**Career advice:** The head of credit risk at a Canadian bank said he'd prefer someone who deeply knows the business using automated ML over a pure data scientist unfamiliar with the domain. Domain expertise + data science skills = career advantage.

### 5. Citizen Development Case Studies

| Company | Program | Key Metrics |
|---|---|---|
| **Dow Chemical** | Citizen data science (R&D/tech services) | 3,000+ people upskilled; 1,200 active users; 600+ apps built; 50–100 hrs/app saved/year |
| **AT&T** | Citizen automation + citizen data science | 575 online courses; 3,000+ automation bots; 92% built by non-IT staff; 16M minutes of labor saved/year; 20× ROI |

AT&T also runs an **ML Ops** program — addressing the challenge of keeping deployed machine learning models updated in 24/7 production environments without downtime (analogous to how Amazon achieves zero-downtime DevOps deployments).

### 6. Agentic AI — The Next Frontier
Agentic AI goes beyond reactive generation. It is **proactive**: given goals and tool access, an AI agent independently plans and executes multi-step tasks.

**Examples:**
- A travel-booking agent uses APIs, email, and Slack to plan and book an entire trip with credit card authorization — without human involvement after initial approval.
- Warehouse monitoring agents watch camera feeds and alert security to anomalies (intruders, leaks, smoke).
- Cybersecurity agents that automate first-level network monitoring, freeing analysts for complex issues.
- Banking: fraud detection, financial advice, automated loan approvals.

**Critical concern — the entry-level pipeline problem:** If AI handles junior-level work, how do people develop the experience to reach mid and senior roles? Proposed solution: mandate human-AI pairing at entry level, ensuring humans develop expertise alongside the AI.

**Frameworks for building agentic AI:** Langchain (pioneered AI development platforms), plus many newer competitors. Required skills: Python or JavaScript. Many platforms offer free tiers.

### 7. Artificial General Intelligence (AGI)
AGI — autonomous, highly adaptive AI capable of teaching itself, equal to or exceeding human cognitive ability — is still **theoretical**.

**Prediction landscape:**
- Elon Musk: AGI by "Christmas" (same source who predicted full self-driving cars by now — not yet delivered).
- Mainstream consensus: 5–10 years.
- Other researchers: 50–60 years.
- Dr. Pierce's view: AGI will follow a path similar to autonomous vehicles — driver assistance is real and valuable now; full level-4/5 autonomy is likely 20+ years away.

**Key barriers:** Hardware limits; data requirements; enabling machines to *reason* rather than *predict the next token*; embodied intelligence (human cognition integrates sight, hearing, smell, touch — replicating this in machines is unsolved).

### 8. AI Ethics Overview
- **Bias**: models trained on historically biased data will institutionalize that bias; synthetic data generation is a potential remedy.
- **Explainability**: regulators and customers require explanations for AI decisions (e.g., loan denials); "we don't know" is unacceptable.
- **Autonomy & control, job displacement, security misuse**: ongoing societal challenges.
- **High-stakes domains**: healthcare, criminal justice, banking, housing require extra scrutiny.
- **Environmental impact**: AI's energy and resource footprint is a growing research concern.
- **Education balance**: developing students' own expertise while encouraging responsible AI use remains an open pedagogical challenge.

---

## Key Takeaways
1. Generative AI is powerful but probabilistic — always verify, always cite, always be the driver.
2. Citizen development is reshaping IT workflows; non-programmers increasingly build and automate with low-code tools.
3. Agentic AI is the next evolution — proactive, multi-step, tool-using AI systems.
4. AGI remains theoretical; realistic timelines are debated, and the self-driving car analogy is instructive.
5. Domain expertise + data science skills is the career combination that companies prize most.

---

## Tools & Resources Referenced
- **Google Gemini / Microsoft Copilot** — available via UALR university accounts
- **Grammarly** — writing assistant for email/prose editing
- **Cognitive Class** — prompt engineering tutorials (< 1 hr each)
- **Langchain** — AI application development framework
- **Power Platform, Airtable, Mendix, OutSystems** — citizen app-dev tools
- **Tableau Business Science, H2O.ai, Alteryx, Qlik, Data Robot** — citizen data science tools
- **Tilly Norwood** — YouTube example of fully AI-generated influencer
- **Tom Davenport** — Chief Data Officer & Information Quality Conference keynote (45 min, recommended viewing over spring break)

---

## Next Steps
- Spring break — no class; watch Tom Davenport's presentation.
- Continue data science project; identify your domain and business question.
- Explore one of the Cognitive Class modules or try building a simple agentic AI app on a free-tier platform.
