<script setup>
defineProps({
    Image:String
})


</script>
<template>
  <img :src="Image"  class="rounded-full wrap w-20 h-20"  alt="Image"/>
</template>



