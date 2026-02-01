<script setup lang="ts">
import ComparisonSection from '@/components/marketing/sections/ComparisonSection.vue';
import CtaSection from '@/components/marketing/sections/CtaSection.vue';
import DownloadSection from '@/components/marketing/sections/DownloadSection.vue';
import FaqSection from '@/components/marketing/sections/FaqSection.vue';
import FeaturesSection from '@/components/marketing/sections/FeaturesSection.vue';
import HeroSection from '@/components/marketing/sections/HeroSection.vue';
import HowItWorksSection from '@/components/marketing/sections/HowItWorksSection.vue';
import InterfaceSection from '@/components/marketing/sections/InterfaceSection.vue';
import PricingSection from '@/components/marketing/sections/PricingSection.vue';
import ProofSection from '@/components/marketing/sections/ProofSection.vue';
import {
    generateFaqSchema,
    generateOrganizationSchema,
    generateSoftwareApplicationSchema,
    useSeoMeta,
} from '@/composables';
import MarketingLayout from '@/layouts/MarketingLayout.vue';
import type { Artifact, Product } from '@/types/api';
import { Head, usePage } from '@inertiajs/vue3';
import { computed, nextTick, onMounted, onUnmounted } from 'vue';

interface Faq {
    question: string;
    answer: string;
}

const props = defineProps<{
    artifact?: Artifact | null;
    product?: Product | null;
    faqs?: Faq[];
}>();

const page = usePage();
const appUrl = computed(() => (page.props.appUrl as string) || '');

// Use FAQs from props or fallback to empty array
const faqs = computed(() => props.faqs || []);

// Open source: no price data for structured data
const priceData = computed(() => undefined);

// Generate JSON-LD structured data
const jsonLdSchemas = computed(() => {
    const schemas = [];

    // SoftwareApplication schema
    schemas.push(
        generateSoftwareApplicationSchema({
            name: 'Honeymelon',
            description:
                'Native macOS media converter for Apple Silicon. Free and open source. Convert video, audio, and images offline with remux-first intelligence.',
            operatingSystem: 'macOS',
            applicationCategory: 'MultimediaApplication',
            url: appUrl.value,
            image: `${appUrl.value}/images/og-image.png`,
            offers: priceData.value,
        }),
    );

    // Organization schema
    schemas.push(
        generateOrganizationSchema({
            name: 'Honeymelon',
            url: appUrl.value,
            logo: `${appUrl.value}/images/logo.png`,
        }),
    );

    // FAQ schema
    schemas.push(generateFaqSchema(faqs.value));

    return schemas;
});

// SEO meta configuration
const { headTags, jsonLdScript } = useSeoMeta({
    title: 'Honeymelon – Smart Media Converter for macOS',
    description:
        'Native macOS media converter for Apple Silicon. Free and open source. Convert video, audio, and images with remux-first intelligence. No subscriptions, files stay local.',
    canonical: '/',
    ogImage: '/images/og-image.png',
    jsonLd: jsonLdSchemas,
});

// Valid section IDs for scrollTo
const validSectionIds = [
    'hero',
    'proof',
    'features',
    'how-it-works',
    'interface',
    'pricing',
    'download',
    'comparison',
    'faq',
    'cta',
];

// Inject JSON-LD script into document head
onMounted(() => {
    const script = document.createElement('script');
    script.type = 'application/ld+json';
    script.textContent = jsonLdScript.value;
    script.id = 'json-ld-schema';
    document.head.appendChild(script);

    // Handle scrollTo query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const scrollTo = urlParams.get('scrollTo');

    if (scrollTo && validSectionIds.includes(scrollTo)) {
        nextTick(() => {
            const element = document.getElementById(scrollTo);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    }
});

// Clean up on unmount
onUnmounted(() => {
    const script = document.getElementById('json-ld-schema');
    if (script) {
        document.head.removeChild(script);
    }
});
</script>

<template>
    <Head>
        <title>{{ headTags.title }}</title>
        <meta name="description" :content="headTags.description" />
        <link rel="canonical" :href="headTags.canonical" />
        <meta name="robots" :content="headTags.robots" />

        <!-- OpenGraph -->
        <meta property="og:title" :content="headTags.ogTitle" />
        <meta property="og:description" :content="headTags.ogDescription" />
        <meta property="og:image" :content="headTags.ogImage" />
        <meta property="og:url" :content="headTags.ogUrl" />
        <meta property="og:type" :content="headTags.ogType" />
        <meta property="og:site_name" :content="headTags.ogSiteName" />

        <!-- Twitter Card -->
        <meta name="twitter:card" :content="headTags.twitterCard" />
        <meta name="twitter:title" :content="headTags.twitterTitle" />
        <meta
            name="twitter:description"
            :content="headTags.twitterDescription"
        />
        <meta name="twitter:image" :content="headTags.twitterImage" />
    </Head>

    <MarketingLayout>
        <!-- 1. Hero -->
        <HeroSection />

        <!-- 2. Proof / Why it's different -->
        <ProofSection />

        <!-- 3. Features (grouped) -->
        <FeaturesSection />

        <!-- 4. How it works -->
        <HowItWorksSection />

        <!-- 5. Interface showcase -->
        <InterfaceSection />

        <!-- 6. Pricing -->
        <PricingSection :product="product" />

        <!-- 7. Download -->
        <DownloadSection :artifact="artifact" />

        <!-- 8. Comparison -->
        <ComparisonSection />

        <!-- 9. FAQ -->
        <FaqSection :faqs="faqs" />

        <!-- 10. Final CTA -->
        <CtaSection />
    </MarketingLayout>
</template>
