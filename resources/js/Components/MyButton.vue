
<template>
  <!-- if the user is an admin -->
  <div v-if="$page.props.auth.user.role=='admin'">
      <button  type="submit" class=" form-control bg-green-900 text-white font-large    uppercase rounded-xl shadow-lg hover:bg-green-700 hover:shadow-xl  focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-700 ease-in-out">Add to List</button>
  </div>
 
  <!-- if a user is not an admin -->
  <div v-else>
    <button type="submit" disabled class="  form-control px-24 py-4 bg-gray-400 text-white font-large    uppercase rounded-full shadow-lg hover:cursor-not-allowed hover:shadow-xl  focus:shadow-lg focus:outline-none focus:ring-0  active:shadow-lg transition duration-700 ease-in-out">Add to List</button>
  </div>
</template>

<script setup>
</script>
