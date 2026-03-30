import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, ColorPicker } from '@wordpress/components';

registerBlockType('rawaj/product-showcase', {
    edit: ({ attributes, setAttributes }) => {
        const {
            title = __('Featured Products', 'rawaj'),
            description = __('Discover our curated selection of premium products.', 'rawaj'),
            buttonText = __('View All Products', 'rawaj'),
            buttonLink = '/shop/',
            backgroundColor = 'var(--wp--preset--color--bg-alt)',
            textColor = 'var(--wp--preset--color--text)',
        } = attributes;

        const blockProps = useBlockProps({
            style: {
                backgroundColor: backgroundColor,
                color: textColor,
                padding: 'var(--wp--preset--spacing--2x-large) var(--wp--preset--spacing--large)',
            }
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Content Settings', 'rawaj')}>
                        <TextControl
                            label={__('Title', 'rawaj')}
                            value={title}
                            onChange={(value) => setAttributes({ title: value })}
                        />
                        <TextControl
                            label={__('Description', 'rawaj')}
                            value={description}
                            onChange={(value) => setAttributes({ description: value })}
                        />
                        <TextControl
                            label={__('Button Text', 'rawaj')}
                            value={buttonText}
                            onChange={(value) => setAttributes({ buttonText: value })}
                        />
                        <TextControl
                            label={__('Button Link', 'rawaj')}
                            value={buttonLink}
                            onChange={(value) => setAttributes({ buttonLink: value })}
                        />
                    </PanelBody>
                    <PanelBody title={__('Color Settings', 'rawaj')}>
                        <ColorPicker
                            label={__('Background Color', 'rawaj')}
                            value={backgroundColor}
                            onChange={(value) => setAttributes({ backgroundColor: value })}
                        />
                        <ColorPicker
                            label={__('Text Color', 'rawaj')}
                            value={textColor}
                            onChange={(value) => setAttributes({ textColor: value })}
                        />
                    </PanelBody>
                </InspectorControls>
                <div {...blockProps}>
                    <div style={{ maxWidth: 'var(--wp--style--global--wide-size)', marginInline: 'auto' }}>
                        <RichText
                            tagName="h2"
                            className="wp-block-rawaj-product-showcase__title"
                            value={title}
                            onChange={(value) => setAttributes({ title: value })}
                            placeholder={__('Enter title...', 'rawaj')}
                            style={{
                                fontFamily: 'var(--wp--preset--font-family--heading)',
                                fontSize: 'var(--wp--preset--font-size--3x-large)',
                                marginBottom: 'var(--wp--preset--spacing--medium)'
                            }}
                        />
                        <RichText
                            tagName="p"
                            className="wp-block-rawaj-product-showcase__description"
                            value={description}
                            onChange={(value) => setAttributes({ description: value })}
                            placeholder={__('Enter description...', 'rawaj')}
                            style={{
                                fontFamily: 'var(--wp--preset--font-family--body)',
                                fontSize: 'var(--wp--preset--font-size--large)',
                                marginBottom: 'var(--wp--preset--spacing--large)'
                            }}
                        />
                        <div className="wp-block-rawaj-product-showcase__products" style={{
                            display: 'grid',
                            gridTemplateColumns: 'repeat(3, 1fr)',
                            gap: 'var(--wp--preset--spacing--medium)',
                            marginBottom: 'var(--wp--preset--spacing--large)',
                            minHeight: '200px',
                            background: 'rgba(196, 165, 114, 0.1)',
                            alignItems: 'center',
                            justifyContent: 'center'
                        }}>
                            <span style={{ color: 'var(--wp--preset--color--text-light)' }}>
                                {__('Product Grid Placeholder', 'rawaj')}
                            </span>
                        </div>
                        <div style={{ textAlign: 'center' }}>
                            <RichText
                                tagName="a"
                                className="wp-block-rawaj-product-showcase__button"
                                value={buttonText}
                                onChange={(value) => setAttributes({ buttonText: value })}
                                placeholder={__('Button text...', 'rawaj')}
                                style={{
                                    display: 'inline-flex',
                                    background: 'var(--wp--preset--color--accent)',
                                    color: 'var(--wp--preset--color--primary)',
                                    padding: 'var(--wp--preset--spacing--small) var(--wp--preset--spacing--medium)',
                                    borderRadius: 'var(--wp--preset--border-radius--medium)',
                                    textDecoration: 'none'
                                }}
                            />
                        </div>
                    </div>
                </div>
            </>
        );
    },
    save: () => null,
});