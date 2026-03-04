# Transcript Publishing Workflow (Multi-Agent)

## Purpose
Standardize how new lecture transcripts are processed, summarized, and published to the IFSC 71003 transcript hub using Codex multi-agent collaboration.

## Participants & Responsibilities
1. **Manager Agent (Input Coordinator & Reviewer)**
   - Receives the raw transcript (Zoom text, notes, etc.).
   - Breaks the work into subtasks, assigns them to the specialist agents, and provides source material.
   - Performs the final QA pass: verifies the summary, HTML page, and index updates before approving.

2. **Summary Agent (Lecture Summary Author)**
   - Reads the transcript and drafts the prose summary/outline for the lecture.
   - Produces a concise `.md` brief covering homework reminders, key demos, and any tools discussed.
   - Shares the summary with the Manager for review before publication.

3. **HTML Agent (Lecture Page Builder)**
   - Converts the approved summary + transcript highlights into an HTML lecture page (e.g., `2026_01_29_HTML_Links_Images.html`).
   - Matches the existing style conventions: header with date/time, tagged sections, highlight/warning callouts, code blocks, footer metadata.
   - Ensures internal anchors (like `index.html`) are relative and that inline CSS follows prior transcript pages.

4. **Index Agent (Hub Link Maintainer)**
   - Updates `transcripts/index.html` in two places:
     - **Journey card**: add the new lecture link under the correct module block.
     - **Calendar**: turn the corresponding date cell into a hyperlinked `lecture-day` entry with a descriptive `title`.
   - Removes that date from the “Missing Transcripts” list once the page exists.

## Required Steps (Manager Oversees & Signs Off)
1. **Collect Source**: Manager drops the raw transcript text/audio summary into the workspace and confirms the target date/module.
2. **Summarize**: Summary Agent produces `YYYY_MM_DD_<Topic>.md` capturing:
   - Homework reminders & due dates
   - Major lecture sections
   - Demonstrations / debugging stories
   - Tools or sites referenced
3. **Draft HTML**: HTML Agent builds the lecture web page using the summary plus transcript quotes; follows the current visual system (gradients, `.tag`, `.highlight`, `.warning`, code blocks, footer timestamp).
4. **Wire Index**: Index Agent updates `index.html` module cards + calendar (and removes any “Missing” card for that date).
5. **Review & Deliver**: Manager spot-checks all outputs, runs `git status` to confirm only expected files changed, and reports completion to the user.

6. **Version Control & Publish** (after QA passes):
   - Run `git status`.
   - Stage only the expected files:
     - `transcripts/index.html`
     - the new lecture `.md` file
     - the new lecture `.html` file
   - Commit with `git commit -m "Publish transcript YYYY_MM_DD_<Topic>"`.
   - Push to the default remote branch.
   - Report back with:
     - `git status` output after push
     - the commit hash
     - list of files changed
     - verification notes (links checked, calendar entry added, missing list updated)

## Notes
- File naming: `YYYY_MM_DD_<Topic>.html` for pages, `YYYY_MM_DD_<Topic>.md` for summaries.
- Keep inline CSS definitions consistent with recent transcripts to avoid visual drift.
- Always hyperlink new dates in both the Journey section and the calendar; confirm tooltips describe the session.
- Manager must confirm that the transcript hub renders the new link and that the page footer lists the current update date (e.g., “Last updated March 3, 2026”).
