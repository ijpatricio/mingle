const { test, expect } = require('@playwright/test');

test('Welcome Page', async ({page}) => {
    await page.goto('/')
    const locator = page.locator('body')
    await expect(locator).toContainText("Welcome to Mingle JS")
})
