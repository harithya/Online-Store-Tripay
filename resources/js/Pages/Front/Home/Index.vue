<template>
    <FrontLayout title="Home">
        <div class="wrapper mt-8 space-y-8">
            <Searchbar v-model="filter.search" />
            <div class="flex flex-col-reverse gap-10 lg:flex-row">
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
