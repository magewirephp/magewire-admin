import { defineConfig } from '@playwright/test';
import 'dotenv/config';

export default defineConfig({
    testDir: './tests',
    retries: process.env.CI ? 2 : 0,
    reporter: 'list',
    use: {
        baseURL: process.env.BASE_URL,
        browserName: 'chromium',
        headless: true,
        ignoreHTTPSErrors: true,
        trace: 'retain-on-failure',
        screenshot: 'only-on-failure',
    },
});
