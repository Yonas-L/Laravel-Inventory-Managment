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
        Inertia.delete(route("products.destroy", id), {
            preserveScroll: true,
        });
    }
    return {
        destroy,
    };
};
</script>

<template>
    <div class="container min-w-fit  max-w-md animate__animated animate__zoomIn">
        <div
            class="  px-1.5  rounded-xl hover:shadow-md duration-1000 outline outline-1 hover:outline-emerald-300 bg-white transition-all hover:shadow-emerald-300 sm:rounded-xl md:rounded-xl"
        >
            <!--! Image and Delete btn in one group -->
            <div class="flex justify-between place-items-stretch">
                <ProductImage
                    class="mt-2 animate__animated animate__fadeIn object-cover animate__slow"
                    v-bind:Image="props.products.image"
                />
                <!-- button for deleting a product -->
                <div v-if="$page.props.auth.user.role == 'admin'">
                    <i
                        @click="destroy(props.products.id)"
                        class="md:text-5xl sm:text-4xl w-fit text-3xl text-red-900 cursor-pointer bi bi-x-circle text-opacity-30 duration-700 hover:text-opacity-100 hover:text-red-900"
                    ></i>
                </div>
                <div v-else>
                    <i
                        class="text-6xl text-gray-400 hover:cursor-not-allowed bi bi-x-circle text-opacity-30 hover:text-opacity-100 ml-6"
                    ></i>
                </div>
            </div>
            <!-- Product detail in a grid -->
            <div class="grid-cols-1 mt-2  duration-700">
                <h5
                style="font-family:Verdana, Geneva, Tahoma, sans-serif"
                    class="text-gray-900 text-sm sm:text-lg md:text-xl text-justify  font-sans"
                >
                    ETB
                    {{
                        Intl.NumberFormat("en-US").format(props.products.price)
                    }}
                </h5>
                <h5
                    class="text-gray-600 text-sm  text-justify font-extralight font-sans"
                >
                    {{ props.products.name }}
                </h5>

                <h5
                    class="text-gray-600 text-sm text-justify font-extralight font-sans"
                >
                    {{ props.products.category }}
                </h5>
                <h5
                    class="text-gray-600 text-sm text-justify font-extralight font-sans"
                >
                    {{ date }}
                </h5>
            </div>
            <!-- Edit button in a flex -->
            <div class="flex duration-700 justify-end  place-items-center">
                <div class="" v-if="$page.props.auth.user.role == 'admin'">
                    <button
                        data-bs-toggle="modal"
                        :data-bs-target="' #' + '_' + props.products.id"
                        class="bg-opacity-40 bi bi-pen sm:text-md md:text-lg text-green-900 shadow-lg hover:text-green-600 hover:shadow-3xl duration-700"
                    ></button>
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
