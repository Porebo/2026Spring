# Windows Search Bar Repair Notes

- **Issue**: Taskbar search opens as a blank panel despite SearchHost running. SearchApp.exe missing from C:\\Windows\\SystemApps\\MicrosoftWindows.Client.CBS_cw5n1h2txyewy.
- **Initial Actions (Mar 14, 2026)**:
  - Verified WSearch service running.
  - Confirmed SearchHost.exe present but Search UI binary missing; attempting to launch SearchApp.exe failed.
  - Tried re-registering the Web Experience Pack, but it failed with 0x80073D02 (resources in use).
  - Stopped SearchHost, Widgets, SearchApp, WebExperienceHost, and Explorer; re-register succeeded after killing lingering processes.
  - Restarted WSearch service; Search remained blank.
- **Next Steps**:
  1. Reboot system.
  2. Run sfc /scannow.
  3. Run DISM /Online /Cleanup-Image /RestoreHealth.
  4. Run the WebExperience re-register command again.
  5. Reboot and re-test search.
- **If still blank after the above**:
  - Check Windows Update for cumulative updates.
  - Use Get-AppPackageLog -ActivityID <activity-id> for detailed failure logs.
  - Review Event Viewer: Applications and Services Logs > Microsoft > Windows > Search.

_Last updated: March 14, 2026._
