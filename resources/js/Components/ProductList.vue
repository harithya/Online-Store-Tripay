<template>
    <div class="grid grid-cols-2 gap-8 lg:grid-cols-3" v-if="data.length > 0">
        <Link :href="route('home.show', product.slug)" v-for="product in data" class="transition-all hover:scale-105">
            <img :src="product.image" alt="" class="h-64 w-full rounded-xl object-cover" />
            <div class="mt-5 text-center">
                <h4 class="line-clamp-2 text-lg font-semibold">
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
