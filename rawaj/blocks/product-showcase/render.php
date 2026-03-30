<?php
/**
 * Product Showcase Block Render
 *
 * @package Rawaj
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Store original attributes before setting defaults
$original_className = isset($attributes['className']) ? esc_attr($attributes['className']) : '';
$original_align = isset($attributes['align']) ? esc_attr($attributes['align']) : '';

$attributes = array(
    'title' => isset($attributes['title']) ? $attributes['title'] : __('Featured Products', 'rawaj'),
    'description' => isset($attributes['description']) ? $attributes['description'] : __('Discover our curated selection of premium products.', 'rawaj'),
    'buttonText' => isset($attributes['buttonText']) ? $attributes['buttonText'] : __('View All Products', 'rawaj'),
    'buttonLink' => isset($attributes['buttonLink']) ? $attributes['buttonLink'] : '/shop/',
    'backgroundColor' => isset($attributes['backgroundColor']) ? $attributes['backgroundColor'] : 'var(--wp--preset--color--bg-alt)',
    'textColor' => isset($attributes['textColor']) ? $attributes['textColor'] : 'var(--wp--preset--color--text)',
    'accentColor' => isset($attributes['accentColor']) ? $attributes['accentColor'] : 'var(--wp--preset--color--accent)',
);

$blockClass = $original_className;
$alignClass = $original_align ? 'align' . $original_align : '';

$wrapper_attributes = get_block_wrapper_attributes(
    array(
        'class' => "wp-block-rawaj-product-showcase {$blockClass} {$alignClass}",
        'style' => "background-color: {$attributes['backgroundColor']}; color: {$attributes['textColor']}; padding: var(--wp--preset--spacing--2x-large) var(--wp--preset--spacing--large);",
    )
);
?>
<div <?php echo wp_kses_data($wrapper_attributes); ?>>
    <div class="wp-block-rawaj-product-showcase__content" style="max-width: var(--wp--style--global--wide-size); margin-inline: auto;">
        <h2 class="wp-block-rawaj-product-showcase__title" style="font-family: var(--wp--preset--font-family--heading); font-size: var(--wp--preset--font-size--3x-large); font-weight: 900; margin-bottom: var(--wp--preset--spacing--medium); color: <?php echo esc_attr($attributes['textColor']); ?>;">
            <?php echo esc_html($attributes['title']); ?>
        </h2>
        
        <p class="wp-block-rawaj-product-showcase__description" style="font-family: var(--wp--preset--font-family--body); font-size: var(--wp--preset--font-size--large); line-height: var(--wp--custom--line-height--relaxed); margin-bottom: var(--wp--preset--spacing--large); color: <?php echo esc_attr($attributes['textColor']); ?>;">
            <?php echo esc_html($attributes['description']); ?>
        </p>
        
        <?php if (function_exists('woocommerce_product_loop')) : ?>
            <div class="wp-block-rawaj-product-showcase__products" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--wp--preset--spacing--medium); margin-bottom: var(--wp--preset--spacing--large);">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $products = new WP_Query($args);
                
                if ($products->have_posts()) :
                    while ($products->have_posts()) : $products->the_post();
                        wc_get_template_part('content', 'product');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        <?php endif; ?>
        
        <div class="wp-block-rawaj-product-showcase__action" style="text-align: center;">
            <a href="<?php echo esc_url($attributes['buttonLink']); ?>" class="wp-block-rawaj-product-showcase__button" style="display: inline-flex; align-items: center; background: <?php echo esc_attr($attributes['accentColor']); ?>; color: var(--wp--preset--color--primary); padding: var(--wp--preset--spacing--small) var(--wp--preset--spacing--medium); border-radius: var(--wp--preset--border-radius--medium); font-family: var(--wp--preset--font-family--body); font-weight: 600; text-decoration: none; transition: background-color 0.2s ease;">
                <?php echo esc_html($attributes['buttonText']); ?>
            </a>
        </div>
    </div>
</div>