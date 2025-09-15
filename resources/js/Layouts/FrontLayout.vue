<template>
    <BaseLayout :title="title">
        <div class="flex flex-col min-h-screen">
            <!-- Header -->
            <header class="py-5 border-b border-b-gray-100">
                <div class="flex justify-between items-center wrapper">
                    <Link href="/">
                    <img src="/img/logo-app.png" width="150" alt="Logo" />
                    </Link>
                    <button class="lg:hidden p-2 border border-gray-200 rounded-md" @click="isOpen = !isOpen">
                        <MenuIcon class="w-6 h-6" />
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
            <footer class="py-5 border-t border-t-gray-100">
                <div class="wrapper">
                    <p class="text-gray-500 text-sm text-center">Copyright &copy; 2025</p>
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

defineProps(['title'])


const isOpen = ref(false);
</script>
