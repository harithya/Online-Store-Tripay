<template>
    <nav v-bind="attrs">
        <ul
            class="lg:flex lg:items-center lg:space-x-10 space-y-5 lg:space-y-0 px-5 lg:px-0 py-5 lg:py-0 border-b border-b-gray-100 lg:border-b-0">
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
                    <Link :href="route('auth.logout')" method="post" as="button" class="cursor-pointer">
                    Sign Out
                    </Link>
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
