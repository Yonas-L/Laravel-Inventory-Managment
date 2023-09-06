<script setup>
defineProps({
    Image: String,
});
</script>
<template>
    <img
        :src="Image"
        class="h-24 w-72 shrink rounded-r-full duration-700 sm:h-28 object-cover md:rounded-full md:object-cover md:h-24 md:w-24"
        alt="Image"
    />
</template>
