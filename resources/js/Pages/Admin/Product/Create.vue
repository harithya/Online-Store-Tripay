<template>
    <AdminLayout title="Tambah">
        <div class="card mx-auto card-body w-full bg-base-200 lg:w-2/4">
            <form @submit.prevent="form.post(route('admin.product.store'))">
                <FormGroup label="Gambar Produk" :error="form.errors.image">
                    <input type="file" class="file-input w-full" accept="image/*" @change="form.image = $event.target.files[0]" />
                </FormGroup>
                <FormGroup label="SKU Produk" :error="form.errors.sku">
                    <input type="text" class="input w-full" v-model="form.sku" />
                </FormGroup>
                <FormGroup label="Nama Produk" :error="form.errors.name">
                    <input type="text" class="input w-full" v-model="form.name" />
                </FormGroup>
                <FormGroup label="Harga Produk" :error="form.errors.price">
                    <input type="number" class="input w-full" v-model="form.price" />
                </FormGroup>
                <FormGroup label="Kategori" :error="form.errors.product_category_id">
                    <select v-model="form.product_category_id" class="select w-full">
                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                    </select>
                </FormGroup>
                <FormGroup label="Deskripsi" :error="form.errors.description">
                    <textarea class="textarea w-full" v-model="form.description"></textarea>
                </FormGroup>
                <div class="gap-5 space-x-5">
                    <Button :is-loading="form.processing" class="btn btn-neutral">Simpan Data</Button>
                    <Link class="btn btn-link" :href="route('admin.product.index')">Kembali</Link>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import FormGroup from '../../../Components/FormGroup.vue';
import AdminLayout from '../../../Layouts/AdminLayout.vue';
import Button from '../../../Components/Button.vue';

defineProps(['categories']);
const form = useForm({
    sku: '',
    name: '',
    price: '',
    product_category_id: '',
    image: null,
    description: '',
});
</script>
