<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import GroupLayout from "@/Layouts/Group.vue";

const props = defineProps({
    group: Object,
});
</script>

<template>
    <Head title="Groups" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Groups
            </h2>
        </template>
        <GroupLayout :id="group.id">
            <div class="mx-2 text-lg">Members</div>
            <div class="p-4">
                <div class="relative mt-1 mb-3">
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 mr-1 flex items-center pr-3"
                    >
                        <svg
                            class="h-5 w-5 text-gray-500 dark:text-gray-400"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="table-search"
                        v-model="param"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-100 p-2.5 pr-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Search for members"
                    />
                </div>

                <hr class="bg-black" />

                <div id="wrapper" class="mt-2 grid md:grid-cols-2 gap-5">
                    <div
                        class="flex border-l-2 border-gray-500 shadow-md transition duration-200 ease-in-out hover:bg-gray-200"
                    >
                        <img
                            src="https://picsum.photos/200"
                            alt="Missing"
                            class="my-1 mr-4 ml-2 h-14 rounded-full"
                        />
                        <div class="py-1">
                            <span class="text-lg"> Svetoslav</span>
                            <hr />
                            <span class="font-mono text-sm"> Role</span>
                        </div>
                        <div class="flex w-full items-center justify-end">
                            <button
                                class="flex h-8 w-8 items-center justify-center rounded-full"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7 text-gray-700 mr-2 transition duration-150 ease-in hover:rotate-45 hover:scale-110 hover:text-black"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div
                        class="flex border-l-2 border-gray-500 shadow-md transition duration-200 ease-in-out hover:bg-gray-200"
                    >
                        <img
                            src="https://picsum.photos/200"
                            alt="Missing"
                            class="my-1 mr-4 ml-2 h-14 rounded-full"
                        />
                        <div class="py-1">
                            <span class="text-lg"> Svetoslav</span>
                            <hr />
                            <span class="font-mono text-sm"> Role</span>
                        </div>
                        <div class="flex w-full items-center justify-end">
                            <button
                                class="flex h-8 w-8 items-center justify-center rounded-full"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-7 w-7 text-gray-700 mr-2 transition duration-150 ease-in hover:rotate-45 hover:scale-110 hover:text-black"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                    />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </GroupLayout>
    </BreezeAuthenticatedLayout>
</template>
