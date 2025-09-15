<template>
    <div class="gap-8 grid grid-cols-2 lg:grid-cols-3" v-if="data.length > 0">
        <Link :href="route('home.show', product.slug)" v-for="product in data" class="hover:scale-105 transition-all">
        <img :src="product.image" alt="" class="rounded-xl w-full h-64 object-cover" />
        <div class="mt-5 text-center">
            <h4 class="font-semibold text-lg line-clamp-2">
                {{ product.name }}
            </h4>
            <p class="mt-2 text-gray-700">
                {{ product.price.toLocaleString('id-ID') }}
            </p>
        </div>
        </Link>
    </div>
    <EmptyState v-else />
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import EmptyState from './EmptyState.vue';

defineProps(['data']);
</script>
