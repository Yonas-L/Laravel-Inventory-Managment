<script setup>
import { ref, reactive, computed } from 'vue'
 defineProps({
  products:Object,
 });
</script>

<template>
 <div  value="{{ products.id }}" class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="editProducts" tabindex="-1" aria-labelledby="editProduct" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class=" text-xl text-center font-serif text-green-900 font-normal leading-normal " id="exampleModalScrollableLabel">
         Edit Product Form  for {{ products.name}}
        </h5>
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative p-4">
      <form>
        <div class="flex flex-col gap-y-3 ">
            <label class="ml-2 text-start" for="name"></label>
            <input required  name="name"  id="name" class=" hover:border-green-500  rounded-xl " type="text" placeholder="Enter Product Name">
            <label class="ml-2 text-start" for="name">Enter Category</label>
            <input required name ="category" class="  hover:border-green-500 rounded-xl"  type="text" placeholder="Enter Product Category">
            <label class="ml-2 text-start" for="name">Enter Price</label>
            <input required name="price" class="  hover:border-green-500    rounded-xl"  type="text" placeholder="Enter Price">
            <label class="ml-2 text-start" for="name">Choose Image</label>
            <input required name="image" class="  hover:border-green-500  rounded-xl"  type="file" placeholder="Choose image">
        </div>

        <div class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">

        <button type="submit"
          class="inline-block w-full mt-2 px-6 py-2.5
           bg-white font-body text-black font-medium
             leading-tight uppercase rounded-xl
             shadow-md hover:bg-green-900
             hover:shadow-lg hover:text-white
           border-green-400 border duration-200
           focus:bg-green-700
            focus:shadow-lg
            ml-1">
          Save changes
        </button>
      </div>
      </form>

      </div>

    </div>
  </div>
</div>

</template>



