# Lecture Notes: Process Modeling & Data Flow Diagrams

**Date:** Tuesday, February 17, 2026  
**Time:** 2:32 PM – 3:46 PM (two recordings)  
**Course:** IFSC 71003 – Info Sys Analysis  
**Instructor:** Daniel Berleant

---

## Preamble: Module M5 Intro & Homework 5 (2:32 PM – 2:56 PM)

Daniel announced the start of **Module M5**, transitioning from root cause analysis to process modeling, with data flow diagrams as the day's depth topic. Thursday would shift from HTML to **JavaScript** — a general-purpose programming language that can be embedded in web pages.

### HW4 & HW5 Overview

- **HW4** was due that day; no questions raised
- **HW5** introduced with AI-integration guidelines:
  - Use AI to **enhance learning, not substitute** for it
  - "Feel the brain strain" — read source material, look away, then type your own understanding
  - Paraphrasing directly from AI output teaches very little

### HW5 Tasks

| Question | Task |
|----------|------|
| Q0 (not graded) | Security check — remove names, passwords, credit cards, DOB, PINs from forms to avoid site blocking |
| Q1 | Make **3 manual (non-AI) HTML changes** to your sandbox code |
| Q2 | Use provided **Socratic questioning prompt** with AI to analyze a JavaScript code snippet; submit transcript |
| Q3 | Skipped |
| Q4 | **Alphabetize & number** all HTML commands; add new **JavaScript section** with 4 output-type buttons |
| Q5 | Design a website (sport-themed), explain it, create a **data flow diagram** (+ level one process) |

### Socratic Questioning Prompt

- Tell AI it's an "expert at Socratic dialogue and Socratic questioning"
- AI gives hints/snippets, asks **multiple-choice questions** that make students think
- If answered incorrectly, AI follows up with more hints until understanding
- Students can customize: change to true/false, adjust difficulty, request shorter/longer explanations
- Graded on **effort**, not correctness of answers

### Security Discussion (Thomas Wallace)

- Thomas raised concern about **malware attack vectors via shared AI chat logs**
- Daniel acknowledged the risk and suggested avoiding the share-link approach until investigated further
- Alternative: copy-paste the full chat transcript instead of sharing links

---

## Summary

Daniel introduced process modeling as a systems analysis technique for visualizing and understanding information/business processes. He surveyed several modeling methods — flowcharts, swim lane diagrams, Gantt charts, and BPMN — before focusing on **Data Flow Diagrams (DFDs)** as the primary topic. DFDs use just four symbol types to model how data moves through and is transformed within an IT system. He demonstrated leveling (decomposing a process into sub-diagrams), live-edited Wikipedia's DFD article, and walked through a student registration DFD example.

---

## 1. Process Modeling in Systems Analysis

- **Process modeling** is distinct from root cause analysis
- Goal: understand a system by describing it in a **formalized, visual way**
- Benefits: communicate about processes, identify improvements, understand systems better
- Other systems analysis activities:
  - Root cause analysis
  - Benchmarking (measuring how well processes work)
  - Building test/prototype solutions (then discard and build the real one)
  - Cost-benefit analysis
  - Automation (increasingly: AI vs. human question)
  - Lean Six Sigma toolbox
  - User involvement in system design

---

## 2. Flowcharts

- Non-standardized versions: personal method of drawing shapes
- **First standardization:** "Operation and Flow Process Charts" (1947) — published by the American Society of Mechanical Engineers (before computers were mainstream)
- Standard symbols:
  - **Oval** → Start / End
  - **Rectangle** → Processing
  - **Parallelogram** → Input / Output
  - **Diamond** → Decision (if/else branching)
- Example: robotic vacuum cleaner — check if route finished, check battery, decide to continue or shut off
- Many tools available for drag-and-drop flowchart generation

---

## 3. Swim Lane Diagrams

