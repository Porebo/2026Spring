# Mar 19, 2026 - JavaScript Conditionals, Else-If, and AI Debugging

## Homework and Schedule Updates
- Classroom audio issues from the prior session were resolved; Daniel confirmed students could hear normally.
- Because of spring break, the next homework due date was moved to the Tuesday after break.
- The class remains focused on building toward a larger end-of-course project.

## Lecture Focus
- Daniel used a live example from his own research workflow to show why "AI can code" does not eliminate the need for human understanding.
- He demonstrated an AI-generated Socratic reading tool (true/false, hint, commentary buttons) and analyzed why some commentary buttons failed.
- The second half of class shifted to JavaScript conditionals, including if, else, and the else-if construct.

## AI Debugging Case Study
- The failing feature was a button with an onclick handler that called alert(...).
- AI-generated code used quote escaping that looked valid in JavaScript but broke during HTML attribute parsing.
- Key insight: the browser first parses HTML attributes before JavaScript runs, so some escaping assumptions fail in that stage.
- Daniel found the bug manually and showed that understanding parsing context (HTML vs JavaScript) enabled a faster, more accurate fix than repeated blind prompting.

## JavaScript Concepts Covered
- **If statement:** requires a condition and one statement.
- **Else clause:** requires one statement and no condition.
- **Compound statements with curly braces:** allow multiple statements to be controlled as a single block.
- **Else-if construct:** JavaScript binds else to the nearest eligible if; this avoids dangling else errors when interpreted correctly.
- **Readability best practice:** use curly braces consistently, even when optional, to reduce ambiguity and debugging time.

## Live Demo Takeaways
- Daniel walked through nested conditionals using alert outputs ("No match," "Done," etc.).
- He intentionally introduced brace-placement mistakes to show how dangling else problems appear.
- A temporary sandbox failure occurred because variable i was declared in an earlier script block that had been removed; once redeclared, the logic worked as expected.
- Students saw how small structural changes in braces can radically change control flow.

## Practical Lessons for Students
- AI tools are useful accelerators, but code correctness still depends on human review.
- Debugging is easier when you can reason about parser stages and syntax boundaries.
- Conditionals are not just syntax memorization; they require precise block structure and scope awareness.
- Building and testing small examples in a sandbox is an effective way to validate logic before integrating it into larger projects.

## Next Steps
- Students were asked to build their own examples: an if statement, an if-else statement, and optionally an else-if chain.
- After spring break, class transitions from JavaScript into PHP.
