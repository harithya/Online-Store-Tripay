<template>
    <button :disabled="isLoading" v-bind="attr">
        <slot v-if="!isLoading" />
        <template v-else>
            <span>Loading ...</span>
        </template>
    </button>
</template>

<script setup>
import { useAttrs } from 'vue';

const attr = useAttrs();
defineProps(['isLoading'])
</script>
