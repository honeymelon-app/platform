# Honeymelon Website

Marketing website for [Honeymelon](https://honeymelon.app) — the free and open source macOS media converter for Apple Silicon.

## Tech Stack

- **Framework**: [Vue 3](https://vuejs.org/) with `<script setup>` SFCs
- **Language**: [TypeScript](https://www.typescriptlang.org/) 5.9
- **Build Tool**: [Vite](https://vite.dev/) 7
- **Styling**: [Tailwind CSS](https://tailwindcss.com/) 4
- **Router**: [Vue Router](https://router.vuejs.org/) 4
- **UI Primitives**: [Reka UI](https://reka-ui.com/)
- **Icons**: [Lucide Vue](https://lucide.dev/)
- **Analytics**: [GoatCounter](https://www.goatcounter.com/) (privacy-friendly, no cookies)

## Project Structure

```text
web/
├── index.html                  # Entry point + GoatCounter script
├── public/                     # Static assets (favicon, images)
├── src/
│   ├── main.ts                 # App bootstrap
│   ├── App.vue                 # Root component (layout + RouterView)
│   ├── router.ts               # Routes: /, /privacy, /terms
│   ├── style.css               # Tailwind imports + custom styles
│   ├── assets/                 # Images and static resources
│   ├── components/
│   │   ├── marketing/          # Landing page sections + shared components
│   │   │   ├── sections/       # Hero, Features, Download, FAQ, etc.
│   │   │   ├── GitHubStarButton.vue
│   │   │   ├── AnimatedSection.vue
│   │   │   └── ContentSection.vue
│   │   └── ui/                 # shadcn-vue primitives (Button, Sheet, etc.)
│   ├── composables/
│   │   └── useGitHubRepo.ts    # GitHub API: stars, releases, download URL
│   ├── layouts/
│   │   └── MarketingLayout.vue # Header + footer shell
│   ├── lib/
│   │   ├── analytics.ts        # GoatCounter event tracking wrapper
│   │   └── utils.ts            # cn() and shared utilities
│   ├── pages/
│   │   ├── HomePage.vue        # Landing page (all marketing sections)
│   │   ├── PrivacyPage.vue     # Privacy policy
│   │   └── TermsPage.vue       # Terms of use
│   └── locales/                # (reserved for i18n)
└── dist/                       # Build output
```

## Getting Started

```bash
# Install dependencies
npm install

# Start dev server
npm run dev

# Type-check and build for production
npm run build

# Preview production build locally
npm run preview
```

## Scripts

| Command             | Description                          |
| ------------------- | ------------------------------------ |
| `npm run dev`       | Start Vite dev server with HMR       |
| `npm run build`     | Type-check with `vue-tsc` then build |
| `npm run preview`   | Preview production build locally     |
| `npm run lint`      | Lint with ESLint and auto-fix        |
| `npm run format`    | Format with Prettier                 |
| `npm run typecheck` | Run `vue-tsc` type checking          |

## Analytics

This site uses [GoatCounter](https://www.goatcounter.com/) for privacy-friendly analytics:

- **No cookies**, no personal data collection
- **GDPR/CCPA compliant** by default
- Dashboard: [honeymelon.goatcounter.com](https://honeymelon.goatcounter.com)

Custom events tracked:

| Event            | Trigger                         |
| ---------------- | ------------------------------- |
| Page views       | Automatic (every navigation)    |
| `Download`       | Click on download button        |
| `Star on GitHub` | Click on any GitHub star button |
| `Visit GitHub`   | Click "View on GitHub" CTA      |

## Deployment

The site is a static SPA. Build and deploy `dist/` to any static host:

```bash
npm run build
# Deploy dist/ to Cloudflare Pages, Vercel, Netlify, GitHub Pages, etc.
```

For SPA routing (`/privacy`, `/terms`), configure your host to redirect all paths to `index.html`.

## License

This website is part of the [Honeymelon](https://github.com/honeymelon-app/honeymelon) project, released under the [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.html).
