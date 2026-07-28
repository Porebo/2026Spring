# Credentials & Portfolio

Static portfolio site for academic credentials, professional experience, and technical proficiencies.

**Live site:** https://porebo.github.io/credentials/

**Related repo:** [2026Spring](https://github.com/Porebo/2026Spring) hosts coursework, lecture transcripts, and the Prompt Hub.

## Files

| File | Purpose |
|------|---------|
| `index.html` | Page shell and Skills Snapshot prose |
| `education-components.js` | Education data and card rendering |
| `styles.css` | Shared styling |
| `images/` | Institution logos |
| `prompts/ai_instruction_for_credentials.md` | Maintenance guide for AI-assisted edits |

## Editing education records

Add or update entries in `educationData` inside `education-components.js`. Do not duplicate card markup in `index.html`.

## GitHub Pages

Served from the `main` branch root. `.nojekyll` is included so Jekyll does not process the site.
