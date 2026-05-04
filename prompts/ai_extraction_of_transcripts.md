# AI Process: Extracting Zoom Transcripts from Blackboard

**Purpose:** Step-by-step instructions for an AI agent to extract audio transcripts from Zoom class recordings embedded in Blackboard Ultra and save them locally.

**Tools required:** VS Code with GitHub Copilot agent mode, Playwright browser tools (`open_browser_page`, `navigate_page`, `run_playwright_code`).

---

## Overview

Blackboard Ultra embeds a class panel (hosted on `ualr.class.com`) inside an iframe. From the Recordings tab of that panel, each recording links to a Zoom share URL. The Zoom player renders a transcript panel in the DOM (`li.transcript-list-item` elements) that can be extracted via JavaScript once playback is started.

---

## Step 1: Navigate to the Blackboard Course

1. Open the Blackboard course outline page:
   - IFSC 71003: `https://blackboard.ualr.edu/ultra/courses/_285048_1/outline`
   - IFSC 77003: `https://blackboard.ualr.edu/ultra/courses/_285118_1/outline`
2. The user must already be authenticated (Microsoft SSO login). If not, have the user sign in manually first.

```javascript
// navigate_page tool:
// pageId: <existing blackboard page id>
// type: "url"
// url: "https://blackboard.ualr.edu/ultra/courses/_285118_1/outline"
```

---

## Step 2: Open the Class Panel

Click "Launch Class" by evaluating JavaScript in the page. The button cannot always be reached via Playwright locators due to Blackboard's rendering — use `page.evaluate()` instead:

```javascript
await page.evaluate(() => {
  const buttons = Array.from(document.querySelectorAll('button'));
  const btn = buttons.find(b => b.textContent.includes('Launch Class'));
  if (btn) btn.click();
});
await page.waitForTimeout(3000);
```

---

## Step 3: Navigate to the Recordings Tab

The Class panel loads inside an iframe from `ualr.class.com`. Access it via `page.frames()`:

```javascript
const classFrame = page.frames().find(f => f.url().includes('ualr.class.com'));
await classFrame.evaluate(() => {
  const tabs = Array.from(document.querySelectorAll('[role="tab"]'));
  const rec = tabs.find(t => t.textContent.includes('Recordings'));
  if (rec) rec.click();
});
await page.waitForTimeout(2000);
```

---

## Step 4: List All Available Recordings

```javascript
const classFrame = page.frames().find(f => f.url().includes('ualr.class.com'));
const recordings = await classFrame.evaluate(() => {
  const rows = Array.from(document.querySelectorAll('tr, [role="row"]'));
  return rows.map(r => r.textContent.trim()).filter(Boolean);
});
// Returns array of strings with date, topic, duration, and action buttons per row
```

Each row contains: date, time range, recording name, duration, access level, and "Start playback" button.

---

## Step 5: Compare with Local Transcripts

List local transcript files and compare dates against the online list:

```powershell
Get-ChildItem "C:\Users\leste\OneDrive - UA Little Rock\2026\2026Spring\IFSC_77003_Data_Science\transcripts" | Select-Object Name
```

Match filenames (format: `YYYY_MM_DD_*.html` or `YYYY_MM_DD_*_Raw.txt`) to recording dates to identify gaps.

---

## Step 6: Capture the Zoom URL for a Specific Recording

**Critical:** Direct `click()` on the "Start playback" button does not reliably open a new browser tab. Instead, intercept `window.open()` to capture the URL before it opens:

```javascript
const classFrame = page.frames().find(f => f.url().includes('ualr.class.com'));

// Set up window.open intercept in the iframe
await classFrame.evaluate(() => {
  window._capturedUrl = null;
  const origOpen = window.open;
  window.open = function(url, target, features) {
    window._capturedUrl = url;
    return origOpen.call(window, url, target, features);
  };
});

// Click the Start playback button for the desired recording row
await classFrame.evaluate((targetDateText) => {
  const rows = Array.from(document.querySelectorAll('tr, [role="row"]'));
  const row = rows.find(r => r.textContent.includes(targetDateText));
  if (row) {
    const startBtn = Array.from(row.querySelectorAll('button'))
      .find(b => b.textContent.includes('Start playback'));
    if (startBtn) startBtn.click();
  }
}, 'April 23rd');  // <-- change to desired date string

await page.waitForTimeout(2000);
const zoomUrl = await classFrame.evaluate(() => window._capturedUrl);
// zoomUrl is now the Zoom share URL (e.g., https://ualr-edu.zoom.us/rec/share/...)
```

