<template>
    <div
        class="shadow-xl shadow-emerald-300 sm:scale-105 md:scale-105 md:scale-x-110 sm:scale-x-125 bg-white rounded-xl p-7"
    >
        <form @submit.prevent>
            <div class="form-floating mb-4 mt-4">
                <input
                    v-model="form.name"
                    type="text"
                    class="form-control block w-full required px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    required
                    placeholder="Enter name"
                    id="name"
                    name="name"
                />
                <label for="itemName" class="text-gray-700 p-3"
                    >Item Name</label
                >
                <strong>
                    <div
                        v-if="form.errors.name"
                        class="text-red-500 animate__animated animate__shakeX"
                    >
                        {{ form.errors.name }}
                    </div>
                </strong>
            </div>

            <div class="form-floating mb-4">
                <input
                    v-model="form.category"
                    type="text"
                    class="form-control block w-full required px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    required
                    id="Category"
                    placeholder="Enter category"
                    name="category"
                />
                <label for="category" class="text-gray-700 p-3">Category</label>
                <strong>
                    <div
                        v-if="form.errors.category"
                        class="text-red-500 animate__animated animate__shakeX"
                    >
                        {{ form.errors.category }}
                    </div>
                </strong>
            </div>
            <div class="form-floating mb-4">
                <input
                    required
                    type="file"
                    @input="form.image = $event.target.files[0]"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="image1"
                    name="image1"
                />
                <strong>
                    <div
                        v-if="form.errors.image"
                        class="text-red-500 animate__animated animate__shakeX"
                    >
                        {{ form.errors.image }}
                    </div>
                </strong>
            </div>
            <div class="form-floating mb-10">
                <input
                    v-model="form.price"
                    type="number"
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="price"
                    required
                    placeholder="Enter price"
                    name="price"
                />
                <label for="price" class="text-gray-700 p-3">Price</label>
                <strong>
                    <div
                        v-if="form.errors.price"
                        class="text-red-500 animate__animated animate__shakeX"
                    >
                        {{ form.errors.price }}
                    </div>
                </strong>
            </div>
            <!-- do storing logic -->
            <div class="flex">
                <MyButton class="w-full" @click="addProduct" />
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import MyButton from "./MyButton.vue";

const form = useForm({
    name: null,
    category: null,
    image: null,
    price: null,
});

// Create a function to store information
const addProduct = () => {
    form.post(
        route("products.store", {
            forceFormData: true,
        })
    );
};
</script>
