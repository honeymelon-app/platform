<script setup lang="ts">
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';
import GitHubStarButton from '@/components/marketing/GitHubStarButton.vue';
import Button from '@/components/ui/button/Button.vue';
import { trackEvent } from '@/lib/analytics';
import { ArrowRight, Check, ExternalLink } from 'lucide-vue-next';

const highlights = [
    'Free forever — no license keys, no activation',
    'GPLv3 licensed — your freedom guaranteed',
    'Privacy-first, zero data collection',
    'Fully offline — no telemetry or phone-home',
    'Native Apple Silicon performance',
    'Community-driven development',
];
</script>

<template>
    <section id="open-source" class="py-24 sm:py-32">
        <div class="mx-auto max-w-xl px-4 sm:px-6 lg:px-8">
            <AnimatedSection>
                <div class="text-center">
                    <h2
                        class="text-foreground text-3xl font-semibold tracking-tight sm:text-4xl"
                    >
                        Free &amp; Open Source
                    </h2>
                    <p class="text-muted-foreground mt-4 text-lg">
                        No subscriptions. No license keys. No strings attached.
                    </p>
                </div>
            </AnimatedSection>

            <AnimatedSection :delay="100">
                <div
                    class="border-border bg-background mt-12 rounded-3xl border p-8 sm:p-10"
                >
                    <div class="text-center">
                        <h3 class="text-foreground text-xl font-semibold">
                            Honeymelon
                        </h3>
                        <div
                            class="mt-6 flex items-baseline justify-center gap-2"
                        >
                            <span
                                class="text-foreground text-6xl font-semibold tracking-tight"
                            >
                                $0
                            </span>
                            <span class="text-muted-foreground text-lg"
                                >forever</span
                            >
                        </div>
                        <p class="text-muted-foreground mt-2 text-sm">
                            Open source · GPLv3 licensed
                        </p>
                    </div>

                    <ul class="mt-10 space-y-4">
                        <li
                            v-for="highlight in highlights"
                            :key="highlight"
                            class="flex items-start gap-3"
                        >
                            <Check
                                class="text-primary mt-0.5 h-5 w-5 shrink-0"
                            />
                            <span class="text-muted-foreground">{{
                                highlight
                            }}</span>
                        </li>
                    </ul>

                    <div class="mt-10 flex flex-col gap-3">
                        <Button
                            as-child
                            size="lg"
                            class="h-12 w-full text-base"
                        >
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
                            <a
                                href="https://github.com/honeymelon-app/honeymelon"
                                target="_blank"
                                rel="noopener noreferrer"
                                @click="trackEvent('Visit GitHub')"
                            >
                                View on GitHub
                                <ExternalLink class="ml-2 h-4 w-4" />
                            </a>
                        </Button>

                        <div class="mt-2 flex items-center justify-center">
                            <GitHubStarButton size="sm" variant="ghost" />
                        </div>
                    </div>
                </div>
            </AnimatedSection>
        </div>
    </section>
</template>
