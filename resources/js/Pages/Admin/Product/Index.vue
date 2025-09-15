<template>
    <AdminLayout title="Produk">
        <DataView :data="products">
            <template #action>
                <Link :href="route('admin.product.create')" class="btn btn-neutral">Tambah Data</Link>
            </template>
            <thead>
                <tr>
                    <th>No</th>
                    <th>SKU</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products">
                    <td>{{ index + 1 }}</td>
                    <td>{{ product.sku }}</td>
                    <td>
                        <div class="flex gap-5">
                            <img :src="product.image" alt="" class="w-10 h-10 object-cover" />
                            <label>{{ product.name }}</label>
                        </div>
                    </td>
                    <td>{{ product.price.toLocaleString('id-ID') }}</td>
                    <td>{{ product.product_category.name }}</td>
                    <td>
                        <div class="flex gap-5">
                            <Link :href="route('admin.product.edit', product.id)" class="underline">Edit</Link>
                            <button @click="handleDelete(product.id)" class="underline cursor-pointer">Hapus</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </DataView>
    </AdminLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import DataView from '../../../Components/DataView.vue';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import useSwall from '../../../Composable/useSwall';
import { router } from '@inertiajs/vue3';

defineProps(['products']);

const swall = useSwall();
const handleDelete = (id) => {
    swall.confirmDelete(() => router.delete(route('admin.product.destroy', id)));
}
</script>
