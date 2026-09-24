import { test, expect } from '@playwright/test';

const adminPath = process.env.ADMIN_PATH || 'admin';
const workbenchUrl = `/${adminPath}/magewire/playwright/ui`;

test.beforeEach(async ({ page }) => {
    // Magento developer mode compiles backend LESS on demand. These checks exercise
    // authentication and Magewire behavior, so avoid the expensive stylesheet request.
    await page.route('**/*', route =>
        route.request().resourceType() === 'stylesheet' ? route.abort() : route.continue()
    );
});

test('admin workbench requires an authenticated session', async ({ page }) => {
    await page.goto(workbenchUrl, { waitUntil: 'domcontentloaded' });

    await expect(page.locator('#login-form')).toBeVisible();
    await expect(page.getByRole('button', { name: 'Sign in' })).toBeVisible();
    await expect(page.getByTestId('ui-workbench')).toHaveCount(0);
});

test('admin workbench renders and handles a Magewire update', async ({ page }) => {
    await page.goto(workbenchUrl, { waitUntil: 'domcontentloaded' });
    await page.locator('#username').fill(process.env.ADMIN_USER);
    await page.locator('#login').fill(process.env.ADMIN_PASSWORD);
    await page.getByRole('button', { name: 'Sign in' }).click();

    await page.goto(workbenchUrl, { waitUntil: 'domcontentloaded' });
    const workbench = page.getByTestId('ui-workbench');
    await expect(workbench).toBeVisible();
    await expect(workbench.getByRole('heading', { level: 1 })).toHaveText('Magewire UI');
    await expect(workbench.getByTestId('ui-request-count')).toHaveText('0');

    const update = page.waitForResponse(response =>
        response.request().method() === 'POST' && response.url().includes('/magewire/update')
    );
    await workbench.getByTestId('ui-request-start').click();

    expect((await update).ok()).toBe(true);
    await expect(workbench.getByTestId('ui-request-count')).toHaveText('1');
});
