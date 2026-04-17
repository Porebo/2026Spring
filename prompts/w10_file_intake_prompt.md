# W10 Repeatable File Intake Prompt (Action Directory: IFSC_77003_Data_Science/w10/DataSciencewithScala)

Use this workflow every time I provide a filename.

## Goal
Given one filename, locate it in Downloads, copy it to the W10 course folder, verify it was copied, explain what the file is about, and report completion.

## Trigger Phrase
Use this exact command format:
- file name <FILENAME> do w10promp

Example:
- file name Summary Statistics, Correlations, and Random Data.txt do w10promp

## Destination Folder
IFSC_77003_Data_Science/w10/DataSciencewithScala

## Input Format
A single filename, for example:
- Vectors and Labelled Points.txt
- Local and Distributed Matrices.txt
- Summary Statistics, Correlations, and Random Data.txt

## Required Process
1. Confirm you are using this destination:
   C:/Users/leste/OneDrive - UA Little Rock/2026/2026Spring/IFSC_77003_Data_Science/w10/DataSciencewithScala
2. Find the file in:
   C:/Users/leste/Downloads
3. If exact name is not found, try a safe partial-name match and use the best match.
4. Copy the file into the destination folder.
5. Verify copy success by listing destination contents and confirming the filename appears.
6. Open the copied file.
7. Summarize it in plain language with key points.
8. Report back with the final saved path and summary.

## Response Style
- Be concise.
- Always include the destination file path.
- Always include a short plain-language summary of the file contents.
- If the source file is missing, clearly say it was not found and list close matches from Downloads.

## PowerShell Reference (Reusable)

```powershell
$downloads = "C:\Users\leste\Downloads"
$targetName = "<FILENAME_FROM_USER>"
$src = Join-Path $downloads $targetName
$dstDir = "C:\Users\leste\OneDrive - UA Little Rock\2026\2026Spring\IFSC_77003_Data_Science\w10\DataSciencewithScala"

if (-not (Test-Path -LiteralPath $src)) {
    $match = Get-ChildItem -LiteralPath $downloads -File |
      Where-Object { $_.Name -like "*$($targetName.Split('.')[0])*" } |
      Select-Object -First 5

    if ($null -eq $match -or $match.Count -eq 0) {
        Write-Error "Source file not found in Downloads: $targetName"
        exit 1
    }

    # Use first close match
    $src = $match[0].FullName
    $targetName = $match[0].Name
}

New-Item -ItemType Directory -Path $dstDir -Force | Out-Null
Copy-Item -LiteralPath $src -Destination (Join-Path $dstDir $targetName) -Force
Get-ChildItem -LiteralPath $dstDir | Select-Object Name,Length,LastWriteTime
```
