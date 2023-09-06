<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    date: null,
    priceRange: null,
});

const searchDate = async () => {
    form.get(route("searchByDate"), {
        preserveState: true,
        preserveScroll: true,
    });
    return { searchDate };
};
const filterPrice = async () => {
    form.get(route("filterPrice"), {
        preserveState: true,
        preserveScroll: true,
    });
    return { filterPrice };
};
</script>
<template>
    <div
        class="grid grid-cols-1 place-items-center sm:flex sm:justify-evenly sm:place-items-center md:flex md:justify-start md:place-items-center md:gap-x-5 px-4"
    >
        <div>
            <input
                @change="searchDate"
                v-model="form.date"
                type="date"
                name="date"
                id="date"
                class="mb-1 text-xl h-9 bg-white text-gray-400 duration-700 rounded-xl focus:text-green-900 cursor-pointer"
            />
        </div>
        <div class="">
            <div v-show="form.priceRange === null">
                <h1 class="text-center text-white text-md">Filter by price</h1>
            </div>
            <h1 class="text-center text-white text-xl">
                {{ form.priceRange }}
            </h1>
            <input
                @change="filterPrice"
                v-model="form.priceRange"
                type="range"
                min="0"
                max="100000"
                class="gap-y-6 md:mt-0 sm:mt-0 scale-110"
                name="priceRange"
                id="priceRange"
            />
        </div>
    </div>
</template>
