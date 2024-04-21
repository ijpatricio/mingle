// @ts-check
const {test, expect} = require('@playwright/test')

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
