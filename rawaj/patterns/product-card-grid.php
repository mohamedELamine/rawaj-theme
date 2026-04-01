<?php
/**
 * Title: Product Card Grid
 * Slug: rawaj/product-card-grid
 * Categories: rawaj, woocommerce
 * Description: A grid of product cards with consistent styling.
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!-- wp:columns {"style":{"spacing":{"gap":"var(--wp--preset--spacing--large)","margin":{"top":"var(--wp--preset--spacing--large)","bottom":"var(--wp--preset--spacing--large)"}}},"className":"product-card-grid"} -->
<div class="wp-block-columns product-card-grid" style="margin-top:var(--wp--preset--spacing--large);margin-bottom:var(--wp--preset--spacing--large);gap:var(--wp--preset--spacing--large)">
    <!-- wp:column {"style":{"border":{"color":"var(--wp--preset--color--border)","width":"1px","radius":"var(--wp--preset--border-radius--medium)"},"spacing":{"padding":{"top":"var(--wp--preset--spacing--large)","bottom":"var(--wp--preset--spacing--large)","left":"var(--wp--preset--spacing--large)","right":"var(--wp--preset--spacing--large)"}}}} -->
    <div class="wp-block-column" style="border-color:var(--wp--preset--color--border);border-width:1px;border-radius:var(--wp--preset--border-radius--medium);padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large)">
        <!-- wp:image {"sizeSlug":"large"} -->
        <figure class="wp-block-image size-large">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.jpg'); ?>" alt="<?php echo esc_attr__('Product Image', 'rawaj'); ?>" />
        </figure>
        <!-- /wp:image -->
        <!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var(--wp--preset--font-size--large)"}}} -->
        <h3 class="wp-block-heading" style="font-size:var(--wp--preset--font-size--large)"><?php echo esc_html__('Product Title', 'rawaj'); ?></h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var(--wp--preset--color--accent)"}}},"typography":{"fontSize":"var(--wp--preset--font-size--medium)"}},"textColor":"accent"} -->
        <p class="has-accent-color has-text-color" style="font-size:var(--wp--preset--font-size--medium)">$99.00</p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
</div>
<!-- /wp:columns -->