import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('@/pages/HomePage.vue'),
            meta: { title: 'Honeymelon – Smart Media Converter for macOS' },
        },
        {
            path: '/privacy',
            name: 'privacy',
            component: () => import('@/pages/PrivacyPage.vue'),
            meta: { title: 'Privacy Policy – Honeymelon' },
        },
        {
            path: '/terms',
            name: 'terms',
            component: () => import('@/pages/TermsPage.vue'),
            meta: { title: 'Terms of Use – Honeymelon' },
        },
    ],
    scrollBehavior(to, _from, savedPosition) {
        if (savedPosition) return savedPosition;
        if (to.hash) return { el: to.hash, behavior: 'smooth' };
        return { top: 0 };
    },
});

router.afterEach((to) => {
    const title = to.meta.title as string | undefined;
    if (title) document.title = title;
});

export default router;
