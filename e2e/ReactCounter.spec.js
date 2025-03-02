const { test, expect } = require('@playwright/test');

test('react counter', async ({page}) => {

    await page.goto('/react-counter')

    const locator = page.locator('body')

    await expect(locator).toContainText('Slow query')

    await expect(locator).toContainText('Counter component with React')

    await expect(locator).toHaveText(/Current Count: 1/)
    await page.getByRole('button', { name: 'Double it - and give it to the next person' }).click();
    await expect(locator).toHaveText(/Current Count: 2/)

})
