<script setup>
import { ref } from "vue";
import GroupNavLink from "@/Components/GroupNavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    id: Number,
});
</script>

<template>
    <div class="min-h-screen flex">
        <nav class="min-h-screen w-40 flex flex-col items-center gap-3 pt-12">
            <GroupNavLink
                :href="route('charts.index', props.id)"
                :active="route().current('charts.index')"
            >
                Graphs
            </GroupNavLink>
            <GroupNavLink
                :href="route('groups.show', props.id)"
                :active="route().current('groups.show')"
            >
                Expenses
            </GroupNavLink>
            <GroupNavLink
                :href="route('groups.recurrence', props.id)"
                :active="route().current('groups.recurrence')"
            >
                Recurrent
            </GroupNavLink>
            <GroupNavLink
                :href="route('groups.members', props.id)"
                :active="route().current('groups.members')"
            >
                Members
            </GroupNavLink>
            <GroupNavLink
                :href="route('groups.settings', props.id)"
                :active="route().current('groups.settings')"
            >
                Settings
            </GroupNavLink>
        </nav>
        <main class="flex-1">
            <div class="py-12">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg"
                    >
                        <div
                            class="p-6 bg-white border-b border-gray-200 min-h-screen"
                        >
                            <slot />
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
