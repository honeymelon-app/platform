# Copilot Instructions: HoneyMelon Website

## Project Overview
Vue 3 + TypeScript + Vite single-page application. Standard Vite template structure with strict TypeScript configuration.

## Tech Stack
- **Framework**: Vue 3.5+ with Composition API
- **Language**: TypeScript 5.9+ (strict mode)
- **Build Tool**: Vite 7.2+
- **Entry Point**: [src/main.ts](../src/main.ts) → [App.vue](../src/App.vue)

## Component Patterns

### Script Setup Syntax (Required)
All Vue components use `<script setup lang="ts">` - never use Options API:

```vue
<script setup lang="ts">
import { ref } from 'vue'

// Props with TypeScript
defineProps<{ msg: string }>()

// Reactive state
const count = ref(0)
</script>
```

See [HelloWorld.vue](../src/components/HelloWorld.vue) for reference implementation.

### Component Structure
- Components live in `src/components/`
- Use scoped CSS: `<style scoped>`
- TypeScript props via `defineProps<T>()`
- Composition API imports from `vue` (ref, computed, etc.)

## TypeScript Configuration
- **Strict mode enabled**: `noUnusedLocals`, `noUnusedParameters`, `noFallthroughCasesInSwitch`
- Split configs: `tsconfig.app.json` (app code) and `tsconfig.node.json` (build tooling)
- Vite types available via `vite/client`

## Development Workflow

```bash
npm run dev      # Start dev server with HMR
npm run build    # Type-check with vue-tsc + production build
npm run preview  # Preview production build locally
```

**Important**: `npm run build` runs TypeScript compilation (`vue-tsc -b`) before Vite build - fix all type errors before building.

## File Organization
```
src/
  main.ts           # App entry point
  App.vue           # Root component
  components/       # Reusable Vue components
  assets/           # Static assets (images, etc.)
  style.css         # Global styles
```

## Key Conventions
- **No default exports for components** - Vue SFC `<script setup>` handles this
- **Composition API only** - no mixins, no Options API
- **TypeScript-first** - leverage strict type checking, avoid `any`
- **HMR-friendly** - changes auto-reload, test frequently during development
