<script setup>
import ApplicationLogo from '@/Pages/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Register from "@/Pages/Auth/Register.vue";
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">



        <div v-show="$page.props.auth.user == null" class=" flex space-x-7 py-7">
            <div class="">
                <Link class="hover:underline" :class="{ 'font-bold': $page.url === '/login' }" href="/login">
                    Login
                </Link>
            </div>
            <div>
                <Link class="hover:underline" :class="{ 'font-bold ': $page.url === '/register' }" href="/register">
                    Register
                </Link>
            </div>
        </div>


        <div class="w-full py-4 sm:max-w-md mt-0 px-6  bg-white shadow-md   sm:rounded-lg">
            <div class=" flex justify-content-evenly my-4" >
                <Link href="/">
                    <ApplicationLogo class="w-20 h-20  text-gray-500" />
                </Link>
            </div>
            <slot />
        </div>
    </div>
</template>
