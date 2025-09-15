<template>
    <FrontLayout title="Sign In">
        <div class="wrapper flex justify-center">
            <div class="mt-20 w-full lg:max-w-md">
                <h4 class="mb-10 text-2xl font-medium lg:text-3xl">Sign In</h4>
                <form @submit.prevent="form.post(route('auth.login.store'))">
                    <FormGroup label="Email" :error="form.errors.email">
                        <input type="email" class="input w-full" v-model="form.email" />
                    </FormGroup>
                    <FormGroup label="Password" :error="form.errors.password">
                        <input type="password" class="input w-full" v-model="form.password" />
                    </FormGroup>
                    <button type="submit" class="btn mt-5 w-full btn-neutral">Sign In</button>
                    <Link class="btn mt-5 w-full" :href="route('auth.register.index')">Buat Akun</Link>
                </form>
            </div>
        </div>
    </FrontLayout>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import FrontLayout from '../../Layouts/FrontLayout.vue';
import FormGroup from '../../Components/FormGroup.vue';

const form = useForm({
    email: '',
    password: '',
});
</script>
