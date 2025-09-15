import { router } from '@inertiajs/vue3';
import qs from 'qs';
import { reactive, watch } from 'vue';

const useFilter = (states) => {
    const params = qs.parse(window.location.search, {
        ignoreQueryPrefix: true,
    });

    const filter = reactive({ ...states, ...params });

    watch(
        filter,
        (value) => {
            router.get(route(route().current()), value, {
                preserveScroll: true,
                preserveState: true,
            });
        },
        { deep: true },
    );
    return filter;
};

export default useFilter;
