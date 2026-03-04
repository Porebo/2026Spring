# Lecture Notes: HTML Basics & W3Schools

**Date:** Thursday, January 22, 2026  
**Time:** 2:31 PM – 3:47 PM (two recordings)  
**Course:** IFSC 71003 – Info Sys Analysis  
**Instructor:** Daniel Berleant

---

## Recording 1: HW1 Review & Web Cache Issues (2:31 PM – 2:44 PM)

### Web Cache Problems

- Last year, some students saw **old versions of homework** because their browsers cached the pages
- InfinityFree does basic hosting and lets the browser handle the rest
- Browsers store local copies of web pages — revisiting a page may serve the cached copy instead of fetching from the server
- CSS caches **even more aggressively** than HTML (Thomas noted this)

### Cache-Busting Solutions

- Daniel added code to his homework pages to **force a reload** on first visit
- A banner at the top of each homework shows the **exact time** it was loaded from the web, so students can verify they have the current version
- The code was tricky — there's an easy meta tag to reload every N seconds/minutes, but Daniel wanted a **one-time reload** which was harder to implement

### Pro Tip: Manual Cache Clearing

- Right-click on the page → open the **Inspector**
- **Press and hold** the refresh button → three options appear, one of which is "Empty Cache and Hard Reload"
- Thomas explained this is called **cache busting** — Daniel is doing it programmatically for students

### Homework 1 Reminders

- **Due:** Next Tuesday (Jan 27)
- Don't wait until the last minute — get your website set up now
- **Read the instructions carefully**, especially for HW1
- **Do NOT put your ID number** on your website — it's publicly visible to anyone in the world
- When homework is done, **indicate on your homepage** that it's ready to be graded
- Some students in the past didn't do this even though the instruction was highlighted in bright yellow

### AI Warning for Test Page

- It's easy to ask an AI to create the test page for HW1 Q3, but:
  - Other homeworks will **add to** the test page, making it longer over time
  - Last year, AIs **couldn't keep up** with the growing list of HTML commands
  - Students who over-relied on AI got confused and couldn't do things themselves
- **Best to understand what you're doing now** rather than trying to catch up later

### 15 HTML Elements Clarification

- Student asked: do H1 through H6 count as 6 elements or 1?
- Daniel: Yes, each heading level counts as a separate element — that's why the requirement is 15 instead of 10

### Website from Scratch

- Student asked if the website has to follow a particular format
- Daniel: Don't use a **website-building app** — code the HTML yourself
- You'll learn what those tools do under the hood
- The first homepage will be pretty basic, and that's fine

---

## Recording 2: HTML Tutorial & Live Demonstrations (2:44 PM – 3:47 PM)

### W3Schools.com Overview

- **W3Schools.com** — free tutorial site for HTML (and CSS, JavaScript, PHP, etc.)
- Full of **sandboxes** ("Try It Yourself") where you can edit HTML and see results instantly
- The sandboxes provide a ready-made starting HTML template — almost half a homepage
- Students were instructed to go to W3Schools → HTML Home → Try It Yourself and experiment

### HTML Document Structure

- `<!DOCTYPE html>` — not an HTML command but tells the browser the file is **HTML5**
  - Thomas: "That one will be around for good now. Before this we had XHTML and HTML4, they were a lot longer."
  - HTML5 has been stable for about **a decade and a half**
  - If omitted, the page will probably still work, but it's safer to include it
- `<html>` ... `</html>` — wraps the entire document
- `<head>` ... `</head>` — metadata section (can be omitted, page still works)
- `<body>` ... `</body>` — contains everything visible on screen

### Heading Levels

- `<h1>` through `<h6>` — six levels of headings
- H1 is the largest/boldest, H6 the smallest
- Demonstrated live: changing H1 to H5 made text smaller

### Lists in HTML

| List Type | Tag | Description |
|-----------|-----|-------------|
| Unordered | `<ul>` | Bullet points |
| Ordered | `<ol>` | Numbered items |
| Definition | `<dl>` | Term-definition pairs (less common) |

- UL and OL are much more commonly used than DL

### The `<fieldset>` and `<legend>` Commands

- `<fieldset>` creates a **boxed container** with a nice border
- `<legend>` creates a **label** that sits on the border of the fieldset
- Thomas: "One of the most aesthetic, right-out-of-the-box HTML elements with no CSS"
- Originally designed for grouping form fields, but useful for any grouped content
- Demonstrated using HW1's "Learning Objectives" box as an example
- Line wrap in the editor can break the aesthetic — legend text should ideally fit on one line

### Bug Discovery in HW1

Daniel found two bugs while showing the HW1 source code live:

1. **`<html>` tag in wrong position** — was after the `<head>` instead of before it
   - Head and body should both be inside `<html>` ... `</html>`
   - Worked fine despite the bug, but technically incorrect
2. **`<br />` instead of `<br>`** — unnecessary self-closing slash
   - Thomas: "That's a throwback to XHTML, when we had to close all elements"
   - HTML5 doesn't require it — just `<br>` is sufficient
   - Daniel fixed these live on InfinityFree

### Live Editing on InfinityFree

- Logged into InfinityFree → clicked **File Manager**
- All HTML files go in the **htdocs** folder
- Clicked the edit icon on hw1.html to open the built-in editor
- Used **Ctrl+F** (Find) and **Ctrl+H** (Find & Replace) to locate and fix bugs
- Saved changes — InfinityFree saving was slow but worked
- **Recommendation:** Use File Manager, not Website Builder, at least until you learn HTML

