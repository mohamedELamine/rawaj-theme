<?php
/**
 * Rawaj Theme Functions
 *
 * @package Rawaj
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('RAWAJ_VERSION', '1.0.0');
define('RAWAJ_THEME_DIR', get_template_directory());
define('RAWAJ_THEME_URI', get_template_directory_uri());

add_action('after_setup_theme', 'rawaj_setup');
function rawaj_setup()
{
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('appearance-tools');
    add_theme_support('border');
    add_theme_support('block-template-parts');
    add_theme_support('core-block-patterns');
    
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
    
    load_theme_textdomain('rawaj', RAWAJ_THEME_DIR . '/languages');
}

add_action('wp_enqueue_scripts', 'rawaj_enqueue_assets');
function rawaj_enqueue_assets()
{
    wp_enqueue_style(
        'rawaj-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&family=Tajawal:wght@400;500;600;700&display=swap',
        array(),
        RAWAJ_VERSION
    );
    
    wp_enqueue_style(
        'rawaj-style',
        get_stylesheet_uri(),
        array('rawaj-google-fonts'),
        RAWAJ_VERSION
    );
}

add_action('enqueue_block_editor_assets', 'rawaj_editor_assets');
function rawaj_editor_assets()
{
    wp_enqueue_style(
        'rawaj-editor-fonts',
        'https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800;900&family=Tajawal:wght@400;500;600;700&display=swap',
        array(),
        RAWAJ_VERSION
    );
}

add_filter('wp_resource_hints', 'rawaj_resource_hints', 10, 2);
function rawaj_resource_hints($urls, $relation_type)
{
    if ('preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin' => true,
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => true,
        );
    }
    return $urls;
}

add_action('init', 'rawaj_register_blockPatterns');
function rawaj_register_blockPatterns()
{
    register_block_pattern_category(
        'rawaj',
        array(
            'label' => __('Rawaj', 'rawaj'),
        )
    );
    
    register_block_pattern(
        'rawaj/hero',
        array(
            'title'       => __('Hero Section', 'rawaj'),
            'description' => __('A full-width hero section with background color and text overlay.', 'rawaj'),
            'categories'  => array('rawaj'),
            'content'     => rawaj_get_hero_pattern(),
        )
    );
    
    register_block_pattern(
        'rawaj/product-card-grid',
        array(
            'title'       => __('Product Card Grid', 'rawaj'),
            'description' => __('A grid of product cards with consistent styling.', 'rawaj'),
            'categories'  => array('rawaj', 'woocommerce'),
            'content'     => rawaj_get_product_card_pattern(),
        )
    );
}

function rawaj_get_hero_pattern()
{
    return '<!-- wp:cover {"url":"","hasParallax":false,"dimRatio":0,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":500,"minHeightUnit":"px","align":"full","style":{"border":{"radius":"var(--wp--preset--border-radius--medium)"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--3x-large)","bottom":"var(--wp--preset--spacing--3x-large)","left":"var(--wp--preset--spacing--large)","right":"var(--wp--preset--spacing--large)"}}},"layout":{"type":"constrained"},"textColor":"white"} --><div class="wp-block-cover alignfull" style="min-height:500px;border-radius:var(--wp--preset--border-radius--medium);padding-top:var(--wp--preset--spacing--3x-large);padding-bottom:var(--wp--preset--spacing--3x-large);padding-left:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large)"><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--5x-large)"}}} --><h1 class="wp-block-heading has-text-align-center" style="font-size:var(--wp--preset--font-size--5x-large)">' . esc_html__('Welcome to Rawaj', 'rawaj') . '</h1><!-- /wp:heading --><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var(--wp--preset--font-size--extra-large)"}}} --><p class="has-text-align-center" style="font-size:var(--wp--preset--font-size--extra-large)">' . esc_html__('A premium Arabic-first WooCommerce theme.', 'rawaj') . '</p><!-- /wp:paragraph --><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--medium)","bottom":"var(--wp--preset--spacing--medium)","left":"var(--wp--preset--spacing--large)","right":"var(--wp--preset--spacing--large)"}}}} --><div class="wp-block-button"><a class="wp-block-button__link wp-element-button">' . esc_html__('Shop Now', 'rawaj') . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div></div><!-- /wp:cover -->';
}

function rawaj_get_product_card_pattern()
{
    return '<!-- wp:columns {"style":{"spacing":{"gap":"var(--wp--preset--spacing--large)","margin":{"top":"var(--wp--preset--spacing--large)","bottom":"var(--wp--preset--spacing--large)"}}},"className":"product-card-grid"} --><div class="wp-block-columns product-card-grid" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--large);gap:var(--wp--preset--spacing--large)"><!-- wp:column {"style":{"border":{"color":"var(--wp--preset--color--border)","width":"1px","radius":"var(--wp--preset--border-radius--medium)"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--large)","bottom":"var(--wp--preset--spacing--large)","left":"var(--wp--preset--spacing--large)","right":"var(--wp--preset--spacing--large)"}}}} --><div class="wp-block-column" style="border-color:var(--wp--preset--color--border);border-width:1px;border-radius:var(--wp--preset--spacing--medium);padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large)"><!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--large)"}}} --><h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--large)">' . esc_html__('Product Title', 'rawaj') . '</h3><!-- /wp:heading --><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--accent)"}}},"typography":{"fontSize":"var(--wp--preset--font-size--medium)"}},"textColor":"accent"} --><p class="has-accent-color has-text-color" style="font-size:var(--wp--preset--font-size--medium)">$99.00</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns -->';
}

add_filter('block_categories_all', 'rawaj_block_categories');
function rawaj_block_categories($categories)
{
    array_unshift(
        $categories,
        array(
            'slug'  => 'rawaj-blocks',
            'title' => __('Rawaj Blocks', 'rawaj'),
        )
    );
    return $categories;
}

function rawaj_get_color_palette()
{
    return array(
        array(
            'name'  => __('Primary', 'rawaj'),
            'slug'  => 'primary',
            'color' => '#1a1a1a',
        ),
        array(
            'name'  => __('Primary Light', 'rawaj'),
            'slug'  => 'primary-light',
            'color' => '#2d2d2d',
        ),
        array(
            'name'  => __('Accent', 'rawaj'),
            'slug'  => 'accent',
            'color' => '#c4a572',
        ),
        array(
            'name'  => __('Accent Dark', 'rawaj'),
            'slug'  => 'accent-dark',
            'color' => '#8b7355',
        ),
        array(
            'name'  => __('Background', 'rawaj'),
            'slug'  => 'bg',
            'color' => '#f8f6f3',
        ),
        array(
            'name'  => __('Background Alt', 'rawaj'),
            'slug'  => 'bg-alt',
            'color' => '#faf8f5',
        ),
        array(
            'name'  => __('Text', 'rawaj'),
            'slug'  => 'text',
            'color' => '#2a2a2a',
        ),
        array(
            'name'  => __('Text Light', 'rawaj'),
            'slug'  => 'text-light',
            'color' => '#666666',
        ),
        array(
            'name'  => __('Border', 'rawaj'),
            'slug'  => 'border',
            'color' => '#e8e6e3',
        ),
        array(
            'name'  => __('Success', 'rawaj'),
            'slug'  => 'success',
            'color' => '#4caf50',
        ),
        array(
            'name'  => __('Warning', 'rawaj'),
            'slug'  => 'warning',
            'color' => '#ff9800',
        ),
        array(
            'name'  => __('Error', 'rawaj'),
            'slug'  => 'error',
            'color' => '#f44336',
        ),
        array(
            'name'  => __('Info', 'rawaj'),
            'slug'  => 'info',
            'color' => '#2196f3',
        ),
        array(
            'name'  => __('White', 'rawaj'),
            'slug'  => 'white',
            'color' => '#ffffff',
        ),
    );
}

add_filter('render_block', 'rawaj_rtl_support', 10, 2);
function rawaj_rtl_support($block_content, $block)
{
    if (!is_rtl()) {
        return $block_content;
    }

    // Skip blocks that already use CSS logical properties to avoid double-conversion.
    $already_logical = (
        strpos($block_content, 'margin-inline-start') !== false ||
        strpos($block_content, 'margin-inline-end')   !== false ||
        strpos($block_content, 'padding-inline-start') !== false ||
        strpos($block_content, 'padding-inline-end')   !== false
    );

    if ($already_logical) {
        return $block_content;
    }

    // Convert physical CSS properties to logical equivalents for RTL.
    // We use preg_replace to target specific CSS property definitions in style attributes.
    $replacements = array(
        '/text-align\s*:\s*left(?=[;"])/i'   => 'text-align: right',
        '/margin-left\s*:\s*(?=[^;"])/i'     => 'margin-inline-start:',
        '/margin-right\s*:\s*(?=[^;"])/i'    => 'margin-inline-end:',
        '/padding-left\s*:\s*(?=[^;"])/i'    => 'padding-inline-start:',
        '/padding-right\s*:\s*(?=[^;"])/i'   => 'padding-inline-end:',
        '/border-left\s*:\s*(?=[^;"])/i'     => 'border-inline-start:',
        '/border-right\s*:\s*(?=[^;"])/i'    => 'border-inline-end:',
        '/left\s*:\s*(?=[^;"])/i'            => 'inset-inline-start:',
        '/right\s*:\s*(?=[^;"])/i'           => 'inset-inline-end:',
    );

    return preg_replace(array_keys($replacements), array_values($replacements), $block_content);
}

add_action('init', 'rawaj_register_blocks');
function rawaj_register_blocks()
{
    register_block_type(RAWAJ_THEME_DIR . '/blocks/product-showcase');
    register_block_type(RAWAJ_THEME_DIR . '/blocks/cta');
}

add_action('wp_body_open', 'rawaj_dark_mode_script');
function rawaj_dark_mode_script()
{
    if (get_theme_mod('rawaj_dark_mode_toggle', false)) {
        ?>
        <script>
        (function() {
            const darkMode = localStorage.getItem('rawaj-dark-mode');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (darkMode === 'true' || (darkMode === null && prefersDark)) {
                document.documentElement.classList.add('is-dark-mode');
                document.body.classList.add('is-dark-mode');
            }
        })();
        </script>
        <?php
    }
}

add_action('customize_register', 'rawaj_customize_register');
function rawaj_customize_register($wp_customize)
{
    $wp_customize->add_section('rawaj_theme_options', array(
        'title'    => __('Rawaj Theme Options', 'rawaj'),
        'priority' => 130,
    ));
    
    $wp_customize->add_setting('rawaj_dark_mode_toggle', array(
        'default'           => false,
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('rawaj_dark_mode_toggle', array(
        'label'    => __('Enable Dark Mode Toggle', 'rawaj'),
        'section'  => 'rawaj_theme_options',
        'settings' => 'rawaj_dark_mode_toggle',
        'type'     => 'checkbox',
    ));
}

add_filter('body_class', 'rawaj_body_class');
function rawaj_body_class($classes)
{
    if (get_theme_mod('rawaj_dark_mode_toggle', false)) {
        $classes[] = 'has-dark-mode-toggle';
    }
    return $classes;
}

function rawaj_dark_mode_colors()
{
    return array(
        'light' => array(
            'primary' => '#1a1a1a',
            'bg' => '#f8f6f3',
            'text' => '#2a2a2a',
        ),
        'dark' => array(
            'primary' => '#ffffff',
            'bg' => '#1a1a1a',
            'text' => '#ffffff',
        ),
    );
}