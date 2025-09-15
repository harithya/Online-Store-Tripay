<template>
    <!-- Overlay -->
    <transition name="fade">
        <div v-if="isOpen" class="z-50 fixed inset-0 bg-black/80" @click="isOpen = false">
        </div>
    </transition>

    <!-- Modal -->
    <transition name="scale">
        <div v-if="isOpen" tabindex="-1" aria-hidden="true"
            class="top-0 right-0 left-0 z-50 fixed md:inset-0 flex justify-center items-start mt-10 w-full h-[calc(100%-1rem)] max-h-full overflow-x-hidden overflow-y-auto">
            <div class="relative p-4 w-full max-w-2xl max-h-full" ref="modal">
                <div class="relative bg-white shadow-sm rounded-lg">
                    <div class="flex justify-between items-center p-4 md:p-5 border-gray-200 border-b rounded-t">
                        <h3 class="font-semibold text-gray-900 text-xl">
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
