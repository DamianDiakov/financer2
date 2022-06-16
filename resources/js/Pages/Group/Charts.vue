<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3";
import GroupLayout from "@/Layouts/Group.vue";
import BarChart from "@/Components/Charts/BarChart.vue";
import PieChart from "@/Components/Charts/PieChart.vue";

const props = defineProps({
    group: Object,
    bar: Array,
    pie: Object,
});

const bar_data = {
    label: "money",
    backgroundColor: "#f87979",
    data: props.bar,
};
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
            <div
                class="flex flex-col justify-center md:flex-row md:justify-around"
            >
                <BarChart :data="bar_data" />
                <PieChart :data="props.pie" />
            </div>
        </GroupLayout>
    </BreezeAuthenticatedLayout>
</template>
