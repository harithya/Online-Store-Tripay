<template>
    <label class="input input-lg w-full border-0 bg-gray-100/80">
        <SearchIcon class="h-5 w-5 text-gray-300" />
        <input type="search" required placeholder="Cari produk impianmu" class="text-base" v-model="model" />
    </label>
</template>

<script setup>
import { SearchIcon } from 'lucide-vue-next';

const model = defineModel();
</script>
