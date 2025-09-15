<template>
    <FrontLayout title="Sign Up">
        <div class="wrapper flex justify-center">
            <div class="mt-20 w-full lg:max-w-md">
                <h4 class="mb-10 text-2xl font-medium lg:text-3xl">Sign Up</h4>
                <form @submit.prevent="form.post(route('auth.register.store'))">
                    <FormGroup label="Nama" :error="form.errors.name">
                        <input type="text" class="input w-full" v-model="form.name" />
                    </FormGroup>
                    <FormGroup label="Email" :error="form.errors.email">
                        <input type="email" class="input w-full" v-model="form.email" />
                    </FormGroup>
                    <FormGroup label="Phone (62)" :error="form.errors.phone">
                        <input type="number" class="input w-full" v-model="form.phone" />
                    </FormGroup>
                    <FormGroup label="Password" :error="form.errors.password">
                        <input type="password" class="input w-full" v-model="form.password" />
                    </FormGroup>
                    <Button class="btn mt-5 w-full btn-neutral" :isLoading="form.processing">Register</Button>
                    <Link class="btn mt-5 w-full" :href="route('auth.login.index')">Sudah punya akun</Link>
                </form>
            </div>
        </div>
    </FrontLayout>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import FrontLayout from '../../Layouts/FrontLayout.vue';
import FormGroup from '../../Components/FormGroup.vue';
import Button from '../../Components/Button.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    phone: '',
});
</script>
