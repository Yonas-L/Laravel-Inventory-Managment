<script setup>
import MyNavBar from "@/Components/MyNavBar.vue";
import flasher from "@flasher/flasher";
import Form from "@/Components/Form.vue";
import ChatBot from "@/Components/ChatBotModal.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Analytics from "@/Components/Analytics.vue";
import FilterOptions from "@/Components/FilterOptions.vue";
import Card from "@/Components/Card.vue";
import Footer from "@/Components/Footer.vue";
import { watch } from "vue";

// receiving data form backend
const props = defineProps({
    products: Object,
    searchedUser: Object,
    analytics: String,
    simpleUsers: Object,
    messages: Object,
});
flasher.render(props.messages);

// shared error or success flash notification messages
watch(
    () => props.messages,
    (value) => {
        flasher.render(value);
    }
    // watching for changes in the product list (props)
);
</script>

<template>
    <Head title="Welcome Page" />
    <!--!Navbar Component -->
    <MyNavBar v-bind:searchedUser="props.searchedUser" />

    <div class="grid grid-cols-1 sm:grid-cols-1 md:mx-6 md:grid-cols-2">
        <div class="m-auto animate__animated animate__fadeIn animate__slow">
            <h1 class="font-serif text-3xl text-center m-4 text-emerald-400">
                Add Products
            </h1>
            <Form class="" />
            <!-- <Analytics :messages="messages" :analytics="props.analytics" /> -->
        </div>
        <div class="">
            <div class="flex place-items-center justify-center">
                <h1
                    class="font-serif text-3xl text-center m-4 text-emerald-400"
                >
                    Items In Stock ({{ props.analytics }})
                </h1>
                <a :href="route('export')">
                    <h1
                        class="text-2xl font-serif cursor-pointer underline decoration-1 text-emerald-400 bi bi-download"
                    ></h1>
                </a>
            </div>

            <div class="mb-4 flex justify-evenly place-items-center">
                <FilterOptions />
            </div>

            <!-- List Component -->
            <div
                class="grid overflow-y-scroll gap-y-6 gap-x-6 p-2 h-96 sm:grid-cols-2 md:grid-cols-2"
            >
                <div v-for="product in props.products" :key="product.id">
                    <Card :products="product" />
                </div>
            </div>
        </div>
    </div>

    <!--!! This is the Floating Action button -->
    <div class="flex m-6 justify-end">
        <Link href="/chatify">
            <ChatBot />
        </Link>
    </div>
    <!-- Footer section -->
    <Footer />
</template>
