<script setup lang="ts">
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';
import Accordion from '@/components/ui/accordion/Accordion.vue';
import AccordionContent from '@/components/ui/accordion/AccordionContent.vue';
import AccordionItem from '@/components/ui/accordion/AccordionItem.vue';
import AccordionTrigger from '@/components/ui/accordion/AccordionTrigger.vue';

interface Faq {
    question: string;
    answer: string;
}

withDefaults(
    defineProps<{
        faqs?: Faq[];
    }>(),
    {
        faqs: () => [
            {
                question: 'Is Honeymelon free?',
                answer: 'Yes. Honeymelon is free and open source, with all features available at no cost.',
            },
            {
                question: 'What are the system requirements?',
                answer: 'Honeymelon requires macOS 13 (Ventura) or later and an Apple Silicon chip (M1 or newer). Intel-based Macs are not supported.',
            },
            {
                question: 'Does Honeymelon work offline?',
                answer: 'Yes. Honeymelon works fully offline with no activation or license checks.',
            },
            {
                question: 'What file formats are supported?',
                answer: 'Honeymelon supports MP4, MOV, MKV, WebM, and GIF for video; M4A, MP3, FLAC, WAV, and Opus for audio; and PNG, JPEG, and WebP for images. Powered by FFmpeg.',
            },
            {
                question: 'Do you collect my files or data?',
                answer: 'No. All conversions happen locally on your Mac. Your files never leave your device, and we collect zero telemetry or usage data.',
            },
            {
                question: 'How can I contribute?',
                answer: 'You can report issues, request features, or contribute code through the Honeymelon GitHub repository.',
            },
        ],
    },
);
</script>

<template>
    <section
        id="faq"
        class="border-t border-border/50 bg-muted/30 py-24 sm:py-32"
    >
        <div class="mx-auto max-w-2xl px-4 sm:px-6 lg:px-8">
            <AnimatedSection>
                <div class="text-center">
                    <h2
                        class="text-3xl font-semibold tracking-tight text-foreground sm:text-4xl"
                    >
                        Frequently Asked Questions
                    </h2>
                </div>
            </AnimatedSection>

            <AnimatedSection :delay="100">
                <div class="mt-12">
                    <Accordion type="single" collapsible class="w-full">
                        <AccordionItem
                            v-for="(faq, index) in faqs"
                            :key="index"
                            :value="`item-${index}`"
                            class="border-b border-border/50"
                        >
                            <AccordionTrigger
                                class="py-5 text-left text-base font-medium text-foreground hover:no-underline"
                            >
                                {{ faq.question }}
                            </AccordionTrigger>
                            <AccordionContent
                                class="pb-5 text-muted-foreground"
                            >
                                {{ faq.answer }}
                            </AccordionContent>
                        </AccordionItem>
                    </Accordion>
                </div>
            </AnimatedSection>
        </div>
    </section>
</template>
