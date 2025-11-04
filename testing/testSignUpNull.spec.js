import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://localhost:8000/welcome');
  await page.waitForTimeout(1000);
  await page.getByRole('link', { name: 'Sign in Now' }).click();
  await page.waitForTimeout(1000);
  await page.getByRole('button', { name: 'Sign Up' }).click();
  await page.waitForTimeout(1000);
});