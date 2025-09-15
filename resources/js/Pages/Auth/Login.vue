<template>
    <FrontLayout title="Sign In">
        <div class="flex justify-center wrapper">
            <div class="mt-20 w-full lg:max-w-md">
                <h4 class="mb-10 font-medium text-2xl lg:text-3xl">Sign In</h4>
                <form @submit.prevent="form.post(route('auth.login.store'))">
                    <FormGroup label="Email" :error="form.errors.email">
                        <input type="email" class="w-full input" v-model="form.email" />
                    </FormGroup>
                    <FormGroup label="Password" :error="form.errors.password">
                        <input type="password" class="w-full input" v-model="form.password" />
                    </FormGroup>
                    <button type="submit" class="mt-5 w-full btn btn-neutral">Sign In</button>
                    <Link class="mt-5 w-full btn" :href="route('auth.register.index')">Buat Akun</Link>
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
