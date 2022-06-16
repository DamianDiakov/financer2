<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import GroupLayout from "@/Layouts/Group.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import ReccurenceTable from "@/Components/Tables/RecurrenceTable.vue";
const props = defineProps({
    group: Object,
    recurrences: Array,
});
</script>

<template>
    <Head :title="group.title" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ group.title }}
            </h2>
        </template>
        <GroupLayout :id="group.id">
            <ReccurenceTable
                :id="group.id"
                :rec="props.recurrences"
            ></ReccurenceTable>
        </GroupLayout>
    </BreezeAuthenticatedLayout>
</template>
