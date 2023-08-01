<script setup>
import moment from "moment";
const props = defineProps({
    sentMessage: Object,
});
</script>
<template>
    <div class="grid justify-end">
        <div>
            <!-- <h1>{{ props.sentMessages }}</h1> -->
            <div
                class="mb-0 container w-auto max-w-sm max-h-fit mx-0 h-auto bg-green-900 rounded-tr-3xl rounded-br-none rounded-l-3xl"
            >
                <p
                    class="text-justify p-2 font-serif font-semibold text-white text-sm"
                >
                    {{ props.sentMessage.text }}
                </p>
            </div>
            <div
                class="mt-1 text-sm text-gray-400 font-serif text-right font-extralight"
            >
                {{
                    moment(props.sentMessage.created_at)
                       .format('hh:mm A')
                }}
            </div>
        </div>
    </div>
</template>
