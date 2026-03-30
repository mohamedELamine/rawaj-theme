import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, ColorPicker, SelectControl } from '@wordpress/components';

registerBlockType('rawaj/cta', {
    edit: ({ attributes, setAttributes }) => {
        const {
            headline = __('Ready to Get Started?', 'rawaj'),
            subheadline = __('Join thousands of satisfied customers and experience premium quality.', 'rawaj'),
            buttonText = __('Get Started', 'rawaj'),
            buttonLink = '/contact/',
            backgroundColor = 'var(--wp--preset--color--primary)',
            textColor = 'var(--wp--preset--color--white)',
            buttonColor = 'var(--wp--preset--color--accent)',
            align = 'center',
        } = attributes;

        const blockProps = useBlockProps({
            style: {
                backgroundColor: backgroundColor,
                color: textColor,
                padding: 'var(--wp--preset--spacing--2x-large) var(--wp--preset--spacing--large)',
                textAlign: align,
            }
        });

        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Content Settings', 'rawaj')}>
                        <TextControl
                            label={__('Headline', 'rawaj')}
                            value={headline}
                            onChange={(value) => setAttributes({ headline: value })}
                        />
                        <TextControl
                            label={__('Subheadline', 'rawaj')}
                            value={subheadline}
                            onChange={(value) => setAttributes({ subheadline: value })}
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
                    <PanelBody title={__('Style Settings', 'rawaj')}>
                        <SelectControl
                            label={__('Alignment', 'rawaj')}
                            value={align}
                            options={[
                                { label: __('Left', 'rawaj'), value: 'left' },
                                { label: __('Center', 'rawaj'), value: 'center' },
                                { label: __('Right', 'rawaj'), value: 'right' },
                            ]}
                            onChange={(value) => setAttributes({ align: value })}
                        />
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
                        <ColorPicker
                            label={__('Button Color', 'rawaj')}
                            value={buttonColor}
                            onChange={(value) => setAttributes({ buttonColor: value })}
                        />
                    </PanelBody>
                </InspectorControls>
                <div {...blockProps}>
                    <div style={{ maxWidth: 'var(--wp--style--global--content-size)', marginInline: 'auto' }}>
                        <RichText
                            tagName="h2"
                            className="wp-block-rawaj-cta__headline"
                            value={headline}
                            onChange={(value) => setAttributes({ headline: value })}
                            placeholder={__('Enter headline...', 'rawaj')}
                            style={{
                                fontFamily: 'var(--wp--preset--font-family--heading)',
                                fontSize: 'var(--wp--preset--font-size--3x-large)',
                                marginBottom: 'var(--wp--preset--spacing--medium)'
                            }}
                        />
                        <RichText
                            tagName="p"
                            className="wp-block-rawaj-cta__subheadline"
                            value={subheadline}
                            onChange={(value) => setAttributes({ subheadline: value })}
                            placeholder={__('Enter subheadline...', 'rawaj')}
                            style={{
                                fontFamily: 'var(--wp--preset--font-family--body)',
                                fontSize: 'var(--wp--preset--font-size--large)',
                                marginBottom: 'var(--wp--preset--spacing--large)'
                            }}
                        />
                        <RichText
                            tagName="a"
                            className="wp-block-rawaj-cta__button wp-element-button"
                            value={buttonText}
                            onChange={(value) => setAttributes({ buttonText: value })}
                            placeholder={__('Button text...', 'rawaj')}
                            style={{
                                display: 'inline-flex',
                                background: buttonColor,
                                color: 'var(--wp--preset--color--primary)',
                                padding: 'var(--wp--preset--spacing--medium) var(--wp--preset--spacing--large)',
                                borderRadius: 'var(--wp--preset--border-radius--medium)',
                                textDecoration: 'none'
                            }}
                        />
                    </div>
                </div>
            </>
        );
    },
    save: () => null,
});