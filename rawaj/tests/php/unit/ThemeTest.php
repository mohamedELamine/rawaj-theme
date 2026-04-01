<?php
/**
 * Unit Tests for Rawaj Theme
 *
 * @package Rawaj
 * @since 1.0.0
 */

use PHPUnit\Framework\TestCase;

class Rawaj_Theme_Test extends TestCase
{
    /** @var array Parsed theme.json settings */
    private static array $theme_json = [];

    public static function setUpBeforeClass(): void
    {
        $path = dirname(__DIR__, 3) . '/theme.json';
        self::$theme_json = json_decode(file_get_contents($path), true) ?? [];
    }

    public function testThemeVersionDefined(): void
    {
        $this->assertTrue(defined('RAWAJ_VERSION'), 'RAWAJ_VERSION constant is not defined.');
    }

    public function testThemeVersionFormat(): void
    {
        $this->assertMatchesRegularExpression(
            '/^\d+\.\d+\.\d+$/',
            RAWAJ_VERSION,
            'RAWAJ_VERSION must follow semver format (e.g. 1.0.0).'
        );
    }

    public function testColorPaletteCount(): void
    {
        $palette = rawaj_get_color_palette();
        $this->assertCount(14, $palette, 'Color palette must contain exactly 14 colors.');
    }

    public function testColorPaletteStructure(): void
    {
        foreach (rawaj_get_color_palette() as $color) {
            $this->assertArrayHasKey('name',  $color, 'Each color must have a "name" key.');
            $this->assertArrayHasKey('slug',  $color, 'Each color must have a "slug" key.');
            $this->assertArrayHasKey('color', $color, 'Each color must have a "color" key.');
        }
    }

    public function testFontSizesFromThemeJson(): void
    {
        $font_sizes = self::$theme_json['settings']['typography']['fontSizes'] ?? [];
        $this->assertCount(8, $font_sizes, 'theme.json must define exactly 8 font sizes.');

        $sizes = array_column($font_sizes, 'size');
        $this->assertContains('12px', $sizes, 'Font size 12px (extra-small) must be defined.');
        $this->assertContains('56px', $sizes, 'Font size 56px (5x-large) must be defined.');
    }

    public function testSpacingSizesFromThemeJson(): void
    {
        $spacing = self::$theme_json['settings']['spacing']['spacingSizes'] ?? [];
        $this->assertCount(7, $spacing, 'theme.json must define exactly 7 spacing sizes.');

        $sizes = array_column($spacing, 'size');
        $this->assertContains('4px',  $sizes, 'Spacing 4px (extra-small) must be defined.');
        $this->assertContains('64px', $sizes, 'Spacing 64px (3x-large) must be defined.');
    }

    public function testCairoFontIsClassifiedAsSansSerif(): void
    {
        $families = self::$theme_json['settings']['typography']['fontFamilies'] ?? [];
        $heading  = array_filter($families, fn($f) => $f['slug'] === 'heading');
        $heading  = array_values($heading)[0] ?? null;

        $this->assertNotNull($heading, 'Heading font family must be defined in theme.json.');
        $this->assertStringContainsString(
            'sans-serif',
            $heading['fontFamily'],
            'Cairo is a sans-serif font; the fallback stack must not use "serif".'
        );
    }
}