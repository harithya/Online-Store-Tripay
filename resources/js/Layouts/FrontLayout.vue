<template>
    <BaseLayout :title="title">
        <div class="flex min-h-screen flex-col">
            <!-- Header -->
            <header class="border-b border-b-gray-100 py-5">
                <div class="wrapper flex items-center justify-between">
                    <Link href="/">
                        <img src="/img/logo-app.png" width="150" alt="Logo" />
                    </Link>
                    <button class="rounded-md border border-gray-200 p-2 lg:hidden" @click="isOpen = !isOpen">
                        <MenuIcon class="h-6 w-6" />
                    </button>
                    <Navigation class="hidden lg:flex" />
                </div>
            </header>

            <!-- Konten -->
            <main class="flex-1 pb-10">
                <Navigation class="lg:hidden" v-show="isOpen" />
                <slot />
            </main>

            <!-- Footer -->
            <footer class="border-t border-t-gray-100 py-5">
                <div class="wrapper">
                    <p class="text-center text-sm text-gray-500">Copyright &copy; 2025</p>
                </div>
            </footer>
        </div>
    </BaseLayout>
</template>

<script setup>
import { ref } from 'vue';
import { MenuIcon } from 'lucide-vue-next';
import Navigation from './Front/Navigation.vue';
import { Link } from '@inertiajs/vue3';
import BaseLayout from './BaseLayout.vue';

defineProps(['title']);

const isOpen = ref(false);
</script>
