<script setup lang="ts">
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';
import GitHubStarButton from '@/components/marketing/GitHubStarButton.vue';
import Button from '@/components/ui/button/Button.vue';
import { ArrowRight } from 'lucide-vue-next';
</script>

<template>
    <section id="cta" class="py-24 sm:py-32">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <AnimatedSection>
                <h2
                    class="text-foreground text-3xl font-semibold tracking-tight sm:text-4xl"
                >
                    Built for macOS.
                    <br />
                    Open for everyone.
                </h2>
                <p class="text-muted-foreground mt-6 text-lg">
                    Download Honeymelon and experience intelligent,
                    privacy-first media conversion on your Mac — free and open
                    source.
                </p>
                <div
                    class="mt-10 flex flex-col items-center gap-4 sm:flex-row sm:justify-center"
                >
                    <Button as-child size="lg" class="h-12 px-8 text-base">
                        <a href="#download">
                            Download for macOS
                            <ArrowRight class="ml-2 h-4 w-4" />
                        </a>
                    </Button>
                    <GitHubStarButton size="lg" />
                </div>
            </AnimatedSection>
        </div>
    </section>
</template>
