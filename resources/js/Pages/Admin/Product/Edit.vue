<template>
    <AdminLayout title="Edit">
        <div class="bg-base-200 mx-auto w-full lg:w-2/4 card card-body">
            <form @submit.prevent="form.put(route('admin.product.update', product.id))">
                <FormGroup label="Gambar Produk" :error="form.errors.image">
                    <input type="file" class="w-full file-input" accept="image/*"
                        @change="form.image = $event.target.files[0]" />
                </FormGroup>
                <FormGroup label="SKU Produk" :error="form.errors.sku">
                    <input type="text" class="w-full input" v-model="form.sku" />
                </FormGroup>
                <FormGroup label="Nama Produk" :error="form.errors.name">
                    <input type="text" class="w-full input" v-model="form.name" />
                </FormGroup>
                <FormGroup label="Harga Produk" :error="form.errors.price">
                    <input type="number" class="w-full input" v-model="form.price" />
                </FormGroup>
                <FormGroup label="Kategori" :error="form.errors.product_category_id">
                    <select v-model="form.product_category_id" class="w-full select">
                        <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
                    </select>
                </FormGroup>
                <FormGroup label="Deskripsi" :error="form.errors.description">
                    <textarea class="w-full textarea" v-model="form.description"></textarea>
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

const props = defineProps(['product', 'categories'])
const form = useForm({
    sku: props.product.sku,
    name: props.product.name,
    price: props.product.price,
    product_category_id: props.product.product_category_id,
    image: null,
    description: props.product.description
})
</script>
