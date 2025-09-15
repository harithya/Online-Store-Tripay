<template>
    <!-- Overlay -->
    <transition name="fade">
        <div v-if="isOpen" class="fixed inset-0 z-50 bg-black/80" @click="isOpen = false"></div>
    </transition>

    <!-- Modal -->
    <transition name="scale">
        <div
            v-if="isOpen"
            tabindex="-1"
            aria-hidden="true"
            class="fixed top-0 right-0 left-0 z-50 mt-10 flex h-[calc(100%-1rem)] max-h-full w-full items-start justify-center overflow-x-hidden overflow-y-auto md:inset-0"
        >
            <div class="relative max-h-full w-full max-w-2xl p-4" ref="modal">
                <div class="relative rounded-lg bg-white shadow-sm">
                    <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5">
                        <h3 class="text-xl font-semibold text-gray-900">
                            {{ title }}
                        </h3>
                        <button type="button" @click="isOpen = false" class="cursor-pointer">
                            <XIcon class="size-6" />
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="space-y-4 p-4 md:p-5">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { XIcon } from 'lucide-vue-next';
import { ref } from 'vue';

const isOpen = defineModel();
const modal = ref(null);

defineProps(['title']);
</script>

<style scoped>
/* Overlay fade */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

/* Modal scale/slide */
.scale-enter-active,
.scale-leave-active {
    transition: all 0.3s ease;
}

.scale-enter-from {
    opacity: 0;
    transform: scale(0.95);
}

.scale-leave-to {
    opacity: 0;
    transform: scale(0.95);
}
</style>
