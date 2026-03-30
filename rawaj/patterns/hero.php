<?php
/**
 * Title: Hero Section
 * Slug: rawaj/hero
 * Categories: rawaj
 * Description: A full-width hero section with background color and text overlay.
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- wp:cover {"url":"","hasParallax":false,"dimRatio":0,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":500,"minHeightUnit":"px","align":"full","style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--3x-large)","bottom":"var(--wp--preset--spacing--3x-large)","left":"var(--wp--preset--spacing--large)","right":"var(--wp--preset--spacing--large)"}}},"layout":{"type":"constrained"},"textColor":"white"} -->
<div class="wp-block-cover alignfull" style="min-height:500px;padding-top:var(--wp--preset--spacing--3x-large);padding-bottom:var(--wp--preset--spacing--3x-large);padding-left:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large)">
    <span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-100 has-background-dim"></span>
    <div class="wp-block-cover__inner-container">
        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--5x-large)"}}} -->
        <h1 class="wp-block-heading has-text-align-center" style="font-size:var(--wp--preset--font-size--5x-large)"><?php echo esc_html__('Welcome to Rawaj', 'rawaj'); ?></h1>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var(--wp--preset--font-size--extra-large)"}}} -->
        <p class="has-text-align-center" style="font-size:var(--wp--preset--font-size--extra-large)"><?php echo esc_html__('A premium Arabic-first WooCommerce theme with modern design tokens.', 'rawaj'); ?></p>
        <!-- /wp:paragraph -->
        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button {"style":{"spacing":{"padding":{"top":"var(--wp--preset--spacing--medium)","bottom":"var(--wp--preset--spacing--medium)","left":"var(--wp--preset--spacing--large)","right":"var(--wp--preset--spacing--large)"}}}} -->
            <div class="wp-block-button">
                <a class="wp-block-button__link wp-element-button" href="<?php echo esc_url(home_url('/shop/')); ?>"><?php echo esc_html__('Shop Now', 'rawaj'); ?></a>
            </div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
</div>
<!-- /wp:cover -->