<template>
    <div class="mb-5 flex items-center justify-between gap-5">
        <Searchbar v-model="filter.search" />
        <slot name="action" />
    </div>
    <table class="table">
        <slot v-if="data.length > 0" />
        <tr v-else>
            <td colspan="100%">
                <EmptyState />
            </td>
        </tr>
    </table>
</template>

<script setup>
import useFilter from '../Composable/useFilter';
import EmptyState from './EmptyState.vue';
import Searchbar from './Searchbar.vue';

defineProps(['data']);
const filter = useFilter({
    search: '',
});
</script>
