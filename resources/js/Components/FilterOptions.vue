<script setup>
import {Head,Link } from '@inertiajs/inertia-vue3';
import {useForm} from "@inertiajs/inertia-vue3";

const form= useForm({
    date:null,
    priceRange:null
}); 

const searchDate = ()=>{
    form.get(route('searchByDate'),{
        preserveState:true
    }); 
    return {searchDate}
}
const filterPrice =()=>{
   form.get(route('filterPrice'),{
    preserveState:true
   });
return {filterPrice}
}



</script>
<template>
    <Head title="Filter Results"/>
    <input @change="searchDate" v-model="form.date" type="date" name="date" id="date" class=" border-gray-300 text-2xl bg-gray-100 text-opacity-30  w-50 h-10 cursor-pointer hover:underline decoration-1 text-emerald-700" />
    <input @change="filterPrice" v-model="form.priceRange" type="range" min="0"  max="100000"   class="w-80  bg-green-800  text-green-800 " name="priceRange" id="priceRange">
    <h1>{{ form.priceRange }}</h1>
    <!-- <i @click="filterPrice" name="priceRange" val="form.priceRange" class="text-2xl text-green-900 cursor-pointer bi bi-filter text-opacity-30 hover:text-opacity-100 hover:text-green-900 hover:animate-pulse ml-6"></i> -->
</template>


