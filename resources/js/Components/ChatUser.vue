<script setup></script>
<template>
    <div
        id="chatUser"
        class="modal z-[3000] fade"
        aria-labelledby="editProduct"
        aria-modal="true"
        role="dialog"
        aria-hidden="true"
        
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-dialog-centered h-96 modal-lg pointer-events-auto"
        >
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"
            >
                <div
                    class="modal-header flex items-center justify-between p-4 border-b border-gray-200 rounded-t-md"
                >
                    <!--! 2 Heders -->
                    <h5
                        class="text-xl text-center font-serif text-green-900 font-normal leading-normal"
                    >
                        Let't Talk
                    </h5>
                    <button
                        type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>

                <div class="modal-body text-sm text-justify">
                    <!--! User Chat Component -->
                    <h1>Lets talk Yoni!</h1>
                </div>
                <div
                    class="modal-footer p-2 border-t border-gray-200 font-thin text-sm text-center"
                >
                    <div class="divide-x-2">
                        <h1>This is footer</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
