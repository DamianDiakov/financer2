<script setup>
import { computed, ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { debounce } from "lodash/debounce";
import RecurrenceForm from "@/Components/Forms/ReccurenceForm.vue";
import CreateRecurrenceForm from "@/Components/Modals/RecurrenceCreate.vue";

const props = defineProps({
    rec: Object,
    id: Number,
});

const param = ref("");

// in component
function period(value, period) {
    if (value == 1)
        return value + " " + period[0].toUpperCase() + period.slice(1);

    return value + " " + period[0].toUpperCase() + period.slice(1) + "s";
}

function status(active) {
    return active ? "Active" : "Inactive";
}

function classes(active) {
    return active ? "bg-green-400" : "bg-red-400";
}

watch(
    param,
    _.debounce(() => {
        Inertia.visit(route("groups.recurrence", props.id), {
            method: "get",
            only: ["recurrences"],
            preserveState: true,
            preserveScroll: true,
            data: {
                search: param.value,
            },
        });
    }, 250)
);
</script>
<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-4 flex justify-between">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div
                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
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
                    class="block w-80 rounded-lg border border-gray-300 bg-gray-100 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Search for items"
                />
            </div>
            <CreateRecurrenceForm :id="id" />
        </div>
        <table
            class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
        >
            <thead
                class="bg-gray-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Amount</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Period</th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(recurrence, index) in rec"
                    :key="index"
                    class="border-b bg-white hover:bg-gray-200 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                >
                    <th
                        scope="row"
                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                    >
                        {{ recurrence.expense_description }}
                    </th>
                    <td class="px-6 py-4">{{ recurrence.expense_amount }}</td>
                    <td class="px-6 py-4">
                        <span
                            :class="[classes(recurrence.active)]"
                            class="p-1 font-semibold uppercase text-xs text-black"
                        >
                            {{ status(recurrence.active) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        {{ period(recurrence.period_value, recurrence.period) }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <RecurrenceForm :recurrence="recurrence" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
