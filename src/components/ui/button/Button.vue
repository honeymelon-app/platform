<script setup lang="ts">
import { cn } from '@/lib/utils'
import type { PrimitiveProps } from 'reka-ui'
import { Primitive } from 'reka-ui'
import type { HTMLAttributes } from 'vue'
import type { ButtonVariants } from '.'
import { buttonVariants } from '.'

interface Props extends PrimitiveProps {
    variant?: ButtonVariants['variant']
    size?: ButtonVariants['size']
    class?: HTMLAttributes['class']
    disabled?: boolean
}

const props = withDefaults(defineProps<Props>(), {
    as: 'button',
    disabled: false,
})
</script>

<template>
    <Primitive
        :as="as"
        :as-child="asChild"
        :disabled="disabled"
        :class="cn(buttonVariants({ variant, size }), props.class)"
    >
        <slot />
    </Primitive>
</template>
