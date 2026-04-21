# Apr 16, 2026 - PHP Hit Counters

## Homework Check-In
- Daniel opened by reviewing HW12, which was due the following Tuesday.
- The assignment combined project work, PHP exercises, and a short reflection on rapid prototyping.
- He pointed students to the hit-counter example already visible on the course materials page.

## Why Hit Counters Matter
- A PHP hit counter is a simple, understandable example of server-side state.
- Unlike static HTML, the page can remember something across visits by storing data externally.
- Daniel framed the hit counter as both a useful practical feature and an accessible PHP learning exercise.

## Limitations of Basic Hit Counters
- Refreshing the page increases the count, so the number can be inflated manually.
- A bot or script could also raise the count automatically.
- Reusing one counter file across multiple pages would combine counts unless each page uses a separate backing file.
- Even with those weaknesses, the approach is good enough for basic learning and small personal projects.

## Core PHP Program Structure
- The counter logic lives inside a PHP block embedded in a web page.
- A filename string such as `counter.txt` is assigned to a variable.
- The program checks whether the file exists.
- If it does not exist, PHP creates it and initializes the count.
- The script then reads the current value, increments it, writes it back, and displays the result.

## File Handling Concepts
- The counter value is stored in a plain text file rather than a database.
- PHP functions like file-existence checks and file-content writes make this feasible with very little code.
- This reinforced the idea that PHP can manipulate server-side resources before the browser receives the rendered page.

## Broader PHP Review
- Daniel revisited the distinction between PHP running on the server and JavaScript running in the browser.
- He also touched on related PHP features like variables, operators, and control flow, noting that many concepts parallel JavaScript even when the syntax differs.
- The lecture closed by stressing that the server-side execution model is still the most important idea for students to remember.

## Practical Takeaway
- The hit counter is less important as a polished analytics tool than as a compact model of how PHP reads, updates, and outputs server-side state.
- Students could reuse the example on their own homepages with small adjustments.

