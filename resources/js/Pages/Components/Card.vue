
<template>
  <div class="animate__animated animate__zoomInDown ">
 <div class="border border-spacing-2  px-4 py-4 rounded-lg shadow-sm border-opacity-25 shadow-zinc-700 bg-white">
           <!-- the flex-row-1 -->
            <div class="flex justify-around">
              <!-- Avatar component -->
              <Avatar/>
            <div class="flex py-6 flex-col  ">
              <div class="grow-0 h-2 ">
                 <h5 class="text-gray-900 text-xl  text-start font-serif mx-2  ">{{products.name}}</h5>
              <h5 class="text-gray-900 text-sm text-start font-light mx-2 ">{{ products.price }}</h5>
              <h5 class="text-gray-900 text-sm text-start font-light mx-2 ">{{ products.category }}</h5>
              <h5 class="text-gray-900 text-sm text-start font-light mx-2  " >{{ products.created_at }}</h5>
              </div>
            </div>
          <i @click="destroy(products.id)" class="  text-6xl text-green-900 cursor-pointer bi bi-x-circle text-opacity-30 hover:text-opacity-100 hover:text-red-900 hover:animate-pulse ml-6"></i>
        </div>
        <div class="flex mt-20 justify-center">
          <button   data-bs-toggle="modal" data-bs-target="#editProducts" type="submit" class=" px-5   bg-green-900 text-white font-light uppercase rounded-full shadow-lg hover:bg-green-700 hover:shadow-xl active:shadow-lg transition duration-700 ease-in-out">Edit</button>
        </div>
  </div>
  </div>
    <MyModal v-bind:products="products" />
</template>

<script setup>
import Button from '../Components/MyButton.vue';
import Avatar from './Avatar.vue';
import MyModal from '../Components/MyModal.vue'
import {Inertia} from '@inertiajs/inertia';
defineProps({
    products:Object,
})

// methods
const destroy = (id) => {
    if(confirm('Are you sure you want to delete this product?')){
        Inertia.delete(route('products.destroy',id));
    }
    return{destroy}
}
</script>


