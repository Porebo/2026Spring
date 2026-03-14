# Prompt Template for New Transcripts

Paste the transcript (or link to it) below, then send this whole prompt to Codex:

---
You are Codex with multi-agent support.

First, open and read this file completely:
AI_instructions/Transcripts_process.md

Then follow it exactly.

Act as the Manager agent and do the following:

1) Locate and confirm the hub files and conventions by searching the workspace:
   - transcripts/index.html
   - the folder where prior lecture .md files are stored
   - the folder where prior lecture .html pages are stored
   - the naming pattern used for dates/topics

2) Spawn the Summary, HTML, and Index agents defined in AI_instructions/Transcripts_process.md.

3) Assign tasks:
   - Summary Agent: produce the lecture summary markdown file (YYYY_MM_DD_<Topic>.md).
   - HTML Agent: produce the lecture HTML page (YYYY_MM_DD_<Topic>.html) using the approved summary and matching existing style.
   - Index Agent: update transcripts/index.html (Journey card link, calendar link, remove date from Missing Transcripts if present).

4) Enforce workflow order:
   - Summary Agent completes draft -> Manager reviews/approves -> HTML + Index proceed.

5) Final QA:
   - Verify the .md and .html files exist and filenames match.
   - Verify index links are correct relative paths and the calendar date is clickable with a descriptive title tooltip.
   - Confirm the "Missing Transcripts" entry is removed (if it existed).
   - Run `git status` and report:
     - changed files
     - verification notes (what was checked and results)

6) Version Control & Publish (only after QA passes):
   - Run `git status`.
   - Stage only:
     - `transcripts/index.html`
     - the new lecture `.md` file
     - the new lecture `.html` file
   - Commit with `git commit -m "Publish transcript YYYY_MM_DD_<Topic>"`.
   - Push to the default remote branch.
   - Report back with:
     - `git status` after push
     - commit hash
     - list of files changed
     - verification notes (links checked, calendar entry added, missing list updated)

Transcript input:
<<<PASTE TRANSCRIPT HERE>>>
---

Save this template somewhere handy so you can quickly kick off future transcript jobs.

