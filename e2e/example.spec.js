const { test, expect } = require('@playwright/test');

test('homepage', async ({page}) => {
    await page.goto('/')
    const locator = page.locator('body')
    await expect(locator).toHaveText(/MingleJS Demo/)
})

test('livewire page', async ({page}) => {

    await page.goto('/demo-with-livewire')

    const locator = page.locator('body')
    await expect(locator).toHaveText(/Counter component with Livewire/)

    await expect(locator).toHaveText(/Current Server Count: 1/)
    await page.getByTestId('doubleItServer').click();
    await expect(locator).toHaveText(/Current Server Count: 2/)
})


test('react page', async ({page}) => {

    await page.goto('/demo-with-react')

    const locator = page.locator('body')
    await expect(locator, {
        timeout: 10000
    }).toHaveText(/Counter component with React/)

    await expect(locator).toHaveText(/Current Count: 1/)
    await page.getByRole('button', { name: 'Double it - and give it to the next person' }).click();
    await expect(locator).toHaveText(/Current Count: 2/)
})


test('vue page', async ({page}) => {

    await page.goto('/demo-with-vue')

    const locator = page.locator('body')
    await expect(locator, {
        timeout: 10000
    }).toHaveText(/Counter component with Vue/)

    await expect(locator).toHaveText(/Current Count: 1/)
    await page.getByRole('button', { name: 'Double it - and give it to the next person' }).click();
    await expect(locator).toHaveText(/Current Count: 2/)

    await page.waitForTimeout(1500)
})


test('filament pages', async ({page}) => {

    let locator

    await page.goto('/filament')
    await page.getByRole('button', { name: 'Sign in' }).click();
    locator = page.locator('body')
    await expect(locator).toHaveText(/Dashboard/)

    // React Page
    await page.goto('/filament/demo-react')
    locator = page.locator('body')
    await expect(locator).toHaveText(/Counter component with React/)
    await expect(locator).toHaveText(/Current Count: 1/)
    await page.getByRole('button', { name: 'Double it - and give it to the next person' }).click();
    await expect(locator).toHaveText(/Current Count: 2/)

    await page.screenshot({
        fullPage: false,
        mask: [page.locator('.volatile-content')]
    })

    // Vue Page
    await page.goto('/filament/demo-vue')
    locator = page.locator('body')
    await expect(locator).toHaveText(/Counter component with Vue/)
    await expect(locator).toHaveText(/Current Count: 1/)
    await page.getByRole('button', { name: 'Double it - and give it to the next person' }).click();
    await expect(locator).toHaveText(/Current Count: 2/)
})
