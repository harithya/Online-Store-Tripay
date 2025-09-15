<template>
    <AdminLayout title="Invoice">
        <DataView :data="invoices">
            <thead class="bg-gray-50">
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Email</th>
                    <th>No Hp </th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(invoice, index) in invoices">
                    <td>{{ index + 1 }}</td>
                    <td>
                        <Link :href="route('admin.invoice.show', invoice.tripay_reference)"
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
                        {{ invoice.buyer_email }}
                    </td>
                    <td>
                        {{ invoice.buyer_phone }}
                    </td>
                    <td>
                        Rp {{ invoice.amount.toLocaleString('id-ID') }}
                    </td>
                </tr>
            </tbody>
        </DataView>
    </AdminLayout>
</template>

<script setup>
import DataView from '../../../Components/DataView.vue';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import moment from 'moment';
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
