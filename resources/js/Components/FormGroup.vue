<template>
    <div :class="cn('form-group mb-4', { 'has-error': error })">
        <label class="mb-3 block" v-if="label">{{ label }}</label>
        <slot />
        <p v-if="error" class="mt-2 text-sm text-red-500">{{ error }}</p>
    </div>
</template>

<script setup>
import { cn } from '@sglara/cn';

defineProps(['label', 'error']);
</script>
