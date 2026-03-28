<!--
Sync Impact Report
================
Initial Constitution v1.0.0 (2026-03-28)
- This is the inaugural constitution for the Rawaj project
- Principles derived from rawaj-architecture.md and project philosophy
- No prior version to compare against
- All sections initialized
-->

# Rawaj Project Constitution

**Version:** 1.0.0
**Ratification Date:** 2026-03-28
**Last Amended:** 2026-03-28

---

## Purpose

This constitution establishes the governing principles, architectural decisions, and quality standards for the Rawaj project—a premium WordPress e-commerce theme and plugin ecosystem for the Arabic market.

---

## Core Principles

### 1. The Golden Rule: Plugin vs. Theme Separation

**Definition:** A feature belongs in the **Plugin** if the user can delete the theme and switch to another theme without losing functionality. If the feature must stay, it belongs in the **Plugin**; otherwise, it belongs in the **Theme**.

**Rationale:** This principle ensures that Rawaj Theme remains a pure presentation layer while the Rawaj Companion Plugin encapsulates all stateful, reusable business logic. Users must never suffer lock-in to Rawaj Theme due to lost functionality.

---

### 2. Theme Responsibility: Presentation Only

The Rawaj Theme contains **exclusively** presentation and design concerns:

- Full Site Editing (FSE) templates (front-page, shop, product, cart, checkout, account, 404)
- Template Parts (header, footer, mini-cart, product-card)
- Block Patterns (7 Arabic-ready patterns)
- `theme.json` as the single source of truth for colors, fonts, spacing, and Global Styles
- Design-related CSS only
- Block Styles (visual alternatives for blocks)
- Static design assets (`screenshot.png`)

**Rationale:** Theme separation ensures style updates never introduce logic regressions. Designers can iterate on aesthetics without risk of breaking functionality.

---

### 3. Plugin Responsibility: Business Logic and Persistence

The Rawaj Companion Plugin encapsulates all logic that persists independently of the theme:

- Demo Content Import
- Advanced Theme Settings Panel
- Custom Blocks: Countdown (offers), Announcement Bar
- Payment Gateway Integration (PayTabs, HyperPay, and future integrations)
- Inventory and promotion notifications
- Any future Custom Post Types
- Shortcodes (no shortcodes in the theme)
- Heavy JavaScript enqueuing (not tied to theme design)

**Rationale:** Plugin ownership guarantees that business-critical features survive theme switches, updates, and customization. Users' data and functionality are never held hostage by a theme update.

---

### 4. Configuration Management: Theme Settings Persist

All advanced configuration and user settings (beyond Global Styles) are stored and managed by the Companion Plugin, not the theme.

**Rationale:** Users should never lose their configuration when updating the theme. The plugin panel becomes the control center for all non-design decisions.

---

### 5. Distribution Model: Companion Plugin is Bundled Free

The Rawaj Companion Plugin is distributed **free with every theme license** (not sold separately).

**Rationale:** Demo content import and setup are core to the first-run experience. Forcing users to purchase separately would increase friction and reduce adoption without adding value to the theme license.

---

### 6. Intentional Scope Boundaries: v1.0 Exclusions

The following are **explicitly deferred** beyond v1.0 and will not be built initially:

- WooCommerce Subscriptions support (v1.1 consideration)
- Multi-vendor marketplace (out of scope)
- Booking and Appointments (different niche)
- Advanced AJAX Filtering (separate plugin responsibility)
- Native Wishlist (YITH Wishlist integration sufficient)

**Rationale:** These features increase complexity without core value in v1.0. Adding them prematurely would slow iteration and dilute focus on the core e-commerce experience for Arabic storefronts.

---

### 7. Code Hygiene Standards

All code adheres to the following non-negotiable standards:

- `functions.php` loads files only; no inline logic
- All PHP code uses `rawaj_` namespace/prefix for clarity
- No `add_shortcode()` in the theme; shortcodes live in the plugin
- No heavy JavaScript enqueuing in the theme unless tied to design
- `theme.json` is the authoritative source for all design tokens; no hardcoded colors in CSS
- No backwards-compatibility hacks or feature flags for v1.0

**Rationale:** Clear boundaries and explicit naming prevent namespace collisions, accidental coupling, and maintenance debt. Strict adherence to `theme.json` ensures consistent design language.

---

## Governance

### Amendment Procedure

1. **Rationale-driven proposals:** Any amendment must clearly state the principle being added/modified and the business or technical rationale.
2. **Validation:** Amendments are validated against the Golden Rule (Principle 1) to ensure architectural coherence.
3. **Propagation:** Changes to principles trigger reviews of dependent artifacts (templates, tasks, guides).
4. **Version bump:** Semantic versioning applies:
   - **MAJOR:** Backward-incompatible principle removals or redefinitions (e.g., reversing the Plugin/Theme boundary)
   - **MINOR:** New principle added or existing principle materially expanded
   - **PATCH:** Clarifications, wording refinements, or typo fixes

### Compliance Review

- Constitution is reviewed at each major release milestone (v1.0, v1.1, v2.0, etc.).
- Any architectural decision that conflicts with stated principles requires a constitution amendment first.
- Deviations from principles must be logged as intentional exceptions with explicit business justification.

### Version Policy

- Version number is semantic: `MAJOR.MINOR.PATCH`
- Changes are logged at the top of this file with date and summary
- Prior versions are preserved in `.specify/memory/constitution-archive.md` after amendments

---

## Authority

This constitution is the authoritative source for all Rawaj architectural decisions, code organization, and governance. All feature plans, specifications, and implementation tasks must align with these principles before work begins.

---

## Document History

| Version | Date | Change |
|---------|------|--------|
| 1.0.0 | 2026-03-28 | Initial constitution: 7 core principles + governance framework |
