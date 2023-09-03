<script setup>
import Button from "../Components/MyButton.vue";
import ProductImage from "./ProductImage.vue";
import MyModal from "../Components/MyModal.vue";
import { Inertia } from "@inertiajs/inertia";
import moment from "moment";

const props = defineProps({
    products: Object,
});
// const date= new Date(props.products.created_at).toLocaleDateString();
const date = moment(props.products.created_at).calendar();
const price = Intl.NumberFormat("en-US").format(props.products.price);

const destroy = (id) => {
    if (confirm("Are you sure you want to delete this product?")) {
        Inertia.delete(route("products.destroy", id));
    }
    return {
        destroy,
    };
};
</script>

<template>
    <div class="animate__animated animate__zoomIn">
        <div
            class="p-1.5 m-auto rounded-e-full  hover:shadow-md duration-1000 outline outline-1 hover:outline-emerald-300 bg-white transition-all hover:shadow-emerald-300 sm:rounded-xl md:rounded-xl"
        >
            <!-- Image and Delete btn in one group 1 -->
            <div class="flex justify-between place-items-stretch">
                <ProductImage
                    class="mt-2 animate__animated animate__fadeIn object-cover animate__slow"
                    v-bind:Image="props.products.image"
                />
                <!-- button for deleting a product -->
                <div v-if="$page.props.auth.user.role == 'admin'">
                    <i
                        @click="destroy(props.products.id)"
                        class="text-3xl text-green-900 cursor-pointer bi bi-x-circle text-opacity-30 hover:text-opacity-100 hover:text-red-900 hover:animate-pulse"
                    ></i>
                </div>
                <div v-else>
                    <i
                        class="text-6xl text-gray-400 hover:cursor-not-allowed bi bi-x-circle text-opacity-30 hover:text-opacity-100 ml-6"
                    ></i>
                </div>
            </div>
            <!-- Product detail in a grid -->
            <div class="grid grid-cols-1 p-2">
                <h5
                    class="text-gray-900 text-sm  text-start font-bold font-serif mx-2"
                >
                    {{ props.products.name }}
                </h5>
                <h5
                    class="text-gray-600 text-sm text-start font-extralight font-serif mx-2"
                >
                    {{ props.products.category }}
                </h5>

                <h5
                    class="text-gray-600 text-sm text-start font-extralight font-serif mx-2"
                >
                    {{ date }}
                </h5>
                <h5
                    class="text-gray-600 text-sm text-start font-extralight  font-serif mx-2"
                >
                    ETB
                    {{
                        Intl.NumberFormat("en-US").format(props.products.price)
                    }}
                </h5>
            </div>
            <!-- Edit button in a flex -->
            <div class="flex justify-center p-2 place-items-center">
                <div v-if="$page.props.auth.user.role == 'admin'">
                    <button
                        data-bs-toggle="modal"
                        :data-bs-target="' #' + '_' + props.products.id"
                        class="px-4 bg-green-900 text-white font-light uppercase rounded-full shadow-lg hover:bg-green-700 hover:shadow-xl active:shadow-lg transition duration-700 ease-in-out"
                    >
                        Edit
                    </button>
                </div>
                <div v-else>
                    <button
                        disabled
                        data-bs-toggle="modal"
                        :data-bs-target="' #' + '_' + props.products.id"
                        class="px-5 bg-gray-400 text-white font-light uppercase rounded-full shadow-lg hover:bg-gray-400 hover:shadow-xl hover:cursor-not-allowed active:shadow-lg transition duration-700 ease-in-out"
                    >
                        Edit
                    </button>
                </div>
            </div>
        </div>
    </div>

    <MyModal :products="products" />
</template>
