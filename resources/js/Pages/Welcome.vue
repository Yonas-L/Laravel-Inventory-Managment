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
    <Head title="Welcome" />

    <!--Navbar Component -->
    <MyNavBar v-bind:searchedUser="props.searchedUser" />

    <div class="grid grid-cols-2">
        <div class="flex flex-col">
            <h1
                class="hover:animate__animated animate__zoomInDown p-1 font-serif text-3xl mb-3 text-center cursor-pointer underline decoration-1 text-emerald-600"
            >
                Add Products
            </h1>
            <Form />
            <!-- <Analytics :messages="messages" :analytics="props.analytics" /> -->
        </div>
        <div class="grid text-center">
            <div
                class="flex place-items-center gap-3 justify-center mx-auto my-auto"
            >
                <h1
                    class="p-1 text-3xl font-serif cursor-pointer text-emerald-600"
                >
                    Items In Stock ({{ props.analytics }})
                </h1>
                <a :href="route('export')">
                    <h1
                        class="tp-1 text-2xl font-serif cursor-pointer underline decoration-1 text-emerald-600 bi bi-download"
                    ></h1>
                </a>
            </div>
            <div
                class="mx-auto my-auto gap-x-20 flex justify-between place-items-center"
            >
                <FilterOptions />
            </div>

            <!-- List Component -->
            <div
                class="grid justify-center overflow-y-scroll gap-y-4 gap-x-4 mx-4 h-96 sm:grid-cols-1 md:grid-cols-2"
            >
                <div v-for="product in props.products" :key="product.id">
                    <Card :products="product" />
                </div>
            </div>
        </div>
    </div>

    <!--!! This is the Floating Action button -->
    <div class="fixed flex fixed-bottom m-6 justify-end p-2">
        <Link href="/chatify">
            <ChatBot />
        </Link>
    </div>
    <!-- Footer section -->
    <Footer />
</template>
