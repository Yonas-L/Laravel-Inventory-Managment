<script setup>
defineProps({
    Image:String
})


</script>
<template>
  <img :src="$page.props.auth.user.avatar"  class="rounded-full wrap w-12 h-12"  alt="Image"/>
</template>



