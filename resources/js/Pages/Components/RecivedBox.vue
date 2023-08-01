<script setup>
import moment from "moment";
const props = defineProps({
    recivedMessage: Object,
});
</script>
<template>
    <div class="grid justify-start">
        <div
            class="mb-0 container w-auto max-w-sm max-h-fit mx-0 h-auto bg-slate-200 rounded-tl-3xl rounded-bl-none rounded-r-3xl"
        >
            <p
                class="text-justify p-2 font-serif font-semibold text-slate-600 text-sm"
            >
                {{ props.recivedMessage.text }}
            </p>
        </div>
        <div
            class="mt-1 text-sm text-gray-400 font-serif text-left font-extralight"
        >
            {{ moment(props.recivedMessage.created_at).format('hh:ss A')}}
        </div>
    </div>
</template>
