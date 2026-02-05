<script setup lang="ts">
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';
import { Check } from 'lucide-vue-next';

const proofPoints = [
    {
        title: 'Built exclusively for macOS',
        description:
            'Native ARM64 binary with hardware acceleration. No Rosetta, no Electron, no compromises.',
    },
    {
        title: 'Free & open source',
        description:
            'Licensed under GPLv3. Inspect the code, contribute features, or fork it—your freedom, your choice.',
    },
    {
        title: 'Privacy-first architecture',
        description:
            'Your files never leave your machine. Fully offline—no telemetry, no tracking, no phone-home.',
    },
    {
        title: 'Remux-first intelligence',
        description:
            'Automatically copies streams when possible, transcodes only when necessary.',
    },
];
</script>

<template>
    <section id="proof" class="border-border/50 border-t py-20 sm:py-24">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <AnimatedSection>
                <div class="text-center">
                    <h2
                        class="text-foreground text-2xl font-semibold tracking-tight sm:text-3xl"
                    >
                        Why Honeymelon?
                    </h2>
                </div>

                <ul class="mt-12 space-y-6">
                    <li
                        v-for="(point, index) in proofPoints"
                        :key="index"
                        class="flex gap-4"
                    >
                        <div
                            class="bg-primary/10 flex h-6 w-6 shrink-0 items-center justify-center rounded-full"
                        >
                            <Check class="text-primary h-4 w-4" />
                        </div>
                        <div>
                            <h3 class="text-foreground font-medium">
                                {{ point.title }}
                            </h3>
                            <p class="text-muted-foreground mt-1">
                                {{ point.description }}
                            </p>
                        </div>
                    </li>
                </ul>
            </AnimatedSection>
        </div>
    </section>
</template>
