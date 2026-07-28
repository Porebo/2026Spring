const { test, expect } = require("@playwright/test");

test("homepage loads with expected title and heading", async ({ page }) => {
  await page.goto("/");

  await expect(page).toHaveTitle(/Spring 2026 Hub/i);
  await expect(page.getByRole("heading", { level: 1 })).toHaveText("Spring 2026 Hub");
});

test("homepage includes key navigation links", async ({ page }) => {
  await page.goto("/");

  await expect(
    page.getByRole("navigation", { name: "Main site links" }).getByRole("link", {
      name: /Credentials & Portfolio/i
    })
  ).toBeVisible();
  await expect(
    page.getByRole("navigation", { name: "Main site links" }).getByRole("link", {
      name: /IFSC 71003 Transcripts/i
    })
  ).toBeVisible();
  await expect(
    page.getByRole("navigation", { name: "Main site links" }).getByRole("link", {
      name: /IFSC 71003 Project Site/i
    })
  ).toBeVisible();
  await expect(
    page.getByRole("navigation", { name: "Main site links" }).getByRole("link", {
      name: /IFSC 77003 Transcripts/i
    })
  ).toBeVisible();
  await expect(
    page.getByRole("navigation", { name: "Main site links" }).getByRole("link", {
      name: /Prompt Hub/i
    })
  ).toBeVisible();
});

test("homepage links to credentials section", async ({ page }) => {
  await page.goto("/");

  const credentialsLink = page
    .getByRole("navigation", { name: "Main site links" })
    .getByRole("link", { name: /Credentials & Portfolio/i });
  await expect(credentialsLink).toHaveAttribute("href", "credentials/index.html");
});
