const { test, expect } = require('@playwright/test');

test('react hello world', async ({page}) => {

    await page.goto('/react-hello-world')

    const locator = page.locator('body')

    await expect(locator).toContainText('Hello World!')
})
