<template>
    <FrontLayout title="Detail Transaksi">
        <div class="flex justify-center mt-20 wrapper">
            <div class="w-xl">
                <table class="table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(value, index) in invoice.invoice_details">
                            <td>{{ index + 1 }}</td>
                            <td>{{ value.product.name }}</td>
                            <td>Rp {{ value.price.toLocaleString('id-ID') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="bg-gray-50 mt-5 p-5 rounded-lg">
                    <div class="flex justify-between py-3">
                        <label class="font-semibold">Kode Invoice</label>
                        <label class="font-semibold">{{ invoice.raw_response.merchant_ref }}</label>
                    </div>
                    <div class="flex justify-between py-3">
                        <label class="font-semibold">Total Bayar</label>
                        <label class="font-semibold">{{ invoice.amount.toLocaleString('id-ID') }}</label>
                    </div>
                    <div class="flex justify-between py-3">
                        <label class="font-semibold">Jumlah Produk</label>
                        <label class="font-semibold">{{ invoice.invoice_details.length }} Item</label>
                    </div>
                    <div class="mt-5" v-if="invoice.raw_response.status == 'UNPAID'">
                        <a :href="invoice.raw_response.checkout_url" class="w-full btn btn-neutral">Bayar Sekarang</a>
                    </div>
                    <div class="flex justify-between py-3" v-else>
                        <label class="font-semibold">Status</label>
                        <label class="font-semibold">{{ invoice.raw_response.status }}</label>
                    </div>
                </div>
            </div>
        </div>
    </FrontLayout>
</template>

<script setup>
import FrontLayout from '../../../Layouts/FrontLayout.vue';

defineProps(['invoice']);
</script>
