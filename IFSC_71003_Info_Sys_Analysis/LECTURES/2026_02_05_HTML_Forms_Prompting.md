# Feb 5, 2026 — HTML Forms & Prompt Engineering

## Homework 3 Clarifications
- **Q2 Form Requirements**: Add a form to the existing HTML command dictionary with at least 10 distinct components/variations. Hints (Notes A & B) are hidden under buttons; students can replay them anytime.
- **Separate Questions**: Q1 and Q2 are distinct deliverables; Q2 does not continue Q1’s build.
- **Timing & Playback**: Daniel may slightly slow the hint audio; students can replay recordings as needed.
- **Other prompts**: Q3 is feedback on prior homework, Q4 covers fishbone diagrams, Q5 requires Socratic questioning practice.

## Prompt Engineering Emphasis
- Daniel is prioritizing Socratic questioning skills because LMS vendors (like Blackboard) now ship mediocre versions.
- Effective prompting should stretch thinking without overwhelming; students control this by iterating with AI.
- Suggestion captured for HW3 Q5: allow AI assistance to craft prompts (students can ask for MCQs, hints, etc.).
- Prompting is treated like a lifelong study skill akin to reading strategies—practice plus deliberate structure.

## HTML Form Deep Dive
### Form ? PHP Lifecycle
- Demonstrated the `<form>` tag with `action="/html/action_page.php"`; action points to a server-side PHP program.
- Showed how submitting sends name-value pairs via the query string (e.g., `?firstname=John&lastname=Doe`).
- Manually navigated to `action_page.php` and appended parameters to show server echo behavior and error handling when files are missing/misspelled.
- Discussed security restrictions: W3Schools blocks submissions from external origins such as InfinityFree sites.

### Labels, Inputs, Accessibility
- `label` tags connect to inputs through `for` (label) ? `id` (input). Clicking labels focuses the input, supporting usability and screen readers.
- Thomas highlighted that labels are critical for assistive tech compliance; HTML evolution now separates semantics (HTML) from presentation (CSS).
- Inputs carry `name` attributes for the server-bound data; IDs primarily link to labels.

### Input Types & Behavior
- Compared `type="text"`, `type="submit"`, `type="button"`, radio buttons, and checkboxes.
- Demonstrated how the Submit input must live inside the `<form>` block; labels can live outside but still reference inputs.
- Radio buttons allow a single selection (share `name`), checkboxes allow multiple selections.
- Explored W3Schools “Try It” exercises: modifying values, adding `<br>`, experimenting with `value` casing, and using reset buttons.

### Troubleshooting Tips
- When the `action` path is wrong, submissions 404; Daniel showed debugging by direct URL edits.
- Some characters (e.g., `+`) need URL encoding; unencoded plus signs become spaces in query strings.
- Encouraged students to practice directly in the sandbox to reinforce concepts.

## Action Items
- Daniel will add an explicit HW3 Q5 note encouraging AI-assisted prompt drafting.
- Students should continue refining prompt engineering techniques alongside form-building practice.
