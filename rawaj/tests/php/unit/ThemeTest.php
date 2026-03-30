<?php
/**
 * Sample Unit Test
 *
 * @package Rawaj
 * @since 1.0.0
 */

use PHPUnit\Framework\TestCase;

class Rawaj_Theme_Test extends TestCase
{
    public function testThemeVersion()
    {
        $this->assertTrue(defined('RAWAJ_VERSION'));
    }
    
    public function testColorPaletteCount()
    {
        $palette = rawaj_get_color_palette();
        $this->assertCount(14, $palette);
    }
    
    public function testFontSizes()
    {
        $font_sizes = array(12, 14, 16, 18, 24, 28, 36, 56);
        $this->assertCount(8, $font_sizes);
    }
    
    public function testSpacingSizes()
    {
        $spacing = array(4, 8, 16, 24, 32, 48, 64);
        $this->assertCount(7, $spacing);
    }
}