# Lecture Notes: JavaScript Fundamentals & DOM Manipulation

**Date:** Thursday, February 19, 2026  
**Time:** 2:33 PM – 3:46 PM (two recordings)  
**Course:** IFSC 71003 – Info Sys Analysis  
**Instructor:** Daniel Berleant

---

## Preamble (2:33 PM – 2:37 PM)

Daniel transitioned the course from HTML to JavaScript. He explained that JavaScript's unique strength is its ability to be **embedded directly into web pages** and run in any browser without special software. Unlike Python, C, and other languages that must be run separately, JavaScript code is sent over the web and executed on the client's browser — the browser already contains everything needed to run it. This makes JavaScript easy to get started with.

He also checked for questions on **Homework 5** (due next Tuesday), which involves more Socratic dialogue with a provided prompt. No questions were raised.

---

## Summary

Daniel taught JavaScript fundamentals, explaining how JavaScript interacts with HTML through the Document Object Model (DOM). He demonstrated modifying webpage content using `document.getElementById()` and the `innerHTML` property, showing examples that change text, display dates, and swap images. He also covered `document.write()`, `alert()`, and `window.print()` as alternative output methods. The session included extensive Socratic questioning with students (primarily Linda) using ChatGPT, and concluded with the distinction between JavaScript and Java.

---

## Key Topics

### 1. JavaScript Is a Dialect of ECMAScript

- JavaScript is technically a **dialect** of **ECMAScript** (European Computer Manufacturers Association)
- The official language standard is called ECMAScript, not JavaScript
- JavaScript is like "Coca-Cola" — a brand name everyone uses for the generic thing
- Microsoft has **JScript**, a slightly different dialect of the same language
- All dialects are very similar in practice

### 2. The Document Object Model (DOM)

- The browser stores a web page as a **JavaScript data structure** (not raw HTML text)
- This data structure is stored in a predefined variable called `document`
- `document` is an **object** — a complicated variable with many sub-parts
- Just like an array has elements, an object has unique named parts
- To modify a webpage, you modify portions of the `document` object

### 3. `document.getElementById()` — Step-by-Step Breakdown

Given the code:
```javascript
document.getElementById("demo").innerHTML = Date();
```

Daniel broke this down token by token:

| Token | What It Does |
|-------|-------------|
| `document` | The variable containing the entire webpage as a data structure |
| `.` (dot operator) | Goes into an object and gets a part of it |
| `getElementById` | A **function** stored inside the document object |
| `("demo")` | Passes the string `"demo"` as an argument; runs the function |
| The function call | Searches the document for an HTML element with `id="demo"` and returns it |
| `.innerHTML` | Accesses a sub-variable of the returned element — its inner HTML content |
| `=` | The **assignment operator** — sets a variable to a new value |
| `Date()` | A function call (no arguments) that returns the current date and time |

**Key insight:** This is NOT a print statement. It **modifies the HTML document** by changing the value of a sub-variable within the document object. The browser then re-renders the changed content.

### 4. The `onclick` Attribute

- HTML buttons can have an `onclick` attribute
- The value of `onclick` contains **JavaScript code** that runs when the button is clicked
- The button's visible text is everything between the opening `<button ...>` and closing `</button>` tags
- The `onclick` attribute is part of the **opening tag**, not the displayed content

### 5. Moving the ID Around

Daniel demonstrated that moving the `id` attribute to different HTML elements changes what gets replaced:

- `id` on a `<p>` tag → replaces paragraph content only
- `id` on the `<body>` tag → replaces the **entire body** (everything disappears, replaced by date)
- `id` on a non-HTML element (like `<!DOCTYPE>`) → doesn't work

### 6. Exploring Variable Values

Daniel showed what happens when you assign different values to `innerHTML`:

| Assignment | Result Displayed |
|-----------|-----------------|
| `= 5` | Displays the number 5 |
| `= document` | Displays `[object HTMLDocument]` (too complex to print fully) |
| `= document.getElementById` | Displays the function's code (shows `native code`) |
| `= document.getElementById("demo")` | Displays `[object HTMLParagraphElement]` |
| `= document.getElementById("demo").innerHTML` | Replaces content with itself (no visible change) |

### 7. Image Swapping with `src`

The lightbulb example demonstrated swapping images:

- An `<img>` element has a `src` attribute instead of `innerHTML`
- Two buttons: "Turn on" sets `src` to `pic_bulbon.gif`, "Turn off" sets it to `pic_bulboff.gif`
- Daniel replaced the bulb images with UALR website images to prove the concept
- **Key point:** You're not modifying an image — you're **replacing one image source with another**
- Dark mode in the sandbox reverses colors, causing unexpected display

### 8. Alternative Output Methods

#### `document.write()`
- Another part of the `document` object (a function, like `getElementById`)
- Writes content directly to the page
- Must be wrapped in `<script>` tags so the browser knows it's JavaScript, not HTML
- Without `<script>` tags, the browser treats the code as plain HTML text

#### `alert()`
- Creates a **pop-up dialog box** (lightbox effect)
- Not recommended for production code
- Shows a message with an OK button

#### `window.print()`
- Opens the browser's **print dialog** (same as Ctrl+P)
- Triggered by a button click in the example

### 9. The `<script>` Tag

- Tells the browser that enclosed content is **JavaScript code**, not HTML
- Without it, JavaScript code renders as plain text on the page
- The browser processes `<script>` tags by **evaluating** the JavaScript (not displaying it)
- Works inline alongside regular HTML elements

### 10. Java vs. JavaScript

- **Java is NOT short for JavaScript** — they are completely different languages
- Java is more like a modernized C
- Java does **not** run in web pages; JavaScript does
- They are always confused with each other but have no real relationship

---

## Socratic Learning Demo

Daniel used ChatGPT to demonstrate Socratic questioning on the JavaScript code snippet. Key exchanges with student Linda:

- **"Is the displayed button text everything between `<button>` and `</button>`?"** → True, but must distinguish opening tag (with attributes) from displayed content
- **"Is `onclick` an attribute of the button tag?"** → True — it's an attribute-value pair in the opening tag
- **"Java is short for JavaScript?"** → False — completely different languages

### AI Learning Tips Reinforced
- Use Socratic dialogue to study code
- Guide the AI: "break things down with simpler questions"
- You can answer with another question instead of true/false
- Daniel shared that he personally uses AI Socratic dialogue to understand dense academic papers — "It didn't just speed up my learning, it made it possible from essentially impossible"

---

## Next Steps

- Students should practice using `document.getElementById()` and `innerHTML` in their sandbox
- Homework involves Socratic dialogue on JavaScript code snippets
- Continue building the HTML demo page with JavaScript commands