- Named because they look like a **swimming pool with lanes**
- Lanes (columns or rows) represent different **roles** in the process
- Example: medical setting
  - Patient lane: arrives at hospital
  - Nurse lane: prepare patient, instruct patient, discharge patient
  - Doctor lane: treats the patient
  - Arrows show flow of control between lanes
- **Recommended limit:** 4–6 lanes (more becomes too complex)
- Two classification types: domain kind vs. task kind
- Fun fact: Daniel showed a swim lane diagram in Telugu script and had an AI translate it

---

## 4. Gantt Charts

- Show horizontal bars representing **timelines** of different project sub-parts
- Display: when tasks start, when they end, and **dependencies** between tasks
- Example: one task must complete before another can begin; some tasks overlap
- Different colors can indicate different categories
- Will be covered in more depth later in the course

---

## 5. Business Process Model and Notation (BPMN)

- Standardized set of **graphical symbols** for modeling business processes
- Free and paid tools available for drag-and-drop diagram creation
- Daniel's anecdote: submitted a paper with a block model → reviewer requested BPMN → converted using an online BPMN tool
- Key point: better to use a **standard language** that communicates well rather than inventing your own notation

---

## 6. Data Flow Diagrams (DFDs) — Main Topic

### Four Symbol Types

| Symbol | Shape | Purpose |
|--------|-------|---------|
| **External Entity** | Sharp-cornered rectangle | Inputs/outputs — not part of the system (customers, students, outside systems) |
| **Process** | Rounded-corner rectangle (or circle) | Transforms/processes data — "where the action happens" |
| **Data Store** | Parallel lines (open or closed on one end) | Database, file, or any data repository |
| **Data Flow** | Labeled arrow | Shows movement of data between components |

- Only **4 types** of symbols — deliberately simple
- Trade-off: DFDs **cannot express decisions** (unlike flowcharts)
- If decision-making is central, use flowcharts instead

### Student Registration Example

- **External entities:** Academic department (input), Faculty member (output), Student (input & output)
- **Data stores:** Offered courses, Course enrollment, Students database
- **Processes:**
  1. Build course schedule (from offered courses)
  2. Enroll students (takes enrollment requests → produces schedules and enrollment records)
  3. Produce class list (combines data from 3 databases → sends to faculty)
- Processes are **numbered** (1, 2, 3)

---

## 7. Leveling (Decomposition)

- **Leveling** = taking a single process and creating a new, more detailed DFD for its internals
- **Context diagram** (top level): one single process with all inputs, outputs, and data stores
- Level down: break that single process into sub-processes (e.g., processes 1, 2, 3)
- Level again: sub-processes of process 2 become **2.1, 2.2, 2.3**
- Level yet again: sub-sub-processes of 2.3 become **2.3.1, 2.3.2, 2.3.3**
- Tree structure: each level adds more detail for larger/more complex systems
- **Homework connection:** create a DFD, then pick one process and level it into a second, more detailed DFD

---

## 8. Wikipedia Live Edit

- Daniel edited the Wikipedia article on Data Flow Diagrams during class
- Fixed awkward English phrasing:
  - Changed "DFD is a system" → "A DFD is a graphical modeling method"
  - Changed "created by analysts based on…" → "often based on interviews with system users"
  - Improved entity naming guidance: should be comprehensible to modelers, experts, non-experts, and system analysts
- Showed edit history — article is infrequently edited (last edits months apart, some by bots)
- Encouraged students: "you can edit Wikipedia too"

---

## Key Takeaways

1. Process modeling formalizes system understanding through **visual diagrams**
2. Multiple methods exist (flowcharts, swim lanes, Gantt, BPMN, DFDs) — each with trade-offs
3. DFDs are deliberately **simple** (4 symbols) but powerful for modeling data movement
4. **Leveling** lets you zoom into any process for more detail, creating a hierarchy
5. The **context diagram** is the highest-level view (one process, all I/O)
6. DFDs **cannot model decisions** — use flowcharts for that
7. Always use **standard notations** rather than inventing your own
