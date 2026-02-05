<script setup lang="ts">
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';
import { Check, X } from 'lucide-vue-next';

const comparisonFeatures = [
    { feature: 'Free & open source', us: true, them: false },
    { feature: 'Works fully offline', us: true, them: false },
    { feature: 'No data collection', us: true, them: false },
    { feature: 'Native Apple Silicon', us: true, them: false },
    { feature: 'Source code available', us: true, them: false },
];
</script>

<template>
    <section id="comparison" class="py-24 sm:py-32">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <AnimatedSection>
                <div class="text-center">
                    <h2
                        class="text-foreground text-3xl font-semibold tracking-tight sm:text-4xl"
                    >
                        The Honeymelon Difference
                    </h2>
                    <p class="text-muted-foreground mt-4 text-lg">
                        How we compare to closed-source, subscription-based
                        alternatives.
                    </p>
                </div>
            </AnimatedSection>

            <AnimatedSection :delay="100">
                <div
                    class="border-border/50 bg-background mt-12 overflow-hidden rounded-2xl border"
                >
                    <table class="w-full">
                        <thead>
                            <tr class="border-border/50 border-b">
                                <th
                                    class="text-muted-foreground px-6 py-4 text-left text-sm font-medium"
                                >
                                    Feature
                                </th>
                                <th
                                    class="text-foreground px-6 py-4 text-center text-sm font-semibold"
                                >
                                    Honeymelon
                                </th>
                                <th
                                    class="text-muted-foreground px-6 py-4 text-center text-sm font-medium"
                                >
                                    Others
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(item, index) in comparisonFeatures"
                                :key="item.feature"
                                :class="
                                    index !== comparisonFeatures.length - 1
                                        ? 'border-border/50 border-b'
                                        : ''
                                "
                            >
                                <td class="text-foreground px-6 py-4 text-sm">
                                    {{ item.feature }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <div
                                            v-if="item.us"
                                            class="bg-primary/10 flex h-6 w-6 items-center justify-center rounded-full"
                                        >
                                            <Check
                                                class="text-primary h-4 w-4"
                                                :stroke-width="2.5"
                                            />
                                        </div>
                                        <X
                                            v-else
                                            class="text-muted-foreground/50 h-5 w-5"
                                        />
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <div
                                            v-if="item.them"
                                            class="bg-muted flex h-6 w-6 items-center justify-center rounded-full"
                                        >
                                            <Check
                                                class="text-muted-foreground h-4 w-4"
                                            />
                                        </div>
                                        <X
                                            v-else
                                            class="text-muted-foreground/50 h-5 w-5"
                                        />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </AnimatedSection>
        </div>
    </section>
</template>
