# Honeymelon Website — Copilot Instructions

## Project Context

This is the marketing website for Honeymelon, a free and open source macOS media converter. The site is a static SPA built with Vue 3, TypeScript, Vite, and Tailwind CSS 4.

## Tech Stack

- **Vue 3.5** with `<script setup>` + TypeScript 5.9
- **Vite 7** for dev server and production builds
- **Tailwind CSS 4** with `tw-animate-css`
- **Vue Router 4** (history mode, lazy-loaded pages)
- **Reka UI** for accessible headless UI primitives
- **Lucide Vue** for icons
- **GoatCounter** for privacy-friendly analytics (no cookies)

## Conventions

- Use `<script setup lang="ts">` for all Vue components.
- Follow existing code conventions — check sibling files for structure and naming.
- Use descriptive, self-documenting names for variables and functions.
- Check for existing components in `src/components/` before creating new ones.
- UI primitives live in `src/components/ui/` (shadcn-vue — do not edit directly).
- Marketing components live in `src/components/marketing/`.
- Page-level components live in `src/pages/`.
- Composables live in `src/composables/` and follow the `use*` naming pattern.
- Use the `@/` alias for imports from `src/`.

## Code Quality

- **Formatting**: Prettier with `prettier-plugin-organize-imports` and `prettier-plugin-tailwindcss`.
- **Linting**: ESLint with `@vue/eslint-config-typescript` and `eslint-config-prettier`.
- **Type checking**: `vue-tsc` — all code must pass `npm run typecheck`.
- Never use `any` unless absolutely necessary.
- Prefer `interface` over `type` for object shapes.

## Key Files

- `src/router.ts` — Routes with lazy imports and scroll behavior.
- `src/layouts/MarketingLayout.vue` — Shared header/footer layout.
- `src/composables/useGitHubRepo.ts` — GitHub API integration (stars, releases, downloads).
- `src/lib/analytics.ts` — GoatCounter event tracking wrapper.
- `src/lib/utils.ts` — `cn()` utility for Tailwind class merging.

## Analytics

Use `trackEvent()` from `@/lib/analytics` for custom events. Available events: `Download`, `Star on GitHub`, `Visit GitHub`, `View Release`. GoatCounter is loaded in `index.html` — the wrapper gracefully no-ops when blocked.

## Deployment

Static SPA — build with `npm run build`, deploy `dist/`. Host must redirect all paths to `index.html` for SPA routing.
