# speckit.constitution
# Rawaj Theme — Governing Principles & Development Guidelines
> Project: Rawaj Theme + Rawaj Companion Plugin
> Brand: Tashkeel
> Version: 1.0.0
> Last updated: 2026-03-28

---

## Purpose

This constitution governs all decisions made in the Rawaj project.
Any spec, implementation, or design choice that conflicts with these principles is invalid until the constitution is updated.

---

## Core Principles

### 1. Arabic-First, Not Arabic-Compatible

RTL is not a feature. It is the foundation.
Every template, pattern, block, and style must be designed in RTL first.
LTR support is a side effect, not a goal.

**Violations:**
- Adding `direction: rtl` as a patch after LTR design
- Using `margin-left` where `margin-inline-start` should be used
- Designing in English and translating to Arabic

---

### 2. FSE is the Only Architecture

No Classic Editor support. No hybrid approach.
`theme.json` is the single source of truth for design tokens.
No hardcoded colors, font sizes, or spacing values in CSS.

**Violations:**
- `add_theme_support('custom-background')` style legacy functions
- Inline styles on block patterns
- CSS variables not derived from `theme.json`

---

### 3. The Golden Rule — Theme Owns Presentation. Plugin Owns Logic.

If a feature survives theme deletion → it belongs in Rawaj Companion Plugin.
If a feature is purely visual → it belongs in the theme.
No exceptions without a constitution amendment.

**Theme owns:**
- Templates (FSE)
- Template Parts
- Block Patterns
- `theme.json`
- Block Style variations
- Static design assets

**Plugin owns:**
- Demo content import
- Advanced settings panel
- Custom blocks (Countdown, Announcement Bar)
- Payment gateway integrations (PayTabs, HyperPay)
- Any `add_shortcode()` or Custom Post Type
- Heavy JavaScript not tied to design

---

### 4. Performance is a Feature

Every addition must justify its weight.

**Rules:**
- No jQuery unless WooCommerce requires it
- No external CSS libraries (Bootstrap, Tailwind, etc.)
- Google Fonts loaded via `theme.json` only, with `display=swap`
- No render-blocking scripts
- Default target: PageSpeed Mobile ≥ 80

---

### 5. Commercial Value Drives Scope

Every feature must answer: *does this help a paying customer succeed faster?*
Features that impress developers but confuse merchants are deprioritized.

**Questions to ask before building:**
- Does this reduce setup time?
- Does this increase perceived quality?
- Does this prevent a support ticket?
- Is this in the top 3 things a new user needs?

---

## Development Standards

### PHP
- Prefix all functions, hooks, and globals: `rawaj_`
- No logic in `functions.php` directly — only file includes
- Escape all output: `esc_html()`, `esc_attr()`, `esc_url()`
- Nonce all forms
- Follow WordPress VIP coding standards

### HTML / Templates
- All FSE templates in `/templates/`
- All template parts in `/parts/`
- Block patterns registered via PHP header in `/patterns/`
- No inline styles in `.html` template files

### CSS
- All design tokens declared in `theme.json`
- Use `clamp()` for fluid typography
- Use logical properties: `margin-inline`, `padding-block`, `inset-inline`
- Never use `float` for layout
- Mobile-first media queries

### JavaScript
- Vanilla JS only in theme scope
- No JS in theme unless it solves a UX problem CSS cannot
- All JS enqueued via `wp_enqueue_script()` with proper dependencies
- Custom blocks JS lives in Rawaj Companion Plugin only

### Naming Conventions
- Template files: `kebab-case.html`
- Pattern files: `kebab-case.php`
- PHP functions: `rawaj_snake_case()`
- CSS custom properties: `--rawaj-property-name`
- Block pattern slugs: `rawaj/pattern-name`

---

## RTL Enforcement Rules

These rules apply to every file without exception:

1. Use CSS logical properties everywhere
2. Icons with directional meaning must be mirrored in RTL
3. Icons without directional meaning (star, heart, close) must NOT be mirrored
4. WooCommerce Checkout fields must render right-to-left
5. All Block Patterns tested in RTL before merge
6. Arabic text must use Cairo (headings) or Tajawal (body) — no system fonts
7. `theme.json` must declare `"direction": "rtl"` in default settings

---

## WooCommerce Rules

- Must support HPOS (High-Performance Order Storage)
- Must support WooCommerce Checkout Block (not legacy shortcode only)
- Cart and Checkout must be RTL-verified on every release
- Mini Cart must open from the right side in RTL
- No WooCommerce template overrides unless absolutely necessary — prefer hooks

---

## Scope Lock — v1.0 Exclusions

These are explicitly out of scope for v1.0:

| Feature | Reason |
|---------|--------|
| WooCommerce Subscriptions | Deferred to v1.1 |
| Multi-vendor marketplace | Different product entirely |
| AJAX product filtering | Defer to FacetWP plugin |
| Booking / Appointments | Wrong niche |
| Elementor / Divi compatibility | Conflicts with FSE-first principle |
| Native Wishlist | YITH Wishlist integration is sufficient |
| Child theme | Not needed with FSE |

---

## Decision Protocol

When a new feature or change is proposed, answer in order:

1. Does it violate any Core Principle? → **Reject**
2. Does it belong in theme or plugin? → **Classify first**
3. Does it serve the merchant buyer? → **Prioritize accordingly**
4. Does it affect RTL? → **Test before merging**
5. Does it affect the performance budget? → **Measure before shipping**

---

## Amendment Process

This constitution can be updated when:
- A new product phase begins
- A market or technical constraint changes
- A principle proves wrong in practice

All amendments must be documented with a reason and date.
Semantic versioning applies:
- **MAJOR** — backward-incompatible principle change (e.g., reversing Theme/Plugin boundary)
- **MINOR** — new principle added or materially expanded
- **PATCH** — clarifications or wording refinements

---

## Amendment Log

| Version | Date | Change |
|---------|------|--------|
| 1.0.0 | 2026-03-28 | Initial constitution — 5 core principles + RTL rules + WooCommerce rules |

---

> This file is the highest-authority document in the Rawaj project.
> When in doubt, refer here first.
> `speckit.constitution.md` — v1.0.0 — 2026-03-28
