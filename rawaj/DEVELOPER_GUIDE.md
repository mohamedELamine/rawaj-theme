# Developer Guide: Custom Blocks & Token Usage

Build custom WordPress blocks using Rawaj design tokens.

## Design Tokens Overview

All design values are CSS custom properties (variables) defined in `theme.json`.

### Referencing Tokens

**Format**: `var(--wp--preset--{category}--{name})`

## Color Tokens

### Light Mode Colors

```css
/* Primary (dark gray) */
var(--wp--preset--color--primary)     /* #1a1a1a */

/* Accent (gold) - unchanged in dark mode */
var(--wp--preset--color--accent)      /* #c4a572 */

/* Neutral Colors */
var(--wp--preset--color--bg)          /* #f8f6f3 - light cream background */
var(--wp--preset--color--bg-alt)      /* #faf8f5 - lighter alt background */
var(--wp--preset--color--text)        /* #2a2a2a - dark gray text */
var(--wp--preset--color--text-light)  /* #666666 - light gray text */
var(--wp--preset--color--white)       /* #ffffff - white */
var(--wp--preset--color--border)      /* #e8e6e3 - light border */

/* Semantic Colors */
var(--wp--preset--color--success)     /* #4caf50 - green */
var(--wp--preset--color--error)       /* #f44336 - red */
var(--wp--preset--color--warning)     /* #ff9800 - orange */
var(--wp--preset--color--info)        /* #2196f3 - blue */
```

### Dark Mode Colors

Automatically applied when `@media (prefers-color-scheme: dark)` is active:

```css
var(--wp--preset--color--primary)     /* #ffffff in dark mode */
var(--wp--preset--color--bg)          /* #1a1a1a in dark mode */
var(--wp--preset--color--text)        /* #ffffff in dark mode */
var(--wp--preset--color--success)     /* #81c784 (lighter green) */
var(--wp--preset--color--error)       /* #ef5350 (lighter red) */
var(--wp--preset--color--warning)     /* #ffb74d (lighter orange) */
var(--wp--preset--color--info)        /* #64b5f6 (lighter blue) */
```

