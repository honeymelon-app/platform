<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';
import GitHubStarButton from '@/components/marketing/GitHubStarButton.vue';
import ScreenshotFrame from '@/components/marketing/ScreenshotFrame.vue';
import Button from '@/components/ui/button/Button.vue';
import { useGitHubRepo } from '@/composables/useGitHubRepo';
import { ArrowRight, ChevronRight } from 'lucide-vue-next';

const { formattedStars, formattedDownloads, stars, downloadCount } =
    useGitHubRepo();
</script>

<template>
    <section id="hero" class="relative pb-24 pt-16 sm:pb-32 sm:pt-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <AnimatedSection>
                <div class="text-center">
                    <!-- Minimal badge -->
                    <div
                        class="border-border bg-background text-muted-foreground mb-8 inline-flex items-center gap-2 rounded-full border px-4 py-2 text-sm"
                    >
                        <AppLogoIcon class="size-4" />
                        <span>Native macOS App</span>
                        <span class="text-border">·</span>
                        <span>Apple Silicon</span>
                    </div>

                    <!-- Headline -->
                    <h1
                        class="text-foreground mx-auto max-w-3xl text-4xl font-semibold tracking-tight sm:text-5xl lg:text-6xl"
                    >
                        Smart Media Conversion
                        <br class="hidden sm:block" />
                        <span class="text-primary">for Your Mac</span>
                    </h1>

                    <!-- Description -->
                    <p
                        class="text-muted-foreground mx-auto mt-6 max-w-xl text-lg leading-relaxed sm:text-xl"
                    >
                        Remux-first intelligence that preserves quality while
                        maximizing speed. Free, open source, and privacy-first.
                    </p>

                    <!-- CTA -->
                    <div
                        class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row"
                    >
                        <Button as-child size="lg" class="h-12 px-8 text-base">
                            <a href="#download">
                                Download Free
                                <ArrowRight class="ml-2 h-4 w-4" />
                            </a>
                        </Button>
                        <Button
                            as-child
                            variant="ghost"
                            size="lg"
                            class="text-muted-foreground h-12 text-base"
                        >
                            <a href="#features">
                                See How It Works
                                <ChevronRight class="ml-1 h-4 w-4" />
                            </a>
                        </Button>
                    </div>

                    <!-- Trust line -->
                    <p class="text-muted-foreground/70 mt-6 text-sm">
                        Free &amp; open source · GPLv3 licensed · Files stay on
                        your Mac.
                    </p>

                    <!-- GitHub Star CTA + Social Proof -->
                    <div class="mt-8 flex flex-col items-center gap-4">
                        <GitHubStarButton size="lg" />
                        <div
                            v-if="stars !== null || downloadCount !== null"
                            class="text-muted-foreground/60 flex items-center gap-4 text-xs"
                        >
                            <span v-if="stars !== null" class="tabular-nums">
                                {{ formattedStars }} stars on GitHub
                            </span>
                            <span
                                v-if="stars !== null && downloadCount !== null"
                                class="text-border"
                                >·</span
                            >
                            <span
                                v-if="downloadCount !== null"
                                class="tabular-nums"
                            >
                                {{ formattedDownloads }} downloads
                            </span>
                        </div>
                    </div>
                </div>
            </AnimatedSection>

            <!-- Hero Screenshot -->
            <div class="mt-16 sm:mt-20">
                <ScreenshotFrame
                    src="/images/screens/Pending-Files-Active-Files-Completed-Files-Light-Mode.png"
                    alt="Honeymelon app interface"
                    :delay="200"
                />
            </div>
        </div>
    </section>
</template>