### Bold: `<b>` vs. `<strong>`

| Tag | Type | Meaning |
|-----|------|---------|
| `<b>` | Typesetting | Tells browser to make text bold visually |
| `<strong>` | Semantic | Tells browser this text has emphasis/importance |

- Purists prefer `<strong>` because it conveys meaning
- Some browsers might render `<strong>` differently (bold, italics, etc.)
- `<b>` explicitly controls visual appearance
- Thomas: "Strong is semantically meaningful, bold is presentational"

### Highlighting with `<mark>`

- `<mark>` tag highlights text (defaults to **yellow** background)
- Thomas: Used by search engines — when you Google a term and visit a site, highlighted results use `<mark>`
- Semantically: offsets content visually without adding meaning
- Daniel confirmed `<mark>` (also `<hl>` was tried) highlights yellow by default
- CSS can customize the highlight color

### Using ChatGPT for Quick Lookups

- Daniel typed into ChatGPT: "How to make my HTML passage have a green background"
- ChatGPT gave: `<p style="background-color: green;">` — inline CSS
- Demonstrated it live in the sandbox — worked immediately
- Shows how AI is practical for quick HTML reference questions

### View Page Source

- **Right-click → View Page Source** on any web page to see its HTML
- Showed the course homepage source code
- Course homepage structure:
  - Proper `<!DOCTYPE html>` and `<html>` placement
  - CSS in the `<head>` for table styling (90% width, column percentages)
  - Each module is its own separate `<table>` (explains double-line borders between modules)
  - Spacing adjustments happen automatically due to content size differences

### Internal Links (Anchors)

- Jump-to-week navigation on the course homepage uses **internal links**
- **Link syntax:** `<a href="#1">` — pound sign + identifier
- **Anchor point:** `<a name="1">` — no pound sign (just the name attribute)
- Same `<a href>` syntax as external links, but with `#` prefix for internal navigation
- Example: clicking "8" in the jump menu scrolls to Module 8

### Table Structure Review

| Element | Purpose |
|---------|---------|
| `<table>` | Defines the table |
| `<tr>` | Table row |
| `<td>` | Table data cell |
| `<th>` | Table header cell |

- Tables contain rows; rows contain cells
- Thomas noted: `cellpadding` and `cellspacing` attributes are **deprecated in HTML5** — use CSS instead
- HTML5 is backwards compatible, so deprecated attributes still work, but validators will flag them

### Why Separate Tables? (Anchor Linking Problem)

- Daniel wanted internal links to jump to specific modules within a table
- **Problem:** Links to `<tr>` elements went to the **top of the table**, not the specific row
- **Reason (from ChatGPT):** `<tr>` doesn't reserve layout space — it only contains `<td>` elements, not content directly
- `<td>` elements DO reserve layout space (they contain actual content), so anchors work on `<td>`
- Daniel's workaround: made each module **its own table** so links could target individual tables

### Thomas's ID Attribute Suggestion

- Instead of `<a name="...">`, use **`id`** attribute on any element
- Example: `<tr id="module3">` then link with `<a href="#module3">`
- Works on any element — no need for extra `<a>` tags
- Built-in anchor: `#top` takes you to the top of the page without declaring it
- **`id`** = unique to one element; **`class`** = can be shared by many elements

### The `<span>` Tag

- `<span>` is an **inline grouping element** — doesn't format anything by itself
- Thomas: "It's the inline counterpart to `<div>`"
- Useful for applying styles or IDs to a portion of text
- Demo: `<span style="background-color: lightgreen; color: green;">` — styled green text on green background
- Without any styling, `<span>` has zero visual effect

### Interactive Mouse Events Demo

Daniel demonstrated mouse event handlers on the course homepage's "You Are Here" box:

| Event | Attribute | Result |
|-------|-----------|--------|
| Mouse over | `onmouseover` | Turns orange |
| Mouse out | `onmouseout` | Turns light blue |
| Left click | `onclick` | Turns bright blue |
| Double click | `ondblclick` | Turns violet |
| Right click | `oncontextmenu` | Turns purple (also triggers context menu) |
| Mouse down | `onmousedown` | Turns red |
| Mouse up | `onmouseup` | Turns cyan |

- The box is a table with one row, one TD
- Uses `document.getElementById('header').style.background = 'color'` to change colors
- The TD has an `id="header"` and the event handlers reference that same ID
- Shows fine-grained control over different mouse interactions
- Context menu on right-click is a browser feature Daniel couldn't disable

### Weather Note

- Potential winter storm may cancel the next in-person class
- If so, Daniel will webcast from home (assuming internet and power)
- Otherwise, recordings will be provided

---

## Key Takeaways

1. **W3Schools.com** is the primary learning resource — use its sandboxes to practice
2. Every HTML document needs `<!DOCTYPE html>`, `<html>`, `<head>`, and `<body>`
3. `<fieldset>` + `<legend>` = one of the most attractive out-of-the-box HTML constructs
4. `<strong>` is semantic (meaning), `<b>` is presentational (appearance) — prefer `<strong>`
5. `<mark>` highlights text (yellow default); CSS can change the color
6. **View Page Source** (right-click) lets you learn from any website
7. Internal links use `<a href="#id">` to jump within a page; use `id` attributes on target elements
8. `<span>` = inline grouping (no formatting); `<div>` = block grouping
9. HTML5 is backwards compatible — old code still works but deprecated attributes get flagged
10. Don't over-rely on AI for the test page — understand each command yourself
