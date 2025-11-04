import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
    await page.goto('http://localhost:8000/welcome');
    await page.waitForTimeout(1000);
    await page.getByRole('link', { name: 'Login' }).click();
    await page.waitForTimeout(1000);
    await page.getByRole('textbox', { name: 'Username atau No Induk' }).click();
    await page.waitForTimeout(1000);
    await page.getByRole('textbox', { name: 'Username atau No Induk' }).fill('teknisi1');
    await page.waitForTimeout(1000);
    await page.getByRole('textbox', { name: 'Password' }).click();
    await page.waitForTimeout(1000);
    await page.getByRole('textbox', { name: 'Password' }).fill('12345');
    await page.waitForTimeout(1000);
    await page.getByRole('button', { name: 'Login' }).click();
    await page.waitForTimeout(1000);
    await page.getByRole('button', { name: 'OK' }).click();
    await page.waitForTimeout(1000);
    await page.getByRole('link', { name: ' Penugasan ' }).click();
    await page.waitForTimeout(1000);
    await page.getByRole('link', { name: ' Daftar Tugas' }).click();
    await page.waitForTimeout(1000);
    await page.getByRole('button', { name: '' }).click();
    await page.waitForTimeout(1000);
    await page.getByRole('button', { name: 'Selesai' }).click();
    await page.waitForTimeout(1000);
});