<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
// Initialization for ES Users
const form = useForm({
    name: "",
    avatar: "",
    email: "",
    role: "",
    password: "",
    password_confirmation: "",
    branch: "",
    terms: false,
});

// This is the register handler
function submit() {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
        forceFormData: true,
    });
}
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <div class="">
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
                <div class="mt-4">
                    <InputLabel for="name" value="Names" />
                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="email" />
                    <TextInput
                        placeHolder="xyz@somthing.com"
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        autocomplete="email"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mt-4">
                    <InputLabel for="avatar" value="Avatar" />
                    <TextInput
                        @input="form.avatar = $event.target.files[0]"
                        id="avatar"
                        type="file"
                        class="mt-1 block w-full"
                        v-model="form.avatar"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.avatar" />
                </div>
                <div class="flex justify-between">
                    <div class="mt-4 mr-5">
                        <InputLabel for="role" value="Role" />

                        <select v-model="form.role" id="role">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.role" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="branch" value="Branch" />
                        <select v-model="form.branch" id="branch">
                            <option
                                v-for="branch in $page.props.location.branch"
                                :key="branch.id"
                                :value="branch.id"
                            >
                                <h1>{{ branch.city }}</h1>
                            </option>
                        </select>
                        <InputError
                            class="mt-2"
                            :message="form.errors.branch"
                        />
                    </div>
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirm Password"
                    />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <Link
                        :href="route('login')"
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                    >
                        Already registered?
                    </Link>
                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
