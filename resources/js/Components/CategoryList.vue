<template>
    <div class="rounded-lg bg-gray-50 p-5">
        <h2 class="mb-8 card-title text-xl">Kategori</h2>
        <div v-for="category in data" class="mb-4">
            <div class="space-x-5">
                <input type="checkbox" class="checkbox bg-white" :id="category.id" v-model="model" :value="category.id" />
                <label class="text-gray-600" :for="category.id">{{ category.name }}</label>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps(['data']);

const model = defineModel();
</script>
