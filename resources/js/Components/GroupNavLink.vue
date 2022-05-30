<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
    props.active
        ? "inline-flex items-center px-1 pt-1 text-base font-medium leading-5 text-gray-900 focus:outline-none  transition duration-150 ease-in-out"
        : "inline-flex items-center px-1 pt-1 text-base font-medium leading-5 text-gray-500 hover:text-gray-900  focus:outline-none focus:text-gray-800 transition duration-150 ease-in-out"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