---

## Step 7: Open the Zoom Recording Page

```javascript
// open_browser_page tool (or navigate an existing Zoom page):
// url: zoomUrl (captured above)
```

Or reuse an existing Zoom page:
```javascript
await page.goto(zoomUrl);
```

Wait for the page to load (it will redirect to a `/rec/play/...` URL).

---

## Step 8: Activate the Transcript Panel and Start Playback

```javascript
await page.waitForLoadState('domcontentloaded');
await page.waitForTimeout(3000);

// Click "CC Transcript" or similar transcript toggle button
await page.evaluate(() => {
  const all = Array.from(document.querySelectorAll('button, [role="button"], a, li'));
  const transcriptBtn = all.find(el => el.textContent.toLowerCase().includes('transcript'));
  if (transcriptBtn) transcriptBtn.click();
});
await page.waitForTimeout(2000);

// Start playback (required to populate transcript DOM)
await page.evaluate(() => {
  const playBtn = document.querySelector('button[aria-label*="Play"], button[title*="Play"]');
  if (playBtn) playBtn.click();
});

// Wait for transcript items to load into the DOM
await page.waitForTimeout(8000);
```

---

## Step 9: Extract Transcript Items

```javascript
const items = await page.evaluate(() => {
  const nodes = Array.from(document.querySelectorAll('li.transcript-list-item'));
  return nodes.map(n => n.innerText.trim()).filter(Boolean);
});
// items is an array of strings; each is one transcript segment
// Speaker name and timestamp appear in the first item of each speaker turn,
// e.g. "Elizabeth Pierce00:04:32Some sentence text here."
```

Typical counts: 300–450 items for a ~70-minute session.

---

## Step 10: Save the Raw Transcript

Use a Python script to parse the JSON result (the `run_playwright_code` tool wraps results in `Result: "..."` format) and write to disk:

```python
import json, pathlib, re

# Path to the tool output file (from run_playwright_code result)
src = pathlib.Path(r'<path_to_tool_output_content.txt>')
raw = src.read_text(encoding='utf-8')

# Strip the "Result: " prefix and decode the nested JSON
if raw.startswith('Result: '):
    inner = raw[len('Result: '):]
arr_str = json.loads(inner)   # outer JSON-encoded string
items = json.loads(arr_str)   # inner JSON array

header = (
    'IFSC 77003 - Audio Transcript (Raw)\n'
    'Date: 2026-04-23\n'
    'Topic: Some Case Studies Related to Data Science Ethics\n'
    'Duration: 01:13:24\n'
    'Source: Zoom transcript panel DOM\n\n'
)

dest = pathlib.Path(r'C:\Users\leste\OneDrive - UA Little Rock\2026\2026Spring'
                    r'\IFSC_77003_Data_Science\transcripts\2026_04_23_Audio_Transcript_Raw.txt')
dest.write_text(header + '\n'.join(items), encoding='utf-8')
print(f'Saved {len(items)} items, {dest.stat().st_size} bytes')
```

---

## File Naming Convention

Raw transcript text files:
```
YYYY_MM_DD_Audio_Transcript_Raw.txt
```

Final styled HTML transcripts (existing format):
```
YYYY_MM_DD_Topic_Name.html
```

---

## Known Issues and Workarounds

| Problem | Cause | Workaround |
|---|---|---|
| `click()` on "Launch Class" times out | Button is in a complex Blackboard component | Use `page.evaluate()` with `document.querySelectorAll` |
| "Start playback" does not open new tab | Popup blocked or tab not captured by Playwright context | Intercept `window.open` in the iframe to capture the URL, then navigate manually |
| Transcript panel shows 0 items | Playback not started; transcript only populates after play begins | Click play button and wait ~8 seconds before extracting |
| VTT transcript URL returns 403 | S3 signed URLs are session-bound and expire | Extract from DOM instead of downloading the VTT file |
| Class frame not found | `ualr.class.com` iframe not yet loaded | Wait 2–3 seconds after "Launch Class" click |

---

## Courses and URLs

| Course | Blackboard URL | Local Transcripts Folder |
|---|---|---|
| IFSC 71003 Info Sys Analysis | `https://blackboard.ualr.edu/ultra/courses/_285048_1/outline` | `IFSC_71003_Info_Sys_Analysis\transcripts\` |
| IFSC 77003 Data Science | `https://blackboard.ualr.edu/ultra/courses/_285118_1/outline` | `IFSC_77003_Data_Science\transcripts\` |

---

*Last updated: 2026-05-03*
