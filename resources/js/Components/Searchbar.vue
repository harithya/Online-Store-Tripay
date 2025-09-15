<template>
    <label class="bg-gray-100/80 border-0 w-full input input-lg">
        <SearchIcon class="w-5 h-5 text-gray-300" />
        <input type="search" required placeholder="Cari data ..." class="text-base" v-model="model" />
    </label>
</template>

<script setup>
import { SearchIcon } from 'lucide-vue-next';

const model = defineModel();
</script>
