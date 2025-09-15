<template>
    <FrontLayout :title="product.name">
        <div class="mt-10 mb-10 wrapper">
            <div class="items-center gap-10 grid md:grid-cols-2">
                <!-- Gambar Produk -->
                <div class="flex justify-center">
                    <img :src="product.image" :alt="product.name"
                        class="rounded-xl w-full max-h-[500px] lg:max-h-[700px] object-cover" />
                </div>

                <!-- Detail Produk -->
                <div>
                    <!-- Kategori -->
                    <p class="mb-2 text-gray-400 text-sm uppercase tracking-wide">
                        {{ product.product_category.name }}
                    </p>

                    <h1 class="mb-2 font-bold text-3xl">{{ product.name }}</h1>
                    <p class="mb-4 font-semibold text-primary text-xl">Rp {{ product.price.toLocaleString('id-ID') }}
                    </p>

                    <p class="mb-6 text-gray-600 leading-relaxed" v-html="product.description" />

                    <div class="flex gap-4">
                        <button class="btn btn-neutral" @click="handleSubmit(false)">Tambah ke
                            Keranjang</button>
                        <button class="btn-outline btn" @click="handleSubmit(true)">Beli Sekarang</button>
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
    is_checkout_now: false
})

const handleSubmit = (isCheckoutNow) => {
    form.is_checkout_now = isCheckoutNow;
    form.post(route('cart.store'));
}
</script>
