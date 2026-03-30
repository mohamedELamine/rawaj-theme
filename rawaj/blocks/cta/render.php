<?php
/**
 * Call-to-Action Block Render
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
    'headline' => isset($attributes['headline']) ? $attributes['headline'] : __('Ready to Get Started?', 'rawaj'),
    'subheadline' => isset($attributes['subheadline']) ? $attributes['subheadline'] : __('Join thousands of satisfied customers and experience premium quality.', 'rawaj'),
    'buttonText' => isset($attributes['buttonText']) ? $attributes['buttonText'] : __('Get Started', 'rawaj'),
    'buttonLink' => isset($attributes['buttonLink']) ? $attributes['buttonLink'] : '/contact/',
    'backgroundColor' => isset($attributes['backgroundColor']) ? $attributes['backgroundColor'] : 'var(--wp--preset--color--primary)',
    'textColor' => isset($attributes['textColor']) ? $attributes['textColor'] : 'var(--wp--preset--color--white)',
    'buttonColor' => isset($attributes['buttonColor']) ? $attributes['buttonColor'] : 'var(--wp--preset--color--accent)',
    'align' => isset($attributes['align']) ? $attributes['align'] : 'center',
);

$blockClass = $original_className;
$alignClass = $original_align ? 'align' . $original_align : '';

$wrapper_attributes = get_block_wrapper_attributes(
    array(
        'class' => "wp-block-rawaj-cta {$blockClass} {$alignClass}",
        'style' => "background-color: {$attributes['backgroundColor']}; color: {$attributes['textColor']}; padding: var(--wp--preset--spacing--2x-large) var(--wp--preset--spacing--large); text-align: {$attributes['align']};",
    )
);
?>
<div <?php echo wp_kses_data($wrapper_attributes); ?>>
    <div class="wp-block-rawaj-cta__content" style="max-width: var(--wp--style--global--content-size); margin-inline: auto;">
        <h2 class="wp-block-rawaj-cta__headline" style="font-family: var(--wp--preset--font-family--heading); font-size: var(--wp--preset--font-size--3x-large); font-weight: 900; margin-bottom: var(--wp--preset--spacing--medium); color: <?php echo esc_attr($attributes['textColor']); ?>; line-height: var(--wp--custom--line-height--tight);">
            <?php echo esc_html($attributes['headline']); ?>
        </h2>
        
        <p class="wp-block-rawaj-cta__subheadline" style="font-family: var(--wp--preset--font-family--body); font-size: var(--wp--preset--font-size--large); line-height: var(--wp--custom--line-height--relaxed); margin-bottom: var(--wp--preset--spacing--large); color: <?php echo esc_attr($attributes['textColor']); ?>; opacity: 0.9;">
            <?php echo esc_html($attributes['subheadline']); ?>
        </p>
        
        <div class="wp-block-rawaj-cta__action">
            <a href="<?php echo esc_url($attributes['buttonLink']); ?>" class="wp-block-rawaj-cta__button wp-element-button" style="display: inline-flex; align-items: center; background: <?php echo esc_attr($attributes['buttonColor']); ?>; color: var(--wp--preset--color--primary); padding: var(--wp--preset--spacing--medium) var(--wp--preset--spacing--large); border-radius: var(--wp--preset--border-radius--medium); font-family: var(--wp--preset--font-family--body); font-size: var(--wp--preset--font-size--medium); font-weight: 600; text-decoration: none; transition: background-color 0.2s ease, transform 0.2s ease;">
                <?php echo esc_html($attributes['buttonText']); ?>
            </a>
        </div>
    </div>
</div>