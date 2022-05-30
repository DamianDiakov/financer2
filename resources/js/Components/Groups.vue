<script setup>
import { Link } from "@inertiajs/inertia-vue3";
const props = defineProps({
    groups: Object,
});
</script>

<template>
    <div class="grid grid-cols-4 gap-4">
        <Link
            :href="route('groups.show', group.id)"
            v-for="group in props.groups"
            :key="group.id"
            class="flex cursor-pointer rounded-3xl border-2 border-solid border-gray-600 border-opacity-60 bg-gray-100 bg-opacity-95 p-4 transition-colors duration-500 hover:border-transparent hover:shadow-md hover:shadow-indigo-700 hover:bg-indigo-400 dark:bg-gray-800 dark:hover:bg-indigo-600"
        >
            <img
                class="h-12 w-12 object-cover rounded-lg"
                :src="'https://picsum.photos/id/' + group.id + '/200'"
                alt=""
            />
            <div class="flex flex-col justify-center ml-4">
                <p class="font-semibold text-gray-900 dark:text-gray-300">
                    {{ group.title }}
                </p>
                <p class="text-justify text-black dark:text-gray-100">
                    {{ group.description }}
                </p>
            </div>
        </Link>
    </div>
</template>
