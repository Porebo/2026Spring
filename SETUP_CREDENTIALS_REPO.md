# Credentials Repository Setup

Academic credentials, the Skills Snapshot, and the education timeline were removed from this coursework hub and packaged for a separate repository.

## Target repository

Create a new public GitHub repository named **`credentials`** under the `Porebo` account, then publish the contents of the bundled `credentials-site/` folder.

**Intended live URL:** https://porebo.github.io/credentials/

## One-time setup

```bash
# From your machine, after creating github.com/Porebo/credentials
git clone https://github.com/Porebo/credentials.git
cd credentials

# Copy everything from credentials-site/ in 2026Spring (not the folder itself)
cp -r /path/to/2026Spring/credentials-site/* .
cp -r /path/to/2026Spring/credentials-site/.nojekyll .

git add -A
git commit -m "Initial credentials and portfolio site"
git push origin main
```

## Enable GitHub Pages

1. Open **Settings → Pages** for `Porebo/credentials`.
2. Set **Source** to `Deploy from a branch`.
3. Choose branch `main` and folder `/ (root)`.
4. Save. The site should appear at https://porebo.github.io/credentials/ within a few minutes.

## After the credentials repo is live

1. Confirm https://porebo.github.io/credentials/ loads correctly.
2. Confirm https://porebo.github.io/2026Spring/ links to it from the nav bar.
3. Delete the `credentials-site/` folder from `2026Spring` (it is only a migration bundle).
4. Delete this setup file if you no longer need it.

## What moved out of 2026Spring

| Removed from coursework hub | Now lives in credentials repo |
|----------------------------|-------------------------------|
| Skills Snapshot prose | `index.html` |
| Education timeline cards | `education-components.js` |
| Institution logos | `images/` |
| Portfolio-specific CSS | `styles.css` |
| Maintenance instructions | `prompts/ai_instruction_for_credentials.md` |

## What stays in 2026Spring

- IFSC 71003 and IFSC 77003 transcripts and project sites
- Prompt Hub
- Coursework hub landing page (`index.html`)
