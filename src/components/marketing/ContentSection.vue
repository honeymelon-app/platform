<script setup lang="ts">
import AnimatedSection from '@/components/marketing/AnimatedSection.vue';

withDefaults(
    defineProps<{
        title: string;
        subtitle?: string;
    }>(),
    {
        subtitle: undefined,
    },
);
</script>

<template>
    <div class="mx-auto max-w-4xl px-4 py-24 sm:px-6 lg:px-8">
        <AnimatedSection>
            <div class="mb-16 text-center">
                <h1
                    class="mb-4 text-4xl font-bold tracking-tight text-foreground sm:text-5xl"
                >
                    {{ title }}
                </h1>
                <p v-if="subtitle" class="text-lg text-muted-foreground">
                    {{ subtitle }}
                </p>
            </div>
        </AnimatedSection>
        <slot />
    </div>
</template>
