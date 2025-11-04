import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://localhost:8000/welcome');
  await page.waitForTimeout(1000);
  await page.getByRole('link', { name: 'Login' }).click();
  await page.waitForTimeout(1000);
  await page.getByRole('button', { name: 'Login' }).click();
  await page.waitForTimeout(1000);
});