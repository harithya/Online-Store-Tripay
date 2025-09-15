<template>
    <FrontLayout title="Transaksi">
        <div class="mt-20 wrapper">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(invoice, index) in invoices" :key="invoice.id" v-if="invoices.length > 0">
                            <td>{{ index + 1 }}</td>
                            <td>
                                <Link :href="route('transaction.show', invoice.tripay_reference)"
                                    class="border-b font-semibold text-primary italic">
                                {{ invoice.raw_response.merchant_ref }}
                                </Link>
                            </td>
                            <td>
                                <span :class="getStatusBadge(invoice.raw_response.status).class">
                                    {{ getStatusBadge(invoice.raw_response.status).label }}
                                </span>
                            </td>
                            <td>
                                {{ moment(invoice.created_at).format('DD MMMM YYYY HH:mm') }}
                            </td>
                            <td>
                                Rp {{ invoice.amount.toLocaleString('id-ID') }}
                            </td>
                        </tr>
                        <tr v-else>
                            <td colspan="5">
                                <EmptyState />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </FrontLayout>
</template>

<script setup>
import moment from 'moment';
import FrontLayout from '../../../Layouts/FrontLayout.vue';
import EmptyState from '../../../Components/EmptyState.vue';
import { Link } from '@inertiajs/vue3';

defineProps(['invoices']);

const getStatusBadge = (status) => {
    const mapping = {
        UNPAID: { label: "Belum Dibayar", class: "badge badge-warning" },
        PAID: { label: "Lunas", class: "badge badge-success" },
        FAILED: { label: "Gagal", class: "badge badge-error" },
        EXPIRED: { label: "Kedaluwarsa", class: "badge badge-neutral" },
        REFUND: { label: "Refund", class: "badge badge-info" },
    };

    return mapping[status] || { label: "Tidak Diketahui", class: "badge" };
};


</script>
