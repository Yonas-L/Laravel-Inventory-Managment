<script setup>
import UserAvatar from "@/Components/UserAvatar.vue";
// import ChatUser from "@/Components/ChatUser.vue";
</script>
<template>
    <!-- This is the chat room modal -->
    <!-- <ChatUser /> -->
    <div
       
        class="hover:transition-all hover:duration-500 duration-500 container cursor-pointer hover:bg-gray-300 grid grid-cols-2 w-full h-auto mb-2 rounded-lg mx-auto bg-gray-200"
    >
        <!--! user details only -->
        <div class="w-48 space-x-2 flex justify-start">
            <div class="ml-2 mt-2">
                <UserAvatar class="" />
            </div>
            <div class="place-items-center m-2 text-sm text-slate-500">
                <h1 class="font-serif font-extralight text-justify">
                    {{ $page.props.auth.user.name }}
                </h1>
                <h1 class="font-extralight font-serif text-justify">
                    Addis Ababa
                </h1>
                <h1 class="font-serif font-extralight text-justify">
                    {{ $page.props.auth.user.role }}
                </h1>
            </div>
        </div>

        <!--! Status info -->
        <div class="flex justify-end place-items-center">
            <i class="bi bi-dot text-4xl text-green-500" />
        </div>
    </div>
</template>
