<script setup>
defineProps({
    Image:String
})


</script>
<template>
  <img :src="Image"  class="rounded-full wrap w-12 h-12"  alt="Image"/>
</template>



