<script setup>
    defineProps({
        user:Object
    });
</script>
<template>
    <div class=" animate__animated animate__fadeIn flex justify-center mx-auto">
        <div class="flex flex-col">
  <div class="overflow-x-auto rounded-lg sm:-mx-6 lg:-mx-8">
    <div class="inline-block  min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <h1 class="text-xl text-gray-500 my-3 font-light">User Management</h1>
        <table class="min-w text-center text-sm font-light">
          <thead
            class=" bg-gray-500 rounded-2xl border-b font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
            <tr>
              <th scope="col" class=" px-6 py-4">#</th>
              <th scope="col" class=" px-6 py-4">Name</th>
              <th scope="col" class=" px-6 py-4">Email</th>
              <th scope="col" class=" px-6 py-4">role</th>
              <th scope="col" class=" px-6 py-4">View</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b dark:border-neutral-500">
              <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ user.id }}</td>
              <td class="whitespace-nowrap  px-6 py-4">{{ user.name }}</td>
              <td class="whitespace-nowrap  px-6 py-4">{{ user.email }}</td>
              <td class="whitespace-nowrap  px-6 py-4">{{ user.role }}</td>
              <td class="whitespace-nowrap  px-6 py-4"><i class="bi bi-eye cursor-pointer hover:alert hover:text-green-400 text-md"></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
    </div>
 
</template>