<template>
    <FrontLayout title="Home">
        <div class="space-y-8 mt-8 wrapper">
            <Searchbar v-model="filter.search" />
            <div class="flex lg:flex-row flex-col-reverse gap-10">
                <div class="w-full lg:w-3/12">
                    <CategoryList :data="categories" v-model="filter.categories" />
                </div>
                <div class="w-full lg:w-9/12">
                    <ProductList :data="products" />
                </div>
            </div>
        </div>
    </FrontLayout>
</template>

<script setup>
import CategoryList from '../../../Components/CategoryList.vue';
import ProductList from '../../../Components/ProductList.vue';
import Searchbar from '../../../Components/Searchbar.vue';
import FrontLayout from '../../../Layouts/FrontLayout.vue';
import useFilter from '../../../Composable/useFilter';

defineProps(['products', 'categories']);

const filter = useFilter({
    categories: [],
    search: '',
});
</script>