**Important**: Accent color (#c4a572) stays the same in both modes for brand consistency.

## Typography Tokens

### Font Families

```css
/* Headings */
var(--wp--preset--font-family--heading)  /* Cairo (sans-serif) - for H1, H2, H3 */

/* Body Text */
var(--wp--preset--font-family--body)     /* Tajawal (sans-serif) - for p, span */
```

### Font Sizes

```css
var(--wp--preset--font-size--extra-small) /* 12px */
var(--wp--preset--font-size--small)       /* 14px */
var(--wp--preset--font-size--medium)      /* 16px */
var(--wp--preset--font-size--large)       /* 18px */
var(--wp--preset--font-size--extra-large) /* 24px */
var(--wp--preset--font-size--2x-large)    /* 28px */
var(--wp--preset--font-size--3x-large)    /* 36px */
var(--wp--preset--font-size--5x-large)    /* 56px */
```

Modular scale ratio: 1.25x

## Spacing Tokens

All spacing is based on a 4px grid:

```css
var(--wp--preset--spacing--extra-small) /* 4px */
var(--wp--preset--spacing--small)       /* 8px */
var(--wp--preset--spacing--medium)      /* 16px */
var(--wp--preset--spacing--large)       /* 24px */
var(--wp--preset--spacing--extra-large) /* 32px */
var(--wp--preset--spacing--2x-large)    /* 48px */
var(--wp--preset--spacing--3x-large)    /* 64px */
```

## Border Radius Tokens

```css
var(--wp--preset--border-radius--none)   /* 0px */
var(--wp--preset--border-radius--small)  /* 4px */
var(--wp--preset--border-radius--medium) /* 8px */
var(--wp--preset--border-radius--large)  /* 12px */
```

## Creating Custom Blocks

### Example 1: Simple Card Block

**File Structure**:
```
blocks/
└── my-card/
    ├── block.json
    ├── render.php
    └── style.css
```

**block.json**:
```json
{
  "apiVersion": 3,
  "name": "rawaj/my-card",
  "title": "My Card",
  "category": "widgets",
  "supports": {
    "html": false,
    "spacing": {
      "padding": true,
      "margin": true
    },
    "color": {
      "background": true,
      "text": true
    }
  },
  "attributes": {
    "title": {
      "type": "string",
      "default": "Card Title"
    },
    "description": {
      "type": "string",
      "default": "Card description"
    }
  },
  "render": "file:./render.php"
}
```

**render.php**:
```php
<?php
// Variables from block attributes
$title = isset($attributes['title']) ? $attributes['title'] : 'Card Title';
$description = isset($attributes['description']) ? $attributes['description'] : 'Card description';

// Token-based styling
$bg_color = 'var(--wp--preset--color--bg-alt)';
$text_color = 'var(--wp--preset--color--text)';
$padding = 'var(--wp--preset--spacing--large)';
$radius = 'var(--wp--preset--border-radius--medium)';
$font_heading = 'var(--wp--preset--font-family--heading)';
$font_body = 'var(--wp--preset--font-family--body)';
?>

<div style="
  background-color: <?php echo esc_attr($bg_color); ?>;
  color: <?php echo esc_attr($text_color); ?>;
  padding: <?php echo esc_attr($padding); ?>;
  border-radius: <?php echo esc_attr($radius); ?>;
">
  <h3 style="
    font-family: <?php echo esc_attr($font_heading); ?>;
    font-size: var(--wp--preset--font-size--extra-large);
    margin: 0 0 var(--wp--preset--spacing--small) 0;
  ">
    <?php echo esc_html($title); ?>
  </h3>
  
  <p style="
    font-family: <?php echo esc_attr($font_body); ?>;
    font-size: var(--wp--preset--font-size--medium);
    margin: 0;
    line-height: 1.6;
  ">
    <?php echo esc_html($description); ?>
  </p>
</div>
```

### Example 2: Button Block with Hover

**render.php**:
```php
<?php
$button_text = isset($attributes['text']) ? $attributes['text'] : 'Click Me';
$button_url = isset($attributes['url']) ? $attributes['url'] : '#';

// Token colors
$bg_color = 'var(--wp--preset--color--accent)';
$text_color = 'var(--wp--preset--color--primary)';
$padding = 'var(--wp--preset--spacing--small) var(--wp--preset--spacing--medium)';
$radius = 'var(--wp--preset--border-radius--medium)';
$font = 'var(--wp--preset--font-family--heading)';
$font_size = 'var(--wp--preset--font-size--large)';
?>

<a href="<?php echo esc_url($button_url); ?>" style="
  display: inline-block;
  background-color: <?php echo esc_attr($bg_color); ?>;
  color: <?php echo esc_attr($text_color); ?>;
  padding: <?php echo esc_attr($padding); ?>;
  border-radius: <?php echo esc_attr($radius); ?>;
  font-family: <?php echo esc_attr($font); ?>;
  font-size: <?php echo esc_attr($font_size); ?>;
  font-weight: 700;
  text-decoration: none;
  transition: background-color 0.3s ease;
">
  <?php echo esc_html($button_text); ?>
</a>
```

**CSS for Hover** (in style.css):
```css
a[data-block="rawaj/my-button"]:hover {
  background-color: #8b7355; /* darker accent for hover */
}
```

### Example 3: Responsive Grid Block

**render.php**:
```php
<?php
$items = isset($attributes['items']) ? $attributes['items'] : [];
$columns_desktop = 3;
$columns_tablet = 2;
$columns_mobile = 1;
$gap = 'var(--wp--preset--spacing--medium)';
$padding = 'var(--wp--preset--spacing--large)';
?>

<div style="
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: <?php echo esc_attr($gap); ?>;
  padding: <?php echo esc_attr($padding); ?>;
">
  <?php foreach ($items as $item): ?>
    <div style="
      background-color: var(--wp--preset--color--bg-alt);
      padding: var(--wp--preset--spacing--medium);
      border-radius: var(--wp--preset--border-radius--medium);
    ">
      <h4 style="
        font-family: var(--wp--preset--font-family--heading);
        font-size: var(--wp--preset--font-size--lg);
        margin: 0 0 var(--wp--preset--spacing--small) 0;
      ">
        <?php echo esc_html($item['title']); ?>
      </h4>
      <p style="
        font-family: var(--wp--preset--font-family--body);
        font-size: var(--wp--preset--font-size--medium);
        margin: 0;
      ">
        <?php echo esc_html($item['description']); ?>
      </p>
    </div>
  <?php endforeach; ?>
</div>
```

## CSS Best Practices

### Always Use Tokens

❌ **Bad** - Hardcoded value:
```css
.my-block {
  background-color: #f8f6f3;
  color: #2a2a2a;
  padding: 24px;
  border-radius: 8px;
}
```

✅ **Good** - Token-based:
```css
.my-block {
  background-color: var(--wp--preset--color--bg);
  color: var(--wp--preset--color--text);
  padding: var(--wp--preset--spacing--large);
  border-radius: var(--wp--preset--border-radius--medium);
}
```

### Dark Mode Support

Tokens automatically update in dark mode. Your CSS works for both modes automatically:

```css
.my-block {
  background-color: var(--wp--preset--color--bg);
  color: var(--wp--preset--color--text);
}

/* In dark mode:
 * --wp--preset--color--bg changes from #f8f6f3 to #1a1a1a
 * --wp--preset--color--text changes from #2a2a2a to #ffffff
 * No additional CSS needed!
 */
```

### RTL Support

Use CSS logical properties instead of directional ones:

❌ **Bad** - LTR-only:
```css
.my-block {
  margin-left: 16px;
  padding-right: 24px;
  text-align: left;
}
```

✅ **Good** - RTL-safe:
```css
.my-block {
  margin-inline-start: 16px;      /* left in LTR, right in RTL */
  padding-inline-end: 24px;       /* right in LTR, left in RTL */
  text-align: start;              /* left in LTR, right in RTL */
}
```

### Responsive Design

Use CSS Grid with `auto-fit` for responsive layouts:

```css
.product-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--wp--preset--spacing--medium);
}

/* Automatically:
 * Mobile (320px): 1 column
 * Tablet (768px): 2 columns
 * Desktop (1200px): 3+ columns
 */
```

## PHP Best Practices

### Always Escape Output

```php
<?php
// ✅ Escape HTML content
echo esc_html($title);
echo esc_attr($url);

// ❌ Never output unescaped
echo $title; // UNSAFE!
?>
```

### Use Token Variables

```php
<?php
$bg = 'var(--wp--preset--color--bg)';
$text = 'var(--wp--preset--color--text)';

// In style attribute
style="background-color: <?php echo esc_attr($bg); ?>;"

// In inline style (safe because we're escaping the var name)
?>
```

## Testing Your Block

### In Site Editor
1. WordPress Admin → Site Editor
2. Select page or pattern
3. Click + → Search for your block name (e.g., "My Card")
4. Add block and configure
5. Verify in preview
6. Save and publish

### Test Light & Dark Modes
1. Add your block to a page
2. Enable dark mode (OS or WordPress)
3. Verify colors update correctly
4. Verify text is readable

### Test Responsiveness
1. DevTools → Toggle device toolbar (Ctrl+Shift+M)
2. Resize to mobile, tablet, desktop
3. Verify layout adapts
4. Verify text readable at all sizes

## Common Patterns

### Hero Section
- Full-width background color (primary or bg-alt)
- White or dark text
- Large heading (3x-large or 4x-large)
- Optional button with accent background

### Card Grid
- Grid with auto-fit columns
- Light background (bg-alt)
- Dark text
- Rounded corners (medium radius)
- Responsive gap (medium spacing)

### Call-to-Action
- Dark primary background
- White text
- Accent-colored button
- Large, prominent heading
- Subheading (smaller text, light opacity)

### Form Block
- Input background (light in light mode, dark #2d2d2d in dark mode)
- Visible borders (light mode: #e8e6e3, dark mode: #444444)
- Focus state with accent color border
- Clear labels and placeholder text

## Troubleshooting

### Block not registering
```php
// Verify in functions.php:
register_block_type( RAWAJ_THEME_DIR . '/blocks/my-block' );
```

### Tokens not working
```
// Verify theme.json has tokens defined
// Verify CSS uses var(--wp--preset--...) format
// Hard refresh browser (Cmd+Shift+R)
```

### Dark mode not working in block
```
// Ensure all colors use token variables
// Don't hardcode colors in PHP or CSS
// Theme automatically handles media query
```

## Resources

- [WordPress Block Documentation](https://developer.wordpress.org/block-editor/)
- [theme.json Reference](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/)
- [CSS Logical Properties](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Logical_Properties)

---

**Updated**: 2026-03-29
**Version**: 1.0
