<script setup>
import UserAvatar from "@/Components/UserAvatar.vue";
import moment from "moment";
import UserCard from "./UserCard.vue";
</script>
<template>
    <div
        id="chatUser"
        class="modal animate__animated animate__fadeIn fade"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        aria-labelledby="chatWithUser"
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
                    class="modal-header flex items-center place-items-center justify-between border-b border-gray-200 rounded-t-md"
                >
                    <!--! 2 User detail and status section -->
                    <div class="w-48 space-x-2 flex justify-start">
                        <div class="ml-2 mt-2">
                            <UserAvatar />
                        </div>
                        <div
                            class="place-items-center mt-4 text-sm text-slate-500"
                        >
                            <h1 class="font-serif font-extralight text-justify">
                                {{ $page.props.auth.user.name }}
                            </h1>
                            <h1 class="font-extralight font-serif text-justify">
                                Active 3 second ago
                            </h1>
                        </div>
                    </div>

                    <i
                        data-bs-toggle="modal"
                        data-bs-target="#chatRoom"
                        class="cursor-pointer hover:-rotate-90 hover:bg-slate-200 round hover:transition-all duration-500 hover:duration-500 bi bi-arrow-up box-content text-2xl p-1 text-black border-none rounded-full opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 ml-2 hover:text-black hover:opacity-75 hover:no-underline"
                    />
                </div>

                <div
                    class="modal-body min-w-full max-h-72 text-sm text-justify"
                >
                    <div class="m-2">
                        <div class="grid grid-cols-2 gap-x-4">
                            <!--! Recived chatBox -->
                            <div class="flex justify-start">
                                <UserCard />
                            </div>
                            <!--! Sent chatBox -->
                            <div class="flex justify-end">
                                <UserCard />
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="flex gap-x-4 p-2 border-t border-gray-200 font-thin text-sm"
                >
                    <!-- ! Writing message section -->
                    <div class="divide-x-2">
                        <textarea
                        autofocus
                        cols="30"
                        rows="1"
                            class="font-sans font-normal outline-none  rounded-xl transition-all duration-1000 border-white"
                            placeholder="Type here...."
                            type="text"
                            name="message"
                            id="message"
                        />
                    </div>
                    <!-- ! Send button -->
                    <i
                        class="cursor-pointer  hover:bg-slate-200 round hover:transition-all duration-500 hover:duration-500 bi bi-arrow-right box-content text-2xl p-1 text-green-800 border-none rounded-full opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 ml-2 hover:text-black hover:opacity-75 hover:no-underline"
                    />
                    <!-- ! Send button -->
                    <i
                        class="cursor-pointer rotate-90 hover:bg-slate-200 round hover:transition-all duration-500 hover:duration-500 bi bi-paperclip box-content text-2xl p-1 text-black border-none rounded-full opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 ml-2 hover:text-black hover:opacity-75 hover:no-underline"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
