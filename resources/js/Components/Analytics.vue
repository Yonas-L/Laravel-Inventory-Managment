<script setup>
import flasher from "@flasher/flasher";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    analytics: String,
    messages: Object,
});
// shared error or success flash notification messages
flasher.render(props.messages);
</script>

<template>
    <div class="flex justify-center place-items-center">
        <h1 class="m-10 font-serif text-xl text-center text-green-900">
            {{ props.analytics }} Items in store
        </h1>
        <Link :href="route('productReport')">
            <h1 class="text-center text-green-900 bi bi-download"></h1>
        </Link>
    </div>

    <!-- <h1 class="my-4">{{ $analytics }}</h1> -->
</template>
