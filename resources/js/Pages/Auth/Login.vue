<script setup>

import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInput.vue';


const form = useForm({
    email: null,
    password: null,
    remember: null
})

const submit = () => {
  form.post('/login', {
    onError: () => form.reset('password','remember'),
  });
};

</script>
<template>
    <Head title="| Login"/>
    <h1 class="title">Login to your account</h1>
    <div class="w-2/4 mx-auto">
        <form @submit.prevent="submit">
            <TextInput name="Email" type="email" v-model="form.email" :message="form.errors.email"/>
            <TextInput name="Password" type="password" v-model="form.password" :message="form.errors.password"/>
            <div class="mb-2">
                <small class="text-red-500 mb">{{ form.errors.message }}</small>
            </div>
            <div class="flex justify-between items-center mb-2">
                <div class="flex items-center gap-2">
                    <input type="checkbox" v-model="form.remember">
                    <label>Remember me</label>
                </div>
                <p class="text-slate-600">Don't have an account? <a href="/register" class="text-blue-500">register</a></p>
            </div>
            <button class="primary-btn" :disabled="form.processing">Log in</button>
        </form>
    </div>
</template>