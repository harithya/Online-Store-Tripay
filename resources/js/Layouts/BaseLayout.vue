<template>
    <slot />

    <Head :title="title" />
</template>

<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import useSwall from '../Composable/useSwall';

defineProps(['title']);
const page = usePage();
const swall = useSwall();

const formatErrors = (errors) => {
    const messages = Object.values(errors).flat();
    if (messages.length > 1) {
        return `${messages[0]} and ${messages.length - 1} Others`;
    }
    return messages[0];
};

router.on('finish', () => {
    if (page.props.flash.success) {
        swall.successToast(page.props.flash.success);
        page.props.flash.success = null;
    }

    if (page.props.flash.error) {
        swall.errorToast(page.props.flash.error);
        page.props.flash.error = null;
    }

    if (Object.keys(page.props.errors).length > 0) {
        swall.errorToast(formatErrors(page.props.errors));
    }
});
</script>
