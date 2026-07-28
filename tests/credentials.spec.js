const { test, expect } = require("@playwright/test");

test("credentials timeline shows simplified GPA labels", async ({ page }) => {
  await page.goto("/credentials/index.html");

  const timeline = page.locator(".credential-timeline-list");
  await expect(timeline).toBeVisible();

  await expect(timeline).toContainText("4.0 GPA");
  await expect(timeline).toContainText("3.61 GPA");
  await expect(timeline).toContainText("3.6 GPA");

  await expect(timeline).not.toContainText("cumulative GPA");
  await expect(timeline).not.toContainText("program GPA");
});
