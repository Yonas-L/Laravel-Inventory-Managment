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
            <div class="flex mt-4">
                <!--* social login options -->

                <div
                    class="container rounded-lg outline-1 p-1 outline flex justify-evenly place-items-center"
                >
                    <Link href="products">
                        <div
                            class="container shadow-md shadow-black flex justify-center place-items-center cursor-pointer p-2 rounded-full h-10 w-10 bg-black"
                        >
                            <h1
                                class="duration-700 text-white font-serif bi-google"
                            ></h1>
                        </div>
                    </Link>

                    <Link>
                        <div
                            class="container shadow-md shadow-black flex justify-center place-items-center cursor-pointer p-2 rounded-full h-10 w-10 bg-black"
                        >
                            <h1
                                class="duration-700 text-white font-serif bi-github"
                            ></h1>
                        </div>
                    </Link>

                    <Link>
                        <div
                            class="container shadow-md shadow-black flex justify-center place-items-center cursor-pointer p-2 rounded-full h-10 w-10 bg-black"
                        >
                            <h1
                                class="duration-700 text-white font-serif bi-telegram"
                            ></h1>
                        </div>
                    </Link>
                </div>
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
