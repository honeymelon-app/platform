<script setup lang="ts">
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';
import Button from '@/components/ui/button/Button.vue';
import type { Product } from '@/types/api';
import { ArrowRight, Check, Github } from 'lucide-vue-next';

defineProps<{
    product?: Product | null;
}>();

const repositoryUrl = 'https://github.com/honeymelon-app/honeymelon';

const features = [
    'Free and open-source — no license keys required',
    'Full feature set with unlimited conversions',
    'Community-driven roadmap and contributions welcome',
    'Privacy-first, zero data collection',
    'Native Apple Silicon performance',
    'Transparent development on GitHub',
];
</script>

<template>
    <section id="pricing" class="py-24 sm:py-32">
        <div class="mx-auto max-w-xl px-4 sm:px-6 lg:px-8">
            <AnimatedSection>
                <div class="text-center">
                    <h2
                        class="text-3xl font-semibold tracking-tight text-foreground sm:text-4xl"
                    >
                        Free & Open Source
                    </h2>
                    <p class="mt-4 text-lg text-muted-foreground">
                        Honeymelon is now completely free to use, with source
                        code available to the community.
                    </p>
                </div>
            </AnimatedSection>

            <AnimatedSection :delay="100">
                <div
                    class="mt-12 rounded-3xl border border-border bg-background p-8 sm:p-10"
                >
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-foreground">
                            {{ product?.name ?? 'Honeymelon' }} for macOS
                        </h3>
                        <div
                            class="mt-6 flex items-baseline justify-center gap-2"
                        >
                            <span
                                class="text-6xl font-semibold tracking-tight text-foreground"
                            >
                                Free
                            </span>
                            <span class="text-lg text-muted-foreground">
                                Open Source
                            </span>
                        </div>
                        <p class="mt-2 text-sm text-muted-foreground">
                            No subscriptions · No activation · No payments
                        </p>
                    </div>

                    <ul class="mt-10 space-y-4">
                        <li
                            v-for="feature in features"
                            :key="feature"
                            class="flex items-start gap-3"
                        >
                            <Check
                                class="mt-0.5 h-5 w-5 shrink-0 text-primary"
                            />
                            <span class="text-muted-foreground">{{
                                feature
                            }}</span>
                        </li>
                    </ul>

                    <div class="mt-10 space-y-3">
                        <Button as-child size="lg" class="h-12 w-full text-base">
                            <a href="#download">
                                Download for macOS
                                <ArrowRight class="ml-2 h-4 w-4" />
                            </a>
                        </Button>
                        <Button
                            as-child
                            variant="outline"
                            size="lg"
                            class="h-12 w-full text-base"
                        >
                            <a :href="repositoryUrl" target="_blank">
                                <Github class="mr-2 h-4 w-4" />
                                View the source on GitHub
                            </a>
                        </Button>
                        <p class="text-center text-sm text-muted-foreground/70">
                            Licensed for free use. Contributions are welcome.
                        </p>
                    </div>
                </div>
            </AnimatedSection>
        </div>
    </section>
</template>
