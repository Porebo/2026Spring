# Lecture Notes: HTML Form Elements, Color Codes & Password Security

**Date:** Thursday, February 12, 2026  
**Time:** 2:34 PM – 3:46 PM (two recordings)  
**Course:** IFSC 71003 – Info Sys Analysis  
**Instructor:** Daniel Berleant

---

## Preamble: HW4 Discussion & Course Roadmap (2:34 PM – 2:42 PM)

Daniel reviewed **Homework 4** (due next Tuesday) — the last HTML-focused homework before the course transitions to JavaScript and then PHP.

### Form Security Warnings

- Do **not** request any remotely suspicious info in forms: no names, dates of birth, credit cards, SSNs
- A student's email was **blocked by UALR IT** because his website link was flagged as "risky" after his form asked for a name
- Daniel's reply to the student was also blocked — had to contact IT support to resolve
- Thomas Wallace noted UALR IT blacklists quickly, especially this year
- Daniel: "Your average UALR user doesn't run into these problems... because they don't try to do the technical things we do in courses like this."

### Typographical Experiment

- Daniel tried a new strategy: putting a **space before periods** to visually separate the punctuation from technical strings/commands
- Acknowledged it's non-standard but thought it was clearer
- Asked for student feedback on whether it looks "funny"

### Web Counters

- The course website showed a hit counter (106 → 107 on refresh)
- Free web counters: get HTML code from a free counter service and plug it into your page
- Daniel plans to add a web counter exercise to a future homework
- Later in the semester: build your own counter in **PHP** ("one step above Hello World")

### Course Roadmap

- Finishing **HTML** this week
- Next: **JavaScript** (HTML "on steroids" — runs in the browser)
- Then: **PHP** (runs on the server, like actionPage.php from W3 Schools)

---

## Summary

Daniel continued covering HTML form elements, focusing on text areas, the color input type (with a deep dive into hexadecimal RGB color codes), and the password input type. He demonstrated how text areas preserve whitespace unlike normal HTML, explored color mixing through hex values, and warned that the HTML password input type is fundamentally insecure. The lecture culminated with a real-world case study: how the CIA's use of the HTML password input type on fake websites led to the exposure and arrest of spies in Iran, China, and other countries.

---

## 1. Text Areas vs. Input Elements

- **Text areas** are their own HTML element (`<textarea>`), not a type of `<input>`
- Key difference: text areas **preserve exact spacing** — multiple spaces, blank lines, and formatting are rendered as typed
- Normal HTML ignores most whitespace; text areas are a deliberate exception
- Attributes: `rows` (height) and `cols` (width) control dimensions
- Two `<br>` commands = one blank line (first BR goes to next line, second creates a gap)

### Why Not an Input?

- Conceptually, a text area *is* an input — you can submit it in a form
- Design decision: HTML designers chose **efficiency over conceptual simplicity**
- Making it a separate element allowed special whitespace processing
- Daniel asked ChatGPT — got 5 paragraphs of reasons, mostly "hair-splitting" historical/technical reasons
- The `actionPage.php` server doesn't preserve spacing, but the **browser does** in rendering

---

## 2. Field Sets (Recap)

- A `<fieldset>` draws a rectangle around a group of form elements
- The `<legend>` tag creates a caption embedded in the top border line
- Described as a "snazzy little, nicely designed little component"

---

## 3. HTML Color Input Type

- `<input type="color">` creates a color chooser widget
- Value is specified as a **6-digit hexadecimal code**: `#RRGGBB`
- Any color = combination of Red, Green, and Blue intensities

### Hexadecimal (Base 16) Explained

- Normal numbers: base 10 with digits 0–9
- Hex: base 16 with digits **0, 1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E, F**
- `FF` = 255 in decimal (maximum intensity)
- `00` = 0 (no intensity)
- Why base 16? Computers are binary (base 2), and base 16 crams **4 binary digits into 1 hex digit**

### Color Mixing Demonstrations

| Hex Code | Color |
|----------|-------|
| `#FF0000` | Bright red |
| `#00FF00` | Bright green |
| `#0000FF` | Bright blue |
| `#FFFF00` | Yellow (red + green light) |
| `#FF7700` | Orange (lots of red, some green) |
| `#FF00FF` | Bright purple/violet (red + blue) |
| `#505050` | Dark purple (dimmed red + blue) |
| `#000000` | Black (no color) |
| `#FFFFFF` | White (all colors max) |
| `#888888` | Medium gray |
| `#404040` | Dark gray |
| `#C0C0C0` | Light gray |

