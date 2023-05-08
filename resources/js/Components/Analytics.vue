<template>
    <div  class=" animate__animated animate__bounce ">
        <h1 class="m-10 font-extralight  rounded-md text-4xl text-center text-green-900  cursor-pointer">
            +{{ analytics }} Items in store</h1>
    </div>

    <!-- <h1 class="my-4">{{ $analytics }}</h1> -->
</template>
<script setup>
defineProps({
    analytics:String
})
</script>
