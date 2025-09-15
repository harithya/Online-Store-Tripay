<template>
    <button
        class="custom-input flex w-full cursor-pointer items-center justify-between rounded-lg border border-green-100 bg-white p-3"
        @click="isOpen = true"
    >
        <label class="text-gray-500" v-if="!model">Pilih Metode</label>
        <label class="text-gray-800" v-else>{{ model }}</label>
        <ChevronDown class="h-5 w-5" />
    </button>

    <Modal v-model="isOpen" title="Metode Pembayaran">
        <div v-for="(payment, key) in payments">
            <h4 class="mb-5 text-lg font-medium">{{ key }}</h4>
            <div class="grid grid-cols-2 gap-5 lg:grid-cols-4">
                <button
                    v-for="value in payment"
                    @click="handleSelect(value.code)"
                    :key="value.code"
                    class="card card-body flex cursor-pointer flex-col items-center justify-center border border-gray-200 p-5 text-center shadow-sm transition-all hover:scale-105"
                >
                    <img :src="value.icon_url" alt="" class="w-10 object-contain" />
                    <span class="mt-5 text-sm text-gray-600">
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
};
</script>
