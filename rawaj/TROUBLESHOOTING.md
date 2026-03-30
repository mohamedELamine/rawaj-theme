# Troubleshooting Guide

Common issues and solutions for the Rawaj WordPress theme.

## Fonts Not Loading

### Symptoms
- Headings appear in fallback sans-serif (not Cairo serif)
- Body text appears in system font (not Tajawal)
- Text appears thin or blocky

### Diagnosis
1. Open WordPress Admin → Appearance → Global Styles
2. Go to Typography → Font Families
3. Check Cairo and Tajawal are listed

### Solutions

**Solution 1: Hard Refresh Browser**
```
macOS: Cmd + Shift + R
Windows/Linux: Ctrl + Shift + R
```
This clears cached fonts and forces reload.

**Solution 2: Check Google Fonts API**
```
1. Open browser DevTools (F12)
2. Go to Network tab
3. Look for requests to "googleapis.com"
4. If blocked, check firewall/proxy settings
```

**Solution 3: Verify functions.php**
```
WordPress Admin → Appearance → Theme File Editor
→ functions.php
Look for: wp_enqueue_style( 'google-fonts', ... )

If missing, reinstall theme
```

**Solution 4: Clear WordPress Cache**
```
If using cache plugin:
1. WordPress Admin → [Cache Plugin] → Clear Cache
2. Or disable cache plugin temporarily
3. Hard refresh browser
```

**Solution 5: Check Theme Version**
```
WordPress Admin → Appearance → Themes → Rawaj
Verify version is 1.0 or higher
```

---

## Colors Not Displaying Correctly

