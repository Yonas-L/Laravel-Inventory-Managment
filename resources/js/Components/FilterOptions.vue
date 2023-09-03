<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    date: null,
    priceRange: null,
});

const searchDate = async () => {
    form.get(route("searchByDate"), {
        preserveState: true,
    });
    return { searchDate };
};
const filterPrice = async () => {
    form.get(route("filterPrice"), {
        preserveState: true,
    });
    return { filterPrice };
};
</script>
<template>
    <div>
        <input
            @change="searchDate"
            v-model="form.date"
            type="date"
            name="date"
            id="date"
            class="border-gray-300 text-2xl bg-gray-100 text-opacity-30 w-auto h-10 cursor-pointer hover:underline text-emerald-700"
        />
    </div>
    <div>
        <h1>{{ form.priceRange }}</h1>
        <input
            @change="filterPrice"
            v-model="form.priceRange"
            type="range"
            min="0"
            max="100000"
            class="w-auto scale-110 bg-green-800 text-green-800"
            name="priceRange"
            id="priceRange"
        />
    </div>
</template>
