# Rawaj Specification System

This directory contains the constitutional and specification framework for the Rawaj project.

## Structure

```
.specify/
├── memory/
│   └── constitution.md          # Authoritative governance document (7 principles + rules)
├── templates/
│   ├── plan-template.md         # Feature plan template (with constitution checks)
│   ├── spec-template.md         # Specification template (requirements + architecture)
│   └── tasks-template.md        # Task breakdown template (with principle tagging)
└── README.md                    # This file
```

## How to Use

### 1. Before Starting a Feature

1. Read `.specify/memory/constitution.md` — understand the 7 core principles
2. Create a feature plan using `.specify/templates/plan-template.md`
3. Use the **Alignment Checklist** to validate against constitution principles

### 2. When Detailing a Feature

1. Create a specification using `.specify/templates/spec-template.md`
2. Document which principles apply to this feature
3. Explain Theme vs. Plugin responsibilities (Golden Rule)

### 3. When Breaking Down Work

1. Use `.specify/templates/tasks-template.md` to organize work
2. Tag tasks with their principle (Principle 2, 3, 7, etc.)
3. Track code hygiene and configuration responsibility

## Key Documents

- **Constitution** (`memory/constitution.md`) — The law. All decisions must align with these 7 principles.
- **Architecture** (`../rawaj-architecture.md`) — The lived experience. This document is the constitution's source material and should reflect its principles.

## Principle Quick Reference

| # | Name | Scope |
|---|------|-------|
| 1 | Golden Rule: Plugin vs. Theme | Architectural boundary |
| 2 | Theme Responsibility | Presentation only |
| 3 | Plugin Responsibility | Business logic + persistence |
| 4 | Configuration Persistence | Plugin stores settings |
| 5 | Distribution Model | Plugin bundled free |
| 6 | Scope Boundaries | v1.0 exclusions (intentional) |
| 7 | Code Hygiene | Namespacing, prefixes, structure |

## Amending the Constitution

To propose a change:

1. File a plan explaining the rationale
2. Validate against all 7 principles
3. Update `constitution.md` with new principle or revision
4. Bump version (`MAJOR.MINOR.PATCH` rules apply)
5. Update dependent templates
6. Add entry to Document History table

---

**Last Updated:** 2026-03-28
**Constitution Version:** 1.0.0
