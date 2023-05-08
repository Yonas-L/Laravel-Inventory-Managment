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
<nav class=" bg-green-900 relative w-full flex flex-wrap items-center justify-between p-4 mb-10">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
      <!-- Application Logo  -->
    <div class="hover:opacity-20">
      <ApplicationLogo/>
    </div>
    <!--! This is if the logged in user is an admin -->
    <div v-show="$page.props.auth.user.role == 'admin' ">
        <i class="text-white mx-4 text-2xl bi bi-search"/>
      <input @keyup="searchAdmin" id="searchVal" class="rounded-md h-10 w-96 m-auto" v-model="form.searchValue" placeholder="Search for anything / anyone"  type="text"/>
    </div>

    <!--! This is if the logged in user is normal user -->
    <div v-show="$page.props.auth.user.role == 'user'">
      <i class="text-white mr-5 text-2xl bi bi-search"/>
      <input @keyup="searchUser" id="searchVal" class="rounded-md h-10 w-96 m-auto" v-model="form.searchValue" placeholder="Search for products Name / Category"  type="text"/>
    </div>
 <Link class="text-white " :href="route('logout')" method="post" as="button">Logout</Link>
  </div>
</nav>

<!-- Display the users on a table -->
  <div  v-for="user in props.searchedUser" :key="user.id">
    <div v-show="user.name ==form.searchValue  || user.email== form.searchValue">
        <ShowUserTable :user="user"/>
    </div>
  
  </div>

</template>
