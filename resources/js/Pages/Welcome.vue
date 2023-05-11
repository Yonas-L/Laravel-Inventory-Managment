<script setup>
import MyNavBar from '@/Components/MyNavBar.vue';
import Form from '@/Components/Form.vue';
import ShowUserTable from '@/Components/ShowUserTable.vue';
import ChatBot from '@/Components/ChatBotModal.vue';
import ChatRoom from '@/Components/ChatRoom.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Analytics from '@/Components/Analytics.vue';
import FilterOptions from '@/Components/FilterOptions.vue';
import Card from '@/Components/Card.vue';
import Footer from '@/Components/Footer.vue';
// receiving data form backend
const props = defineProps({
    products: Object,
    searchedUser: Object,
    analytics: String
})
</script>
<template>
    <!--    Shared errors form session-->
          <!-- !! Show Global Messages -->
             <div v-if="$page.props.flash.successMessage">
        <div class="animate__animated animate__backInLeft alert bg-green-200 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full alert-dismissible fade show"
            role="alert">
            <strong class="mr-1 text-green-600">{{ $page.props.flash.successMessage }} </strong>
            <button type="button"
                class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    
    <div v-if="$page.props.flash.errorMessage">
        <div class="animate__animated animate__backInLeft alert bg-red-200 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full alert-dismissible fade show"
            role="alert">
            <strong class="mr-1 text-red-600 ">{{ $page.props.flash.errorMessage }} </strong>
            <button type="button"
                class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <Head title="Welcome"></Head>
    <!--Navbar Component -->
    <MyNavBar v-bind:searchedUser="props.searchedUser" />

    <div class="grid grid-cols-2">
        <div class="flex flex-col ">
            <h1
                class=" hover:animate__animated animate__zoomInDown  p-1 text-3xl mb-3 font-bold text-center  cursor-pointer underline decoration-1 text-emerald-600 ">
                Add Products </h1>
            <Form />
            <Analytics :analytics="props.analytics" />
        </div>
        <div class="grid justify-between text-center grid-cols-1">
            <h1 class="p-1 text-3xl mt-3 font-bold  cursor-pointer underline decoration-1 text-emerald-600">Items In Stock
            </h1>
            <div class="ml-4 gap-x-3 flex justify-start">
                <FilterOptions />
            </div>

            <!-- List Component -->
            <div class="grid justify-center overflow-y-scroll gap-y-4 gap-x-4 mx-4  h-96 sm:grid-cols-1 md:grid-cols-2">
                <div v-for="product in props.products" :key="product.id">
                    <div v-if="$page.props.flash.errorMessage">
                        <div class="animate__animated animate__backInLeft alert bg-red-200 rounded-lg py-5 px-6 mb-3 text-base text-yellow-700 inline-flex items-center w-full alert-dismissible fade show"
                            role="alert">
                            <strong class="mr-1 text-red-600 ">{{ $page.props.flash.errorMessage }} </strong>
                            <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 ml-auto text-yellow-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-yellow-900 hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <Card v-bind:products="product" />
                </div>
            </div>
              <!-- ** A place to add the modal -->
                   <ChatRoom class="flex justify-center" />
            <div class="flex justify-end m-4">
                <ChatBot data-bs-ripple  data-bs-toggle="modal" data-bs-target="#chatRoom" />
            </div>
        </div>
    </div>
    <!--     Footer section -->
    <div class="">
        <Footer />
    </div>
</template>


