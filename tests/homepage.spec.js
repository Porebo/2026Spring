const { test, expect } = require("@playwright/test");

test("homepage loads with expected title and heading", async ({ page }) => {
  await page.goto("/");

  await expect(page).toHaveTitle(/Spring 2026 Hub/i);
  await expect(page.getByRole("heading", { level: 1 })).toContainText(
    "Spring 2026 University of Arkansas at Little Rock Hub"
  );
});

test("homepage includes key navigation links", async ({ page }) => {
  await page.goto("/");

  await expect(
    page.getByRole("link", { name: "IFSC 71003 - Project Website" })
  ).toBeVisible();
  await expect(
    page.getByRole("link", { name: "IFSC 77003 - Transcripts" })
  ).toBeVisible();
  await expect(page.getByRole("link", { name: "Reusable Prompt Hub" })).toBeVisible();
});