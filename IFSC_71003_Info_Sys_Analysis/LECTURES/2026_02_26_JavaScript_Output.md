# Feb 26, 2026 — JavaScript Output & Debugging

## Session Highlights
- Navigated between W3Schools JavaScript tutorial and the JSRef reference site; reference contains exhaustive API listings for later lookup.
- Troubleshot a screen-share desync between classroom projection and Zoom feed; verified all remote students could see the sandbox before continuing.

## Output Methods
- **innerHTML vs. innerText:** innerHTML parses tags (e.g., `<h2>`), while innerText displays literal markup; both update DOM nodes via `document.getElementById()`.
- **document.write():** behaves like a “print” call during page load but overwrites the entire document if executed after load (e.g., inside button handlers).
- **Alerts family:**
  - `alert()` — modal notification; blocks execution and only offers “OK”.
  - `confirm()` — returns `true`/`false` based on OK/Cancel.
  - `prompt()` — captures typed input (string) plus OK/Cancel.
- **Console logging:** Introduced browser developer tools ? Console tab, demonstrated `console.log()` output and how repeated runs append values alongside browser warnings.
- **window.print():** Brings up the browser print dialog (PDF or physical printer); zero-argument call.

## Variables & Statements
- Reviewed `let` for mutable variables and `const` for immutable values; reassigning a `const` causes runtime errors.
- Explained automatic type coercion:
  - Strings + numbers concatenate (e.g., `'5' + 6 ? "56"`).
  - Booleans convert to `1` (true) or `0` (false) in arithmetic expressions.
- Demonstrated `console.log` for inspecting values and `prompt`/`confirm` return behavior (`alert` returns `undefined`).

## Comments & Event Attributes
- JavaScript comments: `// single-line` and `/* multi-line */`.
- HTML comments: `<!-- ... -->` only outside tag attribute lists; attempting to insert comments inside attribute values breaks event handlers (e.g., `onmousedown`).
- Reviewed color-changing table cell example to illustrate inline event attributes and noted that mid-tag comments are invalid.

## Debugging Tips
- Right-click ? Inspect to open dev tools; console displays runtime errors (e.g., opaque response blocking, cookie warnings).
- Encouraged using `console.log` and prompts for diagnosing homework pages instead of relying solely on alerts.

## Action Items
1. Practice each output method in the W3Schools sandbox to understand how it affects the DOM and page lifecycle.
2. Use the browser console during Homework 6 JavaScript tasks to capture log output and errors.
3. Avoid `document.write` post-load unless intentionally replacing the page; prefer DOM manipulation (`innerHTML`, `textContent`).
4. Keep alerts/confirm/prompt for debugging only—production code should implement custom modals.
5. Ensure inline event attributes remain comment-free; place explanations either above the tag or within the JavaScript string itself.
