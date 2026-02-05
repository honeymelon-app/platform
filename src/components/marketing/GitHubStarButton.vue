<script setup lang="ts">
import { useGitHubRepo } from '@/composables/useGitHubRepo';
import { trackEvent } from '@/lib/analytics';
import { Star } from 'lucide-vue-next';

withDefaults(
    defineProps<{
        size?: 'sm' | 'md' | 'lg';
        variant?: 'default' | 'outline' | 'ghost';
    }>(),
    {
        size: 'md',
        variant: 'default',
    },
);

const { formattedStars, stars, repoUrl } = useGitHubRepo();

function handleClick(): void {
    trackEvent('Star on GitHub');
}
</script>

<template>
    <a
        :href="repoUrl"
        target="_blank"
        rel="noopener noreferrer"
        class="group inline-flex items-center gap-2 rounded-full border font-medium transition-all duration-200"
        @click="handleClick"
        :class="[
            variant === 'default'
                ? 'border-border bg-background text-foreground shadow-sm hover:border-primary/50 hover:shadow-md'
                : variant === 'outline'
                    ? 'border-border/50 bg-transparent text-muted-foreground hover:border-primary/50 hover:text-foreground'
                    : 'border-transparent bg-transparent text-muted-foreground hover:text-foreground',
            size === 'sm'
                ? 'px-3 py-1.5 text-xs'
                : size === 'lg'
                    ? 'px-5 py-2.5 text-sm'
                    : 'px-4 py-2 text-sm',
        ]"
    >
        <Star
            class="transition-colors duration-200 group-hover:fill-amber-400 group-hover:text-amber-400"
            :class="[
                size === 'sm' ? 'h-3.5 w-3.5' : 'h-4 w-4',
                variant === 'default'
                    ? 'text-muted-foreground'
                    : 'text-muted-foreground/70',
            ]"
        />
        <span>Star on GitHub</span>
        <span
            v-if="stars !== null"
            class="rounded-full px-1.5 font-semibold tabular-nums transition-colors"
            :class="[
                size === 'sm' ? 'text-[10px]' : 'text-xs',
                variant === 'default'
                    ? 'bg-muted text-muted-foreground'
                    : 'bg-muted/50 text-muted-foreground',
            ]"
        >
            {{ formattedStars }}
        </span>
    </a>
</template>
