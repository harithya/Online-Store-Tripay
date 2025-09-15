<template>
    <BaseLayout :title="title">
        <div class="drawer lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex flex-col">
                <div class="p-5 lg:p-10">
                    <div class="mb-10 flex items-center justify-between">
                        <h4 class="text-2xl font-semibold">{{ title }}</h4>
                        <Link :href="route('auth.logout')" method="post" class="btn mt-5 text-error btn-link">Logout </Link>
                    </div>
                    <slot />
                </div>
            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <div class="menu min-h-full w-80 bg-base-200 p-4 text-base-content">
                    <div>
                        <img src="/img/logo-app.png" width="150" alt="Logo" />
                    </div>
                    <div class="mt-10 flex flex-col px-10">
                        <Link v-for="navigation in navigations" class="py-2 text-base text-gray-600" :href="navigation.href">
                            {{ navigation.name }}
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import BaseLayout from './BaseLayout.vue';
import { route } from 'ziggy-js';

defineProps(['title']);

const navigations = [
    {
        name: 'Dashboard',
        href: route('admin.dashboard.index'),
    },
    {
        name: 'Produk',
        href: route('admin.product.index'),
    },
    {
        name: 'Invoice',
        href: route('admin.invoice.index'),
    },
];
</script>
