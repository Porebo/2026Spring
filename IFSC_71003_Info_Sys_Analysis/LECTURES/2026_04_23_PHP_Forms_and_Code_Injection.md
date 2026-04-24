# Apr 23, 2026 - PHP Forms and Code Injection

## Opening Logistics and HW13 Framing
- Daniel opened by previewing the next homework: the in-class project demo session scheduled for the following class.
- Students will not share their screen. Daniel will open each student's project link during class, and the student will guide navigation over microphone.
- Students unable to present live may submit a recorded demo link, emailed to Daniel in advance (Thomas Wallace confirmed this accommodation for his local-storage-based app).
- Homework is considered due by class time, since demos happen during class.

## Reviewing PHP + HTML Form Integration
- Daniel revisited the W3Schools form example that the class had used before they formally learned PHP.
- He re-emphasized that the form's `action` attribute sends the submitted data to a PHP program on the server.
- The PHP program runs server-side, echoes HTML as its output, and that HTML is what the browser ultimately renders.
- The PHP program is the interface between the form submission and the resulting web page.

## ChatGPT Form Analysis Detour
- As a contrast example, Daniel viewed the source of ChatGPT's input area and located its `<form>` and `<textarea>` elements.
- He showed that students can paste unfamiliar HTML or JavaScript into ChatGPT and ask it to explain attributes such as `class`, `name`, `autofocus`, and `data-virtualkeyboard`.
- The broader point was that AI is useful for decoding unfamiliar production code, including large minified pages.

## PHP Form Handling via $_GET
- Using the `welcome_get.php` example from W3Schools, Daniel walked through how a PHP page echoes `welcome` and the submitted name and email.
- Variables in PHP start with `$`. The special variable `$_GET` is predefined by PHP and starts with an underscore to mark it as special.
- `$_GET` is an associative array whose keys match the `name` attributes of the form's input fields (for example, `$_GET['name']` and `$_GET['email']`).
- The browser packs submitted form data into the URL (after the `?`), and the server populates `$_GET` from that.

## PHP Variable Scope and Superglobals
- Daniel then connected `$_GET` to PHP variable scope rules.
- In PHP, global variables defined outside a function are **not** automatically visible inside a function. This differs from JavaScript.
- A variable named `$x` inside a function is a separate local variable from a `$x` defined in the surrounding code.
- **Superglobal** variables such as `$_GET`, `$_POST`, `$_SERVER`, and `$GLOBALS` are visible everywhere, including inside functions.
- Students cannot declare their own superglobals; only PHP's predefined set are superglobal.

## Inspecting $_GET at Runtime
- Daniel demonstrated `echo $_GET` and the more informative `var_dump($_GET)`.
- With no submitted data, `$_GET` is an empty array.
- After submitting the form, `var_dump` showed `$_GET` as an array with a `name` element and an `email` element, each with its own string value.
- He used this to reinforce that `$_GET` is just an ordinary associative array populated by the form submission.

## PHP Arrays Quick Reference
- Indexed arrays use numeric keys starting at 0, similar to JavaScript.
- Associative arrays use string keys, which is how `$_GET` works.
- Array elements can themselves be arrays, which is why `$GLOBALS` shows nested structure when dumped.

## Code Injection Demonstration (Cross-Site Scripting)
- Because the echoed value of `$_GET['name']` is injected raw into the HTML response, the form is vulnerable to **code injection**.
- Daniel showed that entering HTML tags such as `<b>` or `<u>` in the name field causes the server-echoed page to render bold or underlined text.
- Escalating that, he entered a `<script>` tag containing `window.prompt('Enter password')`, and the returned page executed it, simulating a fake password prompt.
- This is a classic **cross-site scripting (XSS)** attack.

## Why This Matters Beyond the Demo
- Because the malicious payload is embedded in the URL (after `?`), an attacker can craft and share a malicious link.
- A victim clicking the link executes arbitrary JavaScript in their own browser, controlled by the attacker.
- Daniel gave examples of practical damage: harvesting passwords with fake prompts, opening phishing tabs that impersonate a trusted organization, and tricking users into downloading malware disguised as a required update.

## Closing Notes
- Protecting forms from XSS is important but outside the scope of this course.
- The class ended with attendance via chat, and two students (David Samuel and Ahmad AlOmari) reported that the Zoom chat feature was not working for them; Daniel asked them to email him instead.
- Next class: project demos.

## Main Takeaways
- PHP form handling reads submitted data from the `$_GET` superglobal associative array.
- Superglobals are the exception to PHP's strict function scoping rules.
- Echoing unvalidated user input directly into HTML produces a cross-site scripting vulnerability.
- Real-world form handling must guard against code injection before returning user-supplied content.
