<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import GroupLayout from "@/Layouts/Group.vue";
import { Head } from "@inertiajs/inertia-vue3";
import DatePicker from "@/Components/DatePicker.vue";
import { computed, ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import ExpensesForm from "@/Components/Forms/ExpensesForm.vue";
import AddExpenseForm from "@/Components/Forms/AddExpenseForm.vue";

const props = defineProps({
    group: Object,
    expenses: Object,
    current_date: String,
});
const date = ref(null);

watch(date, (newDate) => {
    Inertia.get(
        route("groups.show", props.group.id),
        { date: newDate },
        { preserveScroll: true, preserveState: true },
        { only: ["expenses", "current_date"] }
    );
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
            <date-picker
                @response="(dateValue) => (date = dateValue)"
            ></date-picker>
            <add-expense-form
                v-if="date != null"
                :groupId="group.id"
                :date="date"
                :key="date"
            ></add-expense-form>

            <div class="flex flex-col-reverse">
                <div v-for="e in expenses" :key="e.id">
                    <expenses-form
                        :expense="e"
                        :groupId="group.id"
                    ></expenses-form>
                </div>
            </div>
        </GroupLayout>
    </BreezeAuthenticatedLayout>
</template>
