<script >
import {Head, Link,useForm} from "@inertiajs/inertia-vue3"
import MyButton from "./MyButton.vue"
 
 export default {

  props:{
      errors:Object
    },
  
    setup() {
      
        const form = useForm({
            name: null,
            category: null,
            image: null,
            price: null,
        });
        return { form};
    },
    components: { MyButton },
  
  }
 
</script>
<template>
     
 
    <div class="grid md:grid-cols-1 sm:grid-cols-1  mx-28  ">
      <form @submit.prevent="form.post(route('products.store'),{onSuccess: () =>  form.reset()})" >
        <div class="form-floating mb-4 mt-4   ">
      <input   v-model="form.name" type="text" class="form-control 
      block
      w-full
      required
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding
      border border-solid border-gray-300
      rounded-full
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required placeholder="Enter name" id="price" name="name">
      <label for="itemName" class="text-gray-700 p-3">Item Name</label>
      <strong><div  v-if="errors.name" class="text-red-500  ">
        {{ errors.name }}
      </div></strong> 
    </div>
    
    <div class="form-floating mb-4  ">
      <input v-model="form.category"  type="text" class="form-control
      block
      w-full
      required
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding
      border border-solid border-gray-300
      rounded-full
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required id="Category" placeholder="Enter category" name="category">
      <label for="category" class="text-gray-700 p-3">Category</label>
     <strong><div  v-if="errors.category" class="text-red-500  ">
        {{ errors.category }}
      </div></strong> 
    </div>
    <div class="form-floating mb-4 ">
      <input type="file"   @input="form.image" class="form-control
      block
      w-full
      required
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding
      border border-solid border-gray-300
      rounded-full
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required name="image">
      
    </div>
      <div class="form-floating mb-10   ">
      <input v-model="form.price" type="number" class="form-control
      block
      w-full
      px-3
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding
      border border-solid border-gray-300
      rounded-full
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="price" required placeholder="Enter price" name="price">
      <label for="price" class="text-gray-700 p-3">Price</label>
      <strong><div  v-if="errors.price" class="text-red-500 ">
        {{ errors.price }}
      </div></strong> 
    </div>
    <!-- do storing logic -->
   <MyButton :disabled="form.processing" />
      </form>
  </div>
</template>



 