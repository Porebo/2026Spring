# Apr 21, 2026 - Project Decomposition, SDLC, and Delayed Issue Effect

## Opening Logistics and HW13 Framing
- Daniel opened with reminders about HW12, which was due that night, and clarified that the hit counter belonged on the main homework page or homepage listing assignments.
- He explained that project presentations would begin the following Tuesday, with overflow to Thursday if needed.
- E-learning students who could not present live were told to send a working demo-video link by next Tuesday.
- Students were reminded to place a clearly visible project link on their homepage, test microphones ahead of time, and keep frequent backups of their sites.

## Formative vs. Summative Evaluation Example
- Before the main lecture, Daniel revisited formative and summative evaluation through a real project-failure example.
- He described the U.S. military GPS Next Generation Operational Control System as a multibillion-dollar project that was canceled after major cost overruns and unresolved defects.
- The example illustrated a failed summative evaluation at the end of the project and raised the question of whether stronger formative evaluation might have caught problems earlier.

## Systems Analysis Extends Beyond Analysis
- Daniel reviewed systems analysis as a field concerned with improving IT-enabled organizational processes.
- He connected the course to methods such as process mapping, root cause analysis, prototyping, benchmarking, and cost-benefit analysis.
- He emphasized that systems analysts in practice do more than analysis alone: they also participate in design and implementation.
- The class then shifted explicitly into the design phase, especially problem decomposition and system structure.

## Requirements, Specifications, and Design
- Daniel distinguished requirements from specifications.
- A requirement expresses what the system should accomplish, such as responding promptly to user input.
- A specification narrows that into a more concrete statement, such as responding within a stated number of seconds.
- This set up the lecture's move from the "why" and "what" of analysis into the "how" of design.

## Software Development Lifecycle Models
- Daniel reviewed several SDLC models, starting with the classic waterfall model.
- He argued that the simple one-way waterfall diagram is unrealistic because real projects often need to move backward to revise requirements, design, or implementation decisions.
- More realistic diagrams include back arrows, verification steps, and repeated testing throughout development.
- He contrasted these approaches with the older build-and-fix model, where teams repeatedly patch a poorly structured system instead of designing it thoughtfully from the start.

## Spiral, Fountain, Unified Process, and Agile
- The spiral model was presented as another way to visualize staged development with recurring verification and risk analysis.
- Daniel noted that the spiral approach can support canceling a project earlier if risk analysis shows it is no longer cost-effective.
- He also reviewed the fountain model and the Unified Process, especially the idea that specification, design, and implementation can happen iteratively in repeated blocks.
- The Unified Process was explained with a skyscraper analogy: first build the structural framework, then incrementally add usable features.
- Agile was discussed as another iterative model in which each short cycle still includes requirements work, design, coding, and testing.

## Delayed Issue Effect
- Daniel introduced the classic delayed issue effect: the belief that the later a defect is found, the more expensive it is to fix.
- He referenced Barry Boehm's 1981 work, which popularized charts showing defect-fix costs rising dramatically across later lifecycle stages.
- Older examples, especially software distributed physically on disks, made that logic easier to understand because repairing deployed defects required costly replacement and communication efforts.
- Daniel used his early-career experience at a spreadsheet company to show how expensive post-release fixes once were.

## Why the Delayed Issue Effect May Depend on Context
- Daniel then contrasted Boehm's classic view with a later 2016 study of 171 software projects that found no evidence of a universal delayed issue effect.
- The newer conclusion suggested that later fixes are not always dramatically more expensive than earlier ones.
- He proposed that the difference may depend on project type, project size, development process, and modern deployment environments such as cloud software.
- The Google Sheets example showed how server-side updates can make late fixes cheaper than they were in the era of mailed physical media.

## Fred Brooks and Problem Decomposition
- Daniel used Fred Brooks and *The Mythical Man-Month* to discuss why adding people to a project does not automatically reduce delivery time.
- He reviewed four decomposition scenarios: fully decomposable, partially decomposable, non-decomposable, and difficult-to-decompose problems.
- In a fully decomposable project, more people can reduce completion time almost proportionally.
- In partially decomposable work, coordination overhead reduces those gains.
- In difficult-to-decompose projects, adding too many people can actually slow the project down because communication, onboarding, and interference costs become too high.

## Good vs. Bad Decomposition
- Daniel emphasized that decomposition should follow natural functional boundaries rather than arbitrary technical categories.
- A CPU example showed that dividing a system into meaningful functional units is better than grouping all low-level components by type and trying to wire them together afterward.
- He connected this to programming and web development: a good website can be decomposed into sensible pages and components, but both the overall structure and the quality of each part still matter.
- The class ended with AI-generated review questions on delayed issue effect and good decomposition, followed by an attendance check in the chat.

## Main Takeaways
- Systems analysis in practice includes design and implementation, not just analysis.
- Modern lifecycle models still care about order and structure, even when they are iterative.
- The delayed issue effect is historically important, but Daniel framed it as context-dependent rather than universally true.
- Effective project decomposition depends on choosing boundaries that reduce interference and preserve meaningful structure.
