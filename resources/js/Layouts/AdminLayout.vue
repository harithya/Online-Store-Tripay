<template>
    <BaseLayout :title="title">

        <div class="drawer lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="flex flex-col drawer-content">
                <div class="p-5 lg:p-10">
                    <div class="flex justify-between items-center mb-10">
                        <h4 class="font-semibold text-2xl">{{ title }}</h4>
                        <Link :href="route('auth.logout')" method="post" class="mt-5 text-error btn btn-link">Logout
                        </Link>
                    </div>
                    <slot />
                </div>
            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <div class="bg-base-200 p-4 w-80 min-h-full text-base-content menu">
                    <div>
                        <img src="/img/logo-app.png" width="150" alt="Logo" />
                    </div>
                    <div class="flex flex-col mt-10 px-10">
                        <Link v-for="navigation in navigations" class="py-2 text-gray-600 text-base"
                            :href="navigation.href">
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

defineProps(['title'])

const navigations = [
    {
        name: 'Dashboard',
        href: route('admin.dashboard.index')
    },
    {
        name: 'Produk',
        href: route('admin.product.index')
    },
    {
        name: 'Invoice',
        href: route('admin.invoice.index')
    },

]
</script>
