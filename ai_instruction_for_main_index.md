# AI Instructions for Main Index (index.html)

## Purpose
This document defines how to maintain the main page architecture for [index.html](index.html) in this repository.

Use this file as the source of truth before making edits to the main index.

## Current Architecture
The main index now follows a component-driven pattern for repeated education content.

### Files involved
- [index.html](index.html)
- [education-components.js](education-components.js)
- [styles.css](styles.css)

### Separation of concerns
- [index.html](index.html): page shell and mount points
- [education-components.js](education-components.js): education data + reusable render logic
- [styles.css](styles.css): styling only

## Implemented Component Pattern

### 1) Mount-point rendering in HTML
Education groups are rendered into containers that use `data-education-group`.

Current mount points:
- `data-education-group="graduate"`
- `data-education-group="undergraduate"`
- `data-education-group="certificates"`

### 2) Data-driven cards
Education entries are defined in `educationData` inside [education-components.js](education-components.js), grouped by key:
- `graduate`
- `undergraduate`
- `certificates`

Each item object uses this shape:
- `logo`: image path
- `alt`: image alt text
- `institution`: heading text
- `credential`: credential line
- `period`: period line
- `meta`: array of extra lines (for grade/notes), can be empty

### 3) Reusable rendering functions
Current render path:
- `createEducationItem(item)` builds one card
- `renderEducationGroup(groupName, container)` builds one group
- query all `[data-education-group]` and render from `educationData`

## Editing Rules

### Always do this
1. Keep [index.html](index.html) as a shell for repeated education content.
2. Add or update education records in [education-components.js](education-components.js), not by duplicating HTML cards in [index.html](index.html).
3. Preserve existing CSS class names used by cards unless there is a deliberate visual refactor.
4. Keep semantic and accessibility attributes:
   - `role="list"` on timeline containers
   - `role="listitem"` on card articles
   - meaningful image `alt` text

### Avoid this
1. Do not reintroduce large repeated `<article>` blocks directly into [index.html](index.html).
2. Do not mix data and styling logic.
3. Do not add timeline-specific legacy classes that were removed unless explicitly requested.

## Safe Change Workflow
1. Read this file.
2. Read [index.html](index.html), [education-components.js](education-components.js), and [styles.css](styles.css).
3. Apply changes first in [education-components.js](education-components.js) for content updates.
4. Use [styles.css](styles.css) for visual changes.
5. Validate:
   - no syntax errors
   - mount points still render content
   - no duplicated education card markup added back into [index.html](index.html)

## Optional Next Refactor (if requested)
The same component pattern can be extended to:
- Header/navigation links
- Skills Snapshot section text blocks

If extended, keep [index.html](index.html) as composition shell and move structured content to dedicated JS data objects.
