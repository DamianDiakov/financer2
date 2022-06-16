<script setup>
import { ref } from "vue";
import { onClickOutside } from "@vueuse/core";

const isOpen = ref(false);
const modal = ref(null);

onClickOutside(modal, () => (isOpen.value = false));
</script>

<template>
    <button
        @click="isOpen = true"
        class="rounded bg-red-600 px-6 py-2 text-white shadow"
        type="button"
    >
        Delete
    </button>

    <Transition name="modal">
        <div
            v-show="isOpen"
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-700 bg-opacity-60"
        >
            <!-- class="backdrop overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex" -->
            <div
                ref="modal"
                class="w-3/5 rounded-md bg-white p-6 shadow-xl md:w-5/12"
            >
                <p class="mb-4 text-center text-lg">
                    Are you sure you want to delete this group ?
                </p>
                <div class="flex flex-col gap-3">
                    <button class="rounded bg-red-600 px-6 py-2 text-blue-100">
                        Delete
                    </button>
                    <button
                        @click="isOpen = false"
                        class="rounded border border-blue-600 px-6 py-2 text-blue-800"
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </Transition>
</template>

<style scoped>
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease-in-out;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}
</style>