### Key Concepts

- **Black** = absence of all color (all pixels at zero)
- **White** = all colors combined at maximum
- **Gray** = equal amounts of all three, at intermediate levels
- **Yellow** = red + green (in light, not paint — "yellow is brightly colored brown")
- **Orange** = lots of red + moderate green
- Mixing paint (subtractive) ≠ mixing light (additive): red + green paint = brown, red + green light = yellow
- The color chooser also accepts decimal values 0–255 instead of hex
- Daniel mentioned "chartreuse" (yellowish-green) — "named after a French liquor"

---

## 4. Password Input Type

- `<input type="password">` — identical to `<input type="text">` except displays **dots** instead of characters
- **Fundamentally insecure:**
  - Password is sent as **plain text** to the server
  - Visible in the URL/query string after form submission
  - Server receives and can read the actual password
  - Anyone who views page source can see `type="password"` in the code

### HTTP vs. HTTPS

- **HTTP:** Password sent completely unencrypted — anyone tapping the network can read it
- **HTTPS:** Encrypts data in transit (snoopers can't read it), but server still receives the plain text password
- **Proper security:** Passwords should be hashed/encrypted before sending; server stores only the encrypted form and compares hashes — even system administrators can't decrypt it

### Warning

- Do NOT use password inputs in homework forms — likely to trigger security filters that block the site

---

## 5. CIA Spy Case Study: The Iraniangoals.com Disaster

### Background

- The CIA recruits spies ("informants") in foreign countries for intelligence gathering
- One informant: an Iranian IT businessman who built a successful company
- Corrupt Iranian government officials tried to squeeze money from his business
- He became disillusioned and was recruited by the CIA to spy (low-level intelligence — photographs of installations, etc.)

### The Communication System

- CIA created **fake websites** disguised as sports/entertainment pages
- Example: **Iraniangoals.com** — appeared to be a soccer fan site
- Hidden communication: a "search bar" that was actually an `<input type="password">`
- Typing the correct string triggered a login process → messaging interface → direct communication with CIA headquarters in Virginia

### How It Failed

1. The "search bar" displayed **dots** instead of characters — obvious red flag
2. Anyone could **right-click → View Page Source** and see `type="password"` in the HTML
3. Iranian intelligence could install **keyloggers** to capture everything typed
4. The secret messaging window was **hidden in the page source** — visible to anyone who looked

### Scale of the Failure

- Investigators found **350+ websites** using the exact same flawed system
- Same password input technique across all sites
- Used in Iran, China, Russia, and even friendly countries (Brazil, Ghana, Thailand)
- Each website assigned to one spy (to limit exposure if one was caught)
- Sites included: soccer pages, beauty pages, fitness, entertainment, Star Wars fan page, Johnny Carson talk show page
- The system **led to arrests and executions** (particularly in China)
- CIA declined to comment; Iran declined to comment

### Lesson

- The CIA staff didn't understand the security implications of `type="password"` and HTML source code visibility
- They thought it was "secure enough" for lower-value informants — it wasn't
- Student comment: "I would say Doctor and Carmen would have, like, better..." — agreement that even basic web knowledge would have prevented this

---

## 6. Input Attributes (Text Type)

### `readonly`

- `<input type="text" readonly>` — user cannot edit the field
- Value is still submitted with the form
- `readonly="true"` works, but just having `readonly` present is sufficient

### `disabled`

- `<input type="text" disabled>` — field is **grayed out** and uneditable
- Unlike readonly: the value is **NOT submitted** with the form
- Just having `disabled` present activates it (like readonly)

### `size`

- Controls the width of the input box
- `size="50"` = wide input; `size="4"` = narrow (for PINs, etc.)
- `size="0"` reverts to default (approximately 20)
- `size="1"` = very narrow, but text still scrolls inside it
- Input can hold more text than the visible box width — text scrolls out of view

---

## Key Takeaways

1. Text areas preserve whitespace — a deliberate design exception in HTML
2. Colors are specified with 6-digit hex codes: 2 digits each for Red, Green, Blue (base 16, 0–FF)
3. Color mixing in light is **additive** (red + green = yellow), unlike paint (subtractive)
4. The HTML password input is cosmetically hidden but **fundamentally insecure**
5. Always use proper encryption/hashing for real password systems
6. The CIA spy case is a real-world consequence of not understanding basic HTML security
7. Input attributes (`readonly`, `disabled`, `size`) provide fine-grained control over form behavior
