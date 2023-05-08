<script setup>
</script>
<template>
    <div id="chatRoom" data-modal-placement="bottom-left"
        class="modal fade   top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" tabindex="-1"
        aria-labelledby="editProduct" aria-modal="true" role="dialog">
        <div class="modal-dialog  modal-lg relative  pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0   items-center justify-center p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class=" text-xl text-center font-serif text-green-900 font-normal leading-normal ">
                        Any questions? Let's Chat :)
                    </h5>
                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="flex ">
                    <h5 class=" p-4 text-sm text-start font-serif text-green-900 font-light   ">
                        Last updated
                    </h5>
                </div>

                <div class="modal-body relative p-4">
                    <div class="flex gap-x-5">
                        <h1 class="text-2xl font-light underline underline-offset-2 text-green-800">Channel</h1>
                    </div>
                </div>
                <div class="flex ">
                     <input type="text" placeholder="Ask me Anything...." autofocus class="border-gray-800  h-20 ">
                    <button class="bg-green-800 text-white rounded-full w-20 m-10 h-10">
                        <i class="bi bi-cursor"></i>
                        Send</button>

                </div>
            </div>
        </div>
    </div>
</template>