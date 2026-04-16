# Lecture Notes: PHP Server-Side Fundamentals
**IFSC 71003 - Information Systems Analysis | April 2, 2026 | Daniel Berleant**

---

## Administrative Q&A (Before Main Lecture)

- **Homework reminder:** The next homework is due the following Tuesday.
- **Lean Six Sigma clarification:** Students should not complete last year's Lean Six Sigma version of the assignment. This term's focus is on **Evaluation**.
- **Blackboard task clarification:** Students should evaluate Blackboard using the evaluation criteria/methodology covered in class, not Lean Six Sigma.
- **Project setup email requirement:**
  - If working individually: email Daniel confirming individual work.
  - If in a group: each member must email Daniel with the same group roster.
- **Group hosting requirement:** Group projects need a separate shared InfinityFree account for joint website work.

---

## Main Topic: PHP Fundamentals

Daniel introduced PHP as a server-side language and contrasted it with JavaScript.

### Core Concept: Server-Side vs Client-Side Execution

- **PHP runs on the server** before content is sent to the browser.
- **JavaScript runs in the browser** after the page is delivered.
- Because of this, the browser often never sees raw PHP source; it only sees PHP-generated HTML output.

### The "Three Views" Demonstration

Daniel emphasized understanding web behavior through three artifacts:

1. **Rendered page** in the browser (what users see)
2. **Browser View Source** (HTML received by browser)
3. **True server file source** on InfinityFree (contains PHP code)

Key takeaway: browser source and server source can differ significantly when PHP executes.

### Why File Extension Matters

- If a file is named `.php`, the server processes PHP tags.
- If the same file is renamed `.html`, the server sends PHP code as plain text-like markup and does not execute it.
- Browser behavior on unprocessed PHP fragments can look confusing because the browser treats unknown markup as invalid/ignored tags.

### Echo and Output Behavior

- `echo` is PHP's output command (similar to printing text).
- PHP can output **actual HTML markup**, not just plain strings.
- If PHP computes values without `echo`, nothing is shown in rendered output.

### Can JavaScript Trigger New PHP Code?

- JavaScript can inject text that looks like PHP tags into the DOM.
- But injected PHP will **not run** in the browser, because PHP execution already happened on the server earlier in the request lifecycle.

---

## Syntax and Comment Comparisons

Daniel compared PHP comments with JavaScript:

- `// single-line comment` works in both PHP and JavaScript.
- `/* multi-line comment */` works in both.
- `# single-line comment` works in PHP (not standard JavaScript syntax).

He demonstrated commenting/uncommenting while debugging and how malformed comment boundaries can break execution.

---

## Debugging/Usability Notes from Class

- A student reported confusion in the homework game flow.
- Navigation required a keypress and then mouse interaction; this was less clear after a UI change that removed a button.
- Daniel acknowledged the interaction confusion and clarified the expected input sequence.

---

## Practical Guidance for Students

1. To add PHP into existing homework pages, rename target pages from `.html` to `.php`.
2. Keep HTML and JavaScript content; adding PHP should not break those sections.
3. Use AI in **Socratic mode** to deepen understanding (ask, answer, follow up), not as one-shot answer generation.
4. Confirm project mode (individual/group) by email and set up proper hosting for group collaboration.

---

## Key Takeaways

1. PHP and JavaScript can both manipulate web output, but at different stages of the request lifecycle.
2. The `.php` extension is the server's signal to execute PHP code.
3. Browser "View Source" is not necessarily the same as server source when server-side preprocessing exists.
4. Correct evaluation assignment scope is Blackboard evaluation methodology, not Lean Six Sigma.
5. Group project administration (email + dedicated account) must be completed early to avoid submission friction.

---

## Next Class Direction

- Continue building PHP fluency (syntax, variables, output behavior, and web integration patterns).
- Continue applying evaluation concepts in homework and project context.