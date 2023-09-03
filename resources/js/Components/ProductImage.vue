<script setup>
defineProps({
    Image:String
})


</script>
<template>
  <img :src="Image"  class="h-40 w-40 rounded-full object-cover md:h-20 md:w-20 "  alt="Image"/>
</template>



