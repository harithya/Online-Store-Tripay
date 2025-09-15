<template>
    <button
        class="flex justify-between items-center bg-white p-3 border border-green-100 rounded-lg w-full cursor-pointer custom-input"
        @click="isOpen = true">
        <label class="text-gray-500" v-if="!model">Pilih Metode</label>
        <label class="text-gray-800" v-else>{{ model }}</label>
        <ChevronDown class="w-5 h-5" />
    </button>

    <Modal v-model="isOpen" title="Metode Pembayaran">
        <div v-for="(payment, key) in payments">
            <h4 class="mb-5 font-medium text-lg">{{ key }}</h4>
            <div class="gap-5 grid grid-cols-2 lg:grid-cols-4">
                <button v-for="value in payment" @click="handleSelect(value.code)" :key="value.code"
                    class="flex flex-col justify-center items-center shadow-sm p-5 border border-gray-200 text-center hover:scale-105 transition-all cursor-pointer card card-body">
                    <img :src="value.icon_url" alt="" class="w-10 object-contain" />
                    <span class="mt-5 text-gray-600 text-sm">
                        {{ value.name }}
                    </span>
                </button>
            </div>
        </div>
    </Modal>
</template>

<script setup>
import { ChevronDown } from 'lucide-vue-next';
import Modal from './Modal.vue';
import { computed, ref } from 'vue';

const props = defineProps(['data']);

const model = defineModel();

const isOpen = ref(false);
const payments = computed(() => {
    return props.data.reduce((acc, item) => {
        if (!acc[item.group]) {
            acc[item.group] = [];
        }
        acc[item.group].push(item);
        return acc;
    }, {});
});

const handleSelect = (value) => {
    model.value = value;
    isOpen.value = false;
}
</script>
