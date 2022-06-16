<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import GroupLayout from "@/Layouts/Group.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import SimpleModal from "@/Components/Modals/SimpleModal.vue";
const props = defineProps({
    group: Object,
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
            <SimpleModal> Delete </SimpleModal>
        </GroupLayout>
    </BreezeAuthenticatedLayout>
</template>
