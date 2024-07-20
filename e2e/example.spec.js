// @ts-check
const { test, expect } = require('@playwright/test');

test('has title', async ({ page }) => {
  await page.goto('https://playwright.dev/');

  // Expect a title "to contain" a substring.
  await expect(page).toHaveTitle(/Playwright/);
});

test('get started link', async ({ page }) => {
  await page.goto('https://playwright.dev/');

  // Click the get started link.
  await page.getByRole('link', { name: 'Get started' }).click();

  // Expects page to have a heading with the name of Installation.
  await expect(page.getByRole('heading', { name: 'Installation' })).toBeVisible();
});

test('homepage', async ({page}) => {
    await page.goto('/')
    const locator = page.locator('body')
    await expect(locator).toHaveText(/MingleJS Demo/)
})

test('livewire demo', async ({page}) => {

    await page.goto('/demo-with-livewire')

    const locator = page.locator('body')
    await expect(locator).toHaveText(/Counter component with Livewire/)

})
