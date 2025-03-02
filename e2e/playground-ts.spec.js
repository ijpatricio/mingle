const { test, expect } = require('@playwright/test');

test('homepage', async ({page}) => {
    await page.goto('/')
    const locator = page.locator('body')
    await expect(locator).toContainText("Laravel has an incredibly rich ecosystem")
})