### Symptoms
- Background color wrong (expected #f8f6f3 but see different)
- Text color not readable (contrast issue)
- Accent color not appearing on buttons

### Diagnosis
1. WordPress Admin → Appearance → Global Styles → Colors
2. Verify color values match expected palette:
   - Primary: #1a1a1a
   - Accent: #c4a572
   - Background: #f8f6f3
   - Text: #2a2a2a

### Solutions

**Solution 1: Reset to Defaults**
```
WordPress Admin → Appearance → Global Styles
→ Reset → Reset colors to defaults
```

**Solution 2: Check theme.json Syntax**
```bash
# From command line (requires SSH access)
jsonlint /path/to/theme.json

# If error, restore from backup or reinstall theme
```

**Solution 3: Clear CSS Cache**
```
Some cache plugins cache CSS incorrectly.

1. Disable cache plugin temporarily
2. Hard refresh browser (Cmd+Shift+R)
3. Test if colors appear correctly
4. Re-enable cache plugin
```

**Solution 4: Check Global Styles Custom Colors**
```
WordPress Admin → Appearance → Global Styles → Colors
→ Look for custom color overrides
→ Reset any overrides to defaults
```

**Solution 5: Browser DevTools Inspector**
```
1. F12 to open DevTools
2. Right-click element → Inspect
3. Look for color in Styles panel
4. Verify it's using CSS custom property (--wp--preset--color-...)
5. Check computed color value
```

---

## Dark Mode Not Working

### Symptoms
- Dark mode toggle has no effect
- Theme stays in light mode regardless of OS setting
- DevTools emulation doesn't change theme

### Diagnosis
1. Check OS setting:
   - macOS: System Preferences → General → Appearance
   - Windows: Settings → System → Display → Color mode
   - Or verify in WordPress Global Styles

### Solutions

**Solution 1: Toggle Dark Mode Manually**
```
WordPress Admin → Appearance → Global Styles
→ Look for theme toggle or color scheme selector
→ Toggle from Light to Dark
→ Hard refresh browser
```

**Solution 2: Update OS Setting**
```
macOS:
1. Apple menu → System Preferences → General
2. Under Appearance, select Dark
3. Return to browser, refresh (Cmd+Shift+R)
4. Theme should auto-switch to dark mode

Windows:
1. Settings → System → Display
2. Under Color mode, select Dark
3. Return to browser, refresh (Ctrl+Shift+R)
4. Theme should auto-switch
```

**Solution 3: Test with DevTools Emulation**
```
Browser DevTools:
1. F12 to open DevTools
2. Click ⋮ (menu) → More Tools → Rendering
3. Scroll to "Emulate CSS media feature prefers-color-scheme"
4. Select "dark"
5. Page should show dark mode immediately

If it works here but not in OS setting:
→ Problem is with CSS media query detection
→ Check theme.json for media query definition
→ Or reinstall theme
```

**Solution 4: Check CSS Media Query**
```
DevTools → Elements/Inspector
Look for style tag with:
@media (prefers-color-scheme: dark) {
  --wp--preset--color--primary: #ffffff;
  --wp--preset--color--bg: #1a1a1a;
  ...
}

If missing, reinstall theme
```

**Solution 5: Clear Cache and Cookies**
```
1. Chrome/Edge: Settings → Privacy → Clear browsing data
   Select "Cookies and cached images"
2. Firefox: Preferences → Privacy → Clear Data
3. Hard refresh (Ctrl+Shift+R)
```

---

## RTL (Right-to-Left) Layout Broken

### Symptoms
- Content flows left-to-right instead of right-to-left
- Images on wrong side
- Form labels on wrong side
- Navigation not reversed

### Diagnosis
1. WordPress Admin → Settings → General → Site Language
2. Verify language is set to "العربية" (Arabic)
3. Check theme is using CSS logical properties

### Solutions

**Solution 1: Set Language to Arabic**
```
WordPress Admin → Settings → General
→ Site Language: Select العربية (Arabic)
→ Save Changes
→ Hard refresh browser (Cmd+Shift+R)
```

**Solution 2: Clear Cache After Language Change**
```
Some cache plugins don't invalidate properly.

1. Disable cache plugin
2. Hard refresh (Cmd+Shift+R)
3. Verify RTL layout is correct
4. Re-enable cache plugin
```

**Solution 3: Verify CSS Logical Properties**
```
Browser DevTools → Inspect → Styles
Look for:
- margin-inline (instead of margin-left/right)
- padding-block (instead of padding-top/bottom)
- start/end values (instead of left/right)

If using left/right, theme needs update
```

**Solution 4: Test with Arabic Content**
```
1. Create test post with Arabic text
2. Add some blocks (image, button, form)
3. Verify all flow RTL:
   - Text right-aligned
   - Images right-aligned
   - Labels on right side
```

**Solution 5: Disable RTL Checking (Temporary)**
```
If RTL doesn't matter for your use case:
1. Set language to English
2. RTL layout will be LTR
3. Add Arabic content anyway (styling won't affect text direction)
```

---

## Form Inputs Not Styled Properly

### Symptoms
- Input fields hard to see (low contrast)
- Dark mode inputs not visible (too light)
- Focus state not visible

### Diagnosis
1. Enable dark mode (OS or WordPress)
2. Navigate to cart or checkout page
3. Click on form input
4. Note if it's visible and has focus outline

### Solutions

**Solution 1: Light Mode Fix**
```
Expected: Light gray background (#f5f5f5), dark text
If different:
1. Check browser DevTools → Inspect input
2. Verify style.css has input styling
3. Hard refresh browser
4. Reinstall theme if issue persists
```

**Solution 2: Dark Mode Fix**
```
Expected: Dark gray background (#2d2d2d), white text
If different:
1. Verify dark mode is enabled
2. Hard refresh (Cmd+Shift+R)
3. Check DevTools → Inspect input
4. Look for @media (prefers-color-scheme: dark) styles
```

**Solution 3: Focus State Missing**
```
When clicking input, should see:
- Color border (accent #c4a572)
- Or outline

If not visible:
1. Check for focus-visible or :focus CSS
2. Open DevTools → Inspect input
3. Simulate :focus state
4. Verify style is applied
```

**Solution 4: Placeholder Text Hard to Read**
```
If placeholder (gray text in input) hard to see:
1. DevTools → Inspect input
2. Check ::placeholder color
3. Should be readable (medium gray)
4. Not too light
```

---

## Buttons Not Responsive or Clickable

### Symptoms
- Button appears but doesn't respond to clicks
- Button size wrong on mobile
- Button text overflows

### Diagnosis
1. Open Site Editor → Find button block
2. Click button in editor preview
3. Try clicking in frontend

### Solutions

**Solution 1: Check Button Link**
```
Site Editor:
1. Select button block
2. Check block settings (right sidebar)
3. Verify Button Link is set
4. Verify link URL is correct
5. Save and publish
```

**Solution 2: Mobile Button Size**
```
Site Editor:
1. Select button block
2. Check Spacing settings
3. Verify padding is set (not zero)
4. Check font size responsive
5. View on mobile device (320px+)
```

**Solution 3: Button Text Overflow**
```
If button text wraps or overflows:
1. Site Editor → Select button
2. Reduce text length or button width
3. Check Typography → Font Size
4. Verify padding allows for text
```

**Solution 4: Clear JavaScript Cache**
```
If buttons don't respond (JavaScript issue):
1. Hard refresh (Cmd+Shift+R)
2. Disable browser extensions
3. Try in incognito/private mode
4. Check browser console for errors (F12)
```

---

## Spacing or Padding Wrong

### Symptoms
- Content too cramped (no breathing room)
- Elements too far apart
- Inconsistent padding between sections

### Diagnosis
1. WordPress Admin → Appearance → Global Styles → Layout
2. Check spacing tokens (4px, 8px, 16px, 24px, 32px, 48px, 64px)
3. Inspect page with DevTools

### Solutions

**Solution 1: Reset Spacing to Defaults**
```
WordPress Admin → Global Styles
→ Reset all → Reset spacing to defaults
```

**Solution 2: Adjust Custom Spacing**
```
If you customized spacing:
1. Global Styles → Spacing
2. Verify values are proportional
3. Use multiples of 4px
4. Save and refresh
```

**Solution 3: Check Block-Level Spacing**
```
For specific blocks:
1. Site Editor → Select block
2. Right sidebar → Spacing → Padding/Margin
3. Verify values look reasonable
4. Not 0 (cramped) or 100px (too much)
```

---

## General Performance Issues

### Symptoms
- Page loads slowly
- Fonts take long to load
- Images not optimized

### Solutions

**Solution 1: Font Optimization**
```
1. Verify preconnect is working:
   DevTools → Network → Filter "googleapis"
   Should see immediate connection
2. Use system fonts if Google Fonts blocked
3. Check font file size (should be <50KB combined)
```

**Solution 2: Image Optimization**
```
1. Images should be lazy-loaded
2. Use appropriate sizes (not 4000px for 400px display)
3. Use WebP if possible
4. Compress JPEG/PNG
```

**Solution 3: Cache Plugin Settings**
```
1. Cache CSS/JS but not dynamic content
2. Exclude pages with forms
3. Set reasonable TTL (1 hour)
4. Purge cache after content updates
```

**Solution 4: Run Lighthouse Audit**
```
DevTools → Lighthouse
→ Select Performance category
→ Run audit
→ Review recommendations
```

---

## Still Having Issues?

1. **Check logs**: WordPress Admin → Tools → Site Health → Debug
2. **Review error.log**: WordPress installation `/wp-content/debug.log`
3. **Test in safe mode**: Deactivate plugins except Rawaj theme
4. **Reinstall theme**: May fix corrupted theme files
5. **Contact support**: Document error messages and steps to reproduce

---

**Updated**: 2026-03-29
**Version**: 1.0
