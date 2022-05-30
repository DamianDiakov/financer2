<script setup>
import { ref } from "vue";
import GroupNavLink from "@/Components/GroupNavLink.vue";

import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <div class="min-h-screen flex">
        <nav class="min-h-screen w-40 flex flex-col items-center gap-3 pt-12">
            <GroupNavLink> Graphs </GroupNavLink>
            <GroupNavLink> Expenses </GroupNavLink>
            <GroupNavLink> Members </GroupNavLink>
            <GroupNavLink> Settings </GroupNavLink>
        </nav>
        <main class="flex-1">
            <slot />
        </main>
    </div>
</template>
