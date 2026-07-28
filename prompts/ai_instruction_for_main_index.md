# AI Instructions for Main Index (Coursework Hub)

Action directory: workspace root — `index.html`, `styles.css`

## Purpose

This document defines how to maintain the **coursework hub** at [index.html](index.html).

Academic credentials, the Skills Snapshot, and the education timeline live in [credentials/index.html](../credentials/index.html).

## Current architecture

- `index.html`: coursework hub shell, navigation, and quick links
- `styles.css`: hub-only styling (no education card styles)
- `credentials/`: portfolio site (separate folder, same GitHub Pages deployment)

## What belongs here

- Links to IFSC 71003 and IFSC 77003 transcripts and project sites
- Prompt Hub navigation
- Brief intro text pointing visitors to the credentials section

## What does not belong here

- Education timeline data or card markup
- Skills Snapshot / professional bio prose
- Institution logos (they live in `credentials/images/`)

## Editing rules

1. Keep credential and portfolio content in `credentials/`, not in the hub root.
2. Link to credentials with `credentials/index.html`.
3. Before changing education or degree status text, read `credentials/ualr-academic-progress-raw.md`.
4. Preserve nav labels that match Playwright tests in `tests/homepage.spec.js`.
4. Do not reintroduce `education-components.js` or education mount points into the hub root.

## Safe change workflow

1. Read this file.
2. Read [index.html](index.html) and [styles.css](styles.css).
3. Apply navigation or hub intro changes in `index.html`.
4. Run `npm test` to confirm homepage expectations still pass.
