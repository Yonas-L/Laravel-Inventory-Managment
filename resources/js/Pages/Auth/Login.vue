<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <div class="flex place-items-center justify-center mt-4">
                <!--* social login options -->
                <a href="social-login">
                    <div
                        class="container w-fit hover:shadow-lg bg-dark text-white hover:shadow-green-800 hover:bg-opacity-75 duration-500 cursor-pointer hover:text-dark font-bold rounded-lg p-2 gap-2 outline flex justify-evenly place-items-center"
                    >
                        <img
                            class="w-7 h-7"
                            src="storage/CompanyImages/google.png"
                            alt="Googel-logo"
                            loading="lazy"
                        />

                        <h1>Continue with Google</h1>
                    </div></a
                    
                >
            </div>
            <h1 class="text-center mt-4 text-xl font-thin font-serif">
                __________ Or __________
            </h1>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="email" />
                <TextInput placeHolder="xyz@mail.com" id="email" type="email" class="mt-1 block w-full" v-model="form.email" required   autocomplete="email"  />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
