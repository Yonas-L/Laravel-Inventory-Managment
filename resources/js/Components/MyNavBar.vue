<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Light_Dark_Mode from '@/Components/Light_Dark_Mode.vue';
import MyButton from '@/Pages/Components/MyButton.vue';
import ShowUserTable from '@/Components/ShowUserTable.vue';
import {Link,useForm} from "@inertiajs/inertia-vue3"
const props = defineProps({
       searchedUser: Object,
    });
const form = useForm({
  searchValue : null,
});
const searchAdmin = ()=>{ 
  form.get(route('searchAdmin'),{
    preserveState:true,
  });
  return{searchAdmin}}

  const searchUser = ()=>{ 
  form.get(route('searchUser'),{
    preserveState:true,
  });
  return{searchUser}}
</script>
<template>
  <div class="">

    <nav class=" bg-transparent relative  p-2 ">
  <div class="container-fluid w-full justify-evenly flex  place-items-center  md:flex flex-wrap md:place-items-center md:justify-between px-2 sm:px-6 md:px-6">
      <!-- Application Logo  -->
    <div class="hover:opacity-20">
      <ApplicationLogo/>
    </div>
    <!--! This is if the logged in user is an admin -->
    <div class="" v-show="$page.props.auth.user.role == 'admin' ">
        <i class="text-white mx-4  text-2xl bi bi-search"/>
      <input @keyup="searchAdmin" id="searchVal" class="sm:h-10 sm:w-96 rounded-md md:h-10 md:w-96 w-36" v-model="form.searchValue" placeholder="Search for anything / anyone"  type="text"/>
    </div>

    <!--! This is if the logged in user is normal user -->
    <div v-show="$page.props.auth.user.role == 'user'">
      <i class="text-white mr-5 text-2xl bi bi-search"/>
      <input @keyup="searchUser" id="searchVal" class="sm:h-10 sm:w-96 rounded-md md:h-10 md:w-96 w-40 m-auto" v-model="form.searchValue" placeholder="Search for products Name / Category"  type="text"/>
    </div>
 <Link class="text-white  " :href="route('logout')" method="post" as="button">Logout</Link>
  </div>
</nav>

  </div>
<!-- Display the users on a table -->
  <div  v-for="user in props.searchedUser" :key="user.id">
    <div v-show="user.name ==form.searchValue  || user.email== form.searchValue">
        <ShowUserTable :user="user"/>
    </div>
  
  </div>

</template>
