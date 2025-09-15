<template>
    <FrontLayout :title="product.name">
        <div class="wrapper mt-10 mb-10">
            <div class="grid items-center gap-10 md:grid-cols-2">
                <!-- Gambar Produk -->
                <div class="flex justify-center">
                    <img :src="product.image" :alt="product.name" class="max-h-[500px] w-full rounded-xl object-cover lg:max-h-[700px]" />
                </div>

                <!-- Detail Produk -->
                <div>
                    <!-- Kategori -->
                    <p class="mb-2 text-sm tracking-wide text-gray-400 uppercase">
                        {{ product.product_category.name }}
                    </p>

                    <h1 class="mb-2 text-3xl font-bold">{{ product.name }}</h1>
                    <p class="mb-4 text-xl font-semibold text-primary">Rp {{ product.price.toLocaleString('id-ID') }}</p>

                    <p class="mb-6 leading-relaxed text-gray-600" v-html="product.description" />

                    <div class="flex gap-4">
                        <button class="btn btn-neutral" @click="handleSubmit(false)">Tambah ke Keranjang</button>
                        <button class="btn btn-outline" @click="handleSubmit(true)">Beli Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </FrontLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import FrontLayout from '../../../Layouts/FrontLayout.vue';

const props = defineProps(['product']);

const form = useForm({
    product_id: props.product.id,
    is_checkout_now: false,
});

const handleSubmit = (isCheckoutNow) => {
    form.is_checkout_now = isCheckoutNow;
    form.post(route('cart.store'));
};
</script>
