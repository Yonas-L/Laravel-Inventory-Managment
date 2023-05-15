<template>
    <div class="animate__animated animate__zoomInDown">
        <div class="border border-spacing-2 px-4 py-4 rounded-lg shadow-sm border-opacity-25 shadow-zinc-700 bg-white">
            <!-- the flex-row-1 -->
            <div class="flex justify-around">
                <!-- Product Image component -->
                <ProductImage class="animate__animated animate__fadeInDown" v-bind:Image="props.products.image" />
                <div class="flex py-6 flex-col">
                    <div class="grow-0 h-2">
                        <h5 class="text-gray-900 text-xl text-start font-serif mx-2">
                            {{ props.products.name }}
                        </h5>
                        <h5 class="text-gray-900 text-sm text-start font-light mx-2">
                            {{ props.products.category }}
                        </h5>
                        <h5 class="text-gray-900 text-sm text-start font-light mx-2">
                            ETB
                            {{
                                Intl.NumberFormat("en-US").format(
                                    props.products.price
                                )
                            }}
                        </h5>
                        <h5 class="text-gray-900 text-sm text-start font-light mx-2">
                            {{ date }}
                        </h5>
                    </div>
                </div>
                <!--button for deleting a product -->
                <div v-if="$page.props.auth.user.role == 'admin'">
                    <i @click="destroy(props.products.id)"
                        class="text-6xl text-green-900 cursor-pointer bi bi-x-circle text-opacity-30 hover:text-opacity-100 hover:text-red-900 hover:animate-pulse ml-6"></i>
                </div>
                <div v-else>
                    <i
                        class="text-6xl text-gray-400 hover:cursor-not-allowed bi bi-x-circle text-opacity-30 hover:text-opacity-100 ml-6"></i>
                </div>
            </div>
            <div class="flex mt-20 justify-center">
                <div v-if="$page.props.auth.user.role == 'admin'">
                    <button data-bs-toggle="modal" :data-bs-target="' #' + '_' + props.products.id"
                        class="px-5 bg-green-900 text-white font-light uppercase rounded-full shadow-lg hover:bg-green-700 hover:shadow-xl active:shadow-lg transition duration-700 ease-in-out">
                        Edit
                    </button>
                </div>
                <div v-else>
                    <button disabled data-bs-toggle="modal" :data-bs-target="' #' + '_' + props.products.id"
                        class="px-5 bg-gray-400 text-white font-light uppercase rounded-full shadow-lg hover:bg-gray-400 hover:shadow-xl hover:cursor-not-allowed active:shadow-lg transition duration-700 ease-in-out">
                        Edit
                    </button>
                </div>
            </div>
        </div>
    </div>
    <MyModal v-bind:products="products" />
</template>

<script setup>
    import Button from "../Components/MyButton.vue";
    import ProductImage from "./ProductImage.vue";
    import MyModal from "../Components/MyModal.vue";
    import {
        Inertia
    } from "@inertiajs/inertia";
    import {
        getMonth
    } from "tw-elements/dist/src/js/mdb/datepicker/date-utils";
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
            destroy
        };
    };
</script>
