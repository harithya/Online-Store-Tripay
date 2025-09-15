<template>
    <nav v-bind="attrs">
        <ul class="space-y-5 border-b border-b-gray-100 px-5 py-5 lg:flex lg:items-center lg:space-y-0 lg:space-x-10 lg:border-b-0 lg:px-0 lg:py-0">
            <li>
                <Link :href="route('cart.index')">Keranjang ({{ $page.props.total_cart }})</Link>
            </li>
            <li v-if="!$page.props.auth">
                <Link :href="route('auth.login.index')">Sign In</Link>
            </li>
            <template v-else>
                <li>
                    <Link :href="route('transaction.index')">Transaksi Saya</Link>
                </li>
                <li>
                    <Link :href="route('auth.logout')" method="post" as="button" class="cursor-pointer"> Sign Out </Link>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { useAttrs } from 'vue';

const attrs = useAttrs();
</script>
