# Workspace Prompt Audit (2026-04-17)

## Scope
- Root scanned: `2026Spring`
- Goal: identify AI prompt artifacts and prompt-adjacent instruction files that may need centralization into `prompts/`

## Already Centralized (in prompts/)
- `prompts/prompt_main.md`
- `prompts/prompt_main.html`
- `prompts/nova_team_prompt.md`
- `prompts/nova_team_prompt.html`
- `prompts/transcripts_manager_prompt.md`
- `prompts/transcripts_manager_prompt.html`
- `prompts/prompt.md`
- `prompts/prompt.txt`
- `prompts/lester_prompt.md`
- `prompts/Daniel_Berleant.md`
- `prompts/Prompt Template for New Transcrip.txt`
- `prompts/ai_instruction_for_main_index.md`
- `prompts/assistant_preferences.md`
- `prompts/w10_file_intake_prompt.md`

## Scattered Files (likely centralization candidates)
- None currently identified from this audit batch.

## Prompt-Named Files to Review Before Moving
These are likely course artifacts (assignment prompt or model output), not reusable prompt templates:
- `IFSC_71003_Info_Sys_Analysis/HW3/hw3Prompt.txt`
- `IFSC_71003_Info_Sys_Analysis/HW3/hw3PromptInPDF.pdf`
- `IFSC_71003_Info_Sys_Analysis/PromptAnswer_Claude_Opus4.6_2026_02_21.md`
- `IFSC_71003_Info_Sys_Analysis/PromptAnswerGPT5_mini_2026_02_21.md`
- `IFSC_71003_Info_Sys_Analysis/PromptAnswerGPT5.3_Codex_2026_02_21.txt`

## Prompt Mentions (not centralization targets)
These mention prompt engineering but appear to be lectures/transcripts/notes:
- `IFSC_71003_Info_Sys_Analysis/LECTURES/2026_02_05_HTML_Forms_Prompting.md`
- `IFSC_71003_Info_Sys_Analysis/transcripts/2026_02_05_HTML_Forms_Prompting.html`
- `IFSC_77003_Data_Science/transcripts/2026_03_17_AI_Deep_Learning_LLMs.html`
- `IFSC_77003_Data_Science/transcriptsSummary/2026_03_17_AI_Deep_Learning_LLMs.md`
- `IFSC_77003_Data_Science/transcriptsSummary/2026_03_19_Generative_AI_Agentic_AGI.md`

## Suggested Consolidation Plan
1. Completed: moved 3 reusable files into `prompts/` and normalized naming.
2. Completed: updated `prompts/index.html` with new prompt entries.
3. Optional: keep stubs/redirect notes in original locations for discoverability.
4. Leave course assignment prompt artifacts in course folders unless you want a separate archive under `prompts/archive/`.
