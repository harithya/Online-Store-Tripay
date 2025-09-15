<template>
    <AdminLayout title="Detail Invoice">
        <div class="wrapper mt-20 flex justify-center">
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
                <div class="mt-5 rounded-lg bg-gray-50 p-5">
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
                    <div class="flex justify-between py-3">
                        <label class="font-semibold">Status</label>
                        <label class="font-semibold">{{ invoice.raw_response.status }}</label>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '../../../Layouts/AdminLayout.vue';

defineProps(['invoice']);
</script>
