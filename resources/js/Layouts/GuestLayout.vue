<script setup>
import ApplicationLogo from "@/Pages/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-4 sm:pt-0 bg-green-800"
    >
        <div
            class="animate__animated animate__fadeIn animate__slow w-full py-4 sm:max-w-md mt-0 px-6 bg-white shadow-xl transition-all duration-1000 hover:shadow-green-600 shadow-green-300 md:rounded-xl"
        >
            <div class="flex justify-center place-items-center my-4">
                <Link href="/">
                    <ApplicationLogo
                        class="hover:opacity-60 hover:transition-all duration-1000 hover:duration-1000 w-20 h-20 text-gray-500"
                    />
                </Link>
            </div>
            <div
                v-show="$page.props.auth.user == null"
                class="flex justify-center place-items-center space-x-7 py-7"
            >
                <div class="">
                    <Link
                        class="hover:underline font-serif"
                        :class="{ 'font-bold font-serif': $page.url === '/login' }"
                        href="/login"
                    >
                        Login
                    </Link>
                </div>
                <div>
                    <Link
                        class="hover:underline font-serif"
                        :class="{ 'font-bold font-serif': $page.url === '/register' }"
                        href="/register"
                    >
                        Register
                    </Link>
                </div>
            </div>

            <slot />
        </div>
    </div>
</template>
