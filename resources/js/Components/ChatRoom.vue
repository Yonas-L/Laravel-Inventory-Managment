<script setup>
import UserCard from "@/Components/UserCard.vue";
import ChatUser from "@/Components/ChatUser.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
// import route from "vendor/tightenco/ziggy/src/js";
const props = defineProps({
    simpleUsers: Object,
});

// create a form reciver
const form = useForm({
    branchName: null,
    toId:null
});
// serch for a branch request
const searchBranch = () => {
    form.get(route("findUserBranch"), {
        preserveState: true,
    });
    return { searchBranch };
};
// Open the chatRoom modal
const openRoom = (toId) => {
    alert('hi');
    return form.get(route("roomPortal", toId), {
        preserveState: true,
    });
};
</script>

<template>
    <div
        id="chatRoom"
        class="modal animate__animated animate__slideInUp animate_fast fade"
        aria-labelledby="editProduct"
        aria-modal="true"
        role="dialog"
        aria-hidden="true"
    >
        <div
            class="modal-dialog fixed top-52 -right-1 mx-8 modal-md pointer-events-auto"
        >
            <div
                class="modal-content modal-dialog-scrollable border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"
            >
                <div
                    class="modal-header flex items-center justify-between p-4 border-b border-gray-200 rounded-t-md"
                >
                    <!--! 2 Heders -->
                    <h5
                        class="text-xl text-center font-serif text-green-900 font-normal leading-normal"
                    >
                        Welcome To The
                    </h5>

                    <i
                        data-bs-dismiss="modal"
                        class="cursor-pointer hover:-rotate-45 round hover:transition-all duration-500 hover:duration-500 bi bi-plus box-content text-5xl p-1 text-black border-none rounded-sm opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                    />
                </div>
                <div class="mx-auto border-b border-gray-200 mb-1 container">
                    <div class="flex justify-start place-items-center m-2">
                        <input
                            @keyup="searchBranch"
                            v-model="form.branchName"
                            name="branchName"
                            id="branchName"
                            class="h-10 rounded-md w-auto border-green-700"
                            type="text"
                            placeholder="Search"
                        />
                        <i class="bi bi-search text-2xl mx-2" />
                    </div>
                </div>

                <div class="modal-body max-h-72 text-sm text-justify">
                    <!--! User Component -->

                    <div class="m-2">
                        <div v-for="user in props.simpleUsers" :key="user.id">
                            <UserCard
                                @click="openRoom(user.id)"
                                class="animate__animated animate__zoomIn"
                                data-bs-toggle="modal"
                                :data-bs-target="'#_' + user.email"
                                :userInfo="user"
                            />
                        </div>
                    </div>
                </div>
                <div
                    class="modal-footer p-2 border-t border-gray-200 font-thin text-sm"
                >
                    <div class="divide-x-2">
                        <h1 class="text-center">This is footer</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--! all modals with suparate id -->
    <div v-for="user in props.simpleUsers" :key="user.id">
        <ChatUser :singleUser="user" />
    </div>
</template>
