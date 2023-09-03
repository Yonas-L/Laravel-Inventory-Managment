<script setup>
defineProps({
    Image:String
})


</script>
<template>
  <img :src="Image"  class="rounded-full   w-14 h-14"  alt="Image"/>
</template>



