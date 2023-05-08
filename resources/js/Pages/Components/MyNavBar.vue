<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Light_Dark_Mode from '@/Components/Light_Dark_Mode.vue';
 
</script>

<template>
<nav class="relative w-full flex flex-wrap items-center justify-between p-5">
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
      <!-- Application Logo  -->
    <div class="hover:opacity-20">
      <ApplicationLogo/>
    </div>
    <!-- Light/Dark Mode Toggler  -->
    <div class="hover:opacity-20">
      <Light_Dark_Mode/>
    </div>
  </div>
</nav>
</template>
