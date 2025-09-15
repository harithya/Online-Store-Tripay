<template>
    <FrontLayout title="Keranjang">
        <div class="wrapper mt-20">
            <div class="flex flex-col gap-10 lg:flex-row">
                <div class="w-full lg:w-8/12">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="cart in carts" v-if="carts.length > 0">
                                    <td>
                                        <div class="flex items-center gap-5">
                                            <img :src="cart.image" alt="" class="h-20" />
                                            <label class="font-semibold">{{ cart.name }}</label>
                                        </div>
                                    </td>
                                    <td class="text-center">Rp {{ cart.price.toLocaleString('id-ID') }}</td>
                                    <td class="text-center">
                                        <button class="btn text-white btn-error" @click="handleDelete(cart.id)">
                                            <Trash2Icon class="h-5 w-5" />
                                        </button>
                                    </td>
                                </tr>
                                <tr v-else>
                                    <td colspan="3">
                                        <EmptyState />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-full lg:w-4/12">
                    <div class="rounded-lg bg-gray-50 p-5">
                        <div class="flex justify-between py-3">
                            <label class="font-semibold">Total Bayar</label>
                            <label class="font-semibold">{{ totalPrice.toLocaleString('id-ID') }}</label>
                        </div>
                        <div class="flex justify-between py-3">
                            <label class="font-semibold">Jumlah Produk</label>
                            <label class="font-semibold">{{ carts.length }} Item</label>
                        </div>

                        <div class="mt-5" v-if="carts.length > 0">
                            <FormGroup :error="form.errors.payment_channel">
                                <PaymentChannel :data="payments" v-model="form.payment_channel" />
                            </FormGroup>
                        </div>

                        <Button
                            class="btn mt-5 w-full btn-neutral"
                            :is-loading="form.processing"
                            :disabled="carts.length === 0 || !$page.props.auth"
                            @click="form.post(route('checkout.store'))"
                        >
                            Checkout
                        </Button>
                    </div>
                    <div v-if="!$page.props.auth" class="mt-5 alert alert-warning text-gray-800">
                        Silahkan login terlebih dahulu untuk melakukan checkout
                        <Link :href="route('auth.login.index')" class="underline">Login Sekarang</Link>
                    </div>
                </div>
            </div>
        </div>
    </FrontLayout>
</template>

<script setup>
import { Trash2Icon } from 'lucide-vue-next';
import FrontLayout from '../../../Layouts/FrontLayout.vue';
import useSwall from '../../../Composable/useSwall';
import { Link, router, useForm } from '@inertiajs/vue3';
import EmptyState from '../../../Components/EmptyState.vue';
import { computed } from 'vue';
import PaymentChannel from '../../../Components/PaymentChannel.vue';
import Button from '../../../Components/Button.vue';
import FormGroup from '../../../Components/FormGroup.vue';

const props = defineProps(['carts', 'payments']);

const totalPrice = computed(() => {
    return props.carts.reduce((total, cart) => total + cart.price, 0);
});

const form = useForm({
    payment_channel: '',
});

const swall = useSwall();
const handleDelete = (id) => {
    swall.confirmDelete(() => router.delete(route('cart.destroy', id)));
};
</script>
