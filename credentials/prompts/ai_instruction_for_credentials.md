# AI Instructions for Credentials Site

Action directory: repository root — `index.html`, `education-components.js`, `styles.css`

## Purpose

This repository is the canonical home for portfolio and credential content. The coursework hub at [../index.html](../index.html) links here.

## Architecture

- `index.html`: page shell, Skills Snapshot prose, and education mount points
- `education-components.js`: `educationData` plus render helpers
- `styles.css`: styling only
- `images/`: institution logos referenced by `educationData`

Education groups render into containers with `data-education-group`:
- `graduate`
- `undergraduate`
- `certificates`

Each item object shape:
- `logo`, `alt`, `institution`, `credential`, `period`, `meta` (array)

## Editing rules

1. Update education records in `education-components.js`, not by duplicating HTML cards.
2. Before changing degree status, GPA, conferral dates, or completion text, read `ualr-academic-progress-raw.md` and `ualr-academic-record-raw.md` (including the confirmed conferral notes sections).
3. Keep semantic attributes: `role="list"`, `role="listitem"`, meaningful `alt` text.
3. When Skills Snapshot prose and structured data disagree, align them in the same change.
4. Do not add coursework, transcript, or prompt-hub content to this repo.

## Safe change workflow

1. Read this file.
2. Read `index.html`, `education-components.js`, and `styles.css`.
3. Apply content updates in `education-components.js` first.
4. Validate mount points still render and image paths resolve.
