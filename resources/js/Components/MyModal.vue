<template>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
         :id="'_'+props.products.id" tabindex="-1" aria-labelledby="editProduct" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0   items-center justify-center p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class=" text-xl text-center font-serif text-green-900 font-normal leading-normal "
                        id="exampleModalScrollableLabel">
                        Edit Product Form for {{props.products.name }} 
                    </h5>
                    <button type="button"
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="flex ">
                    <h5 class=" p-4 text-sm text-start font-serif text-green-900 font-light   ">
                        Last updated / {{ moment(props.products.updated_at).fromNow() }}
                    </h5>
                </div>

                <div class="modal-body relative p-4">
                    <div class="  text-start">
                        <h1 class="font-extrabold m-2 ">Images</h1>
                        <div class="m-2">
                            <img class="rounded-lg " :src="props.products.image" alt="image">
                        </div>
                    </div>
                    <form @submit.prevent>
                        <div class="flex flex-col gap-y-3 ">
                            <label class="ml-2 text-start font-extrabold" for="name">Name</label>
                            <input v-model="form.name" required name="name" id="name"
                                   class=" hover:border-green-500  rounded-xl "
                                   type="text" placeholder="Enter Product Name">
                            <strong>
                                <div v-if="form.errors.name" class="text-red-500 animate__animated animate__shakeX ">
                                    {{ form.errors.name }}
                                </div>
                            </strong>
                            <label class="ml-2 text-start font-extrabold" for="name">Category</label>
                            <input v-model="form.category" required name="category"
                                   class="  hover:border-green-500 rounded-xl" type="text"
                                   placeholder="Enter Product Category">
                            <strong>
                                <div v-if="form.errors.category"
                                     class="text-red-500 animate__animated animate__shakeX ">
                                    {{ form.errors.category }}
                                </div>
                            </strong>

                            <label class="ml-2 text-start font-extrabold" for="name">Price</label>
                            <input v-model="form.price" required name="price"
                                   class="  hover:border-green-500    rounded-xl" type="text"
                                   placeholder="Enter Price">

                            <strong>
                                <div v-if="form.errors.price" class="text-red-500 animate__animated animate__shakeX ">
                                    {{ form.errors.price }}
                                </div>
                            </strong>
                            <label class="ml-2 text-start font-extrabold" for="name">Add another Image</label>
                            <input type="file" @input="form.image = $event.target.files[0]" class="form-control
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding
      border border-solid border-gray-300
      rounded-lg
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="image" name="image">
                        </div>
                        <div
                            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-center p-4 border-t border-gray-200 rounded-b-md">
                            <MyButton @Click="edit(props.products.id)"/>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3"
import MyButton from "@/Pages/Components/MyButton.vue";
import {Inertia} from "@inertiajs/inertia";
import moment from "moment";

// properties
const props = defineProps({
    products: Object,
});



const form = useForm({
    name: props.products.name,
    category: props.products.category,
    image: '',
    price: props.products.price,
    _method: 'put'
})

// functions
const edit = (id) => {
    form.post(route('products.update', id, {
        forceFormData: true
    }));
}
</script>


