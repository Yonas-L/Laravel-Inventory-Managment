<script setup>
import { ref, reactive, computed } from 'vue'
defineProps({
    products:Object,
})


 // methods
// methods
const destroy = (id) => {
  if(confirm('Are you sure you want to delete' ,{products},' this product?')){
    Inertia.delete(route('products.destroy',id));
  }
  return{destroy}
}
 
  
</script> 

<template>
 <div   class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="deleteProduct" tabindex="-1" aria-labelledby="editProduct" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class=" text-xl text-center font-serif text-green-900 font-normal leading-normal " id="exampleModalScrollableLabel">
         Are You Sure {{ products.name }} ?
        </h5>
        
        
        <button type="button"
          class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
          data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body relative p-4">
     
      <i @click="destroy(products.id)"   data-bs-toggle="modal" data-bs-target="#deleteProduct" class="  text-6xl text-green-900 cursor-pointer bi bi-trash text-opacity-30 hover:text-opacity-100 hover:text-red-900 hover:animate-pulse ml-6"></i>
     
      </div>
   
    </div>
  </div>
</div>
  
</template>
 


 