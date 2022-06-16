<script setup>
import { reactive, ref, watch } from "vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import { Inertia } from "@inertiajs/inertia";
const props = defineProps({
    expense: Object,
    groupId: Number,
});
const form = reactive({
    groupId: props.groupId,
    id: props.expense.id,
    amount: props.expense.amount,
    description: props.expense.description,
    date: props.expense.date,
});

function submit() {
    Inertia.put(
        route("expense.update", {
            expense: props.expense.id,
            groupId: props.groupId,
        }),
        form
    );
}

function remove() {
    Inertia.delete(
        route("expense.destroy", {
            expense: props.expense.id,
            groupId: props.groupId,
            date: props.expense.date,
        })
    );
}
</script>

<template>
    <form @submit.prevent="" class="grid grid-cols-4 gap-4 pt-5">
        <BreezeInput id="id" type="hidden" v-model="expense.id" />

        <div>
            <BreezeLabel for="amount" value="Amount" />
            <BreezeInput
                id="amount"
                type="text"
                class="mt-1 w-full"
                v-model="form.amount"
                autocomplete="off"
            />
        </div>
        <div>
            <BreezeLabel for="description" value="Description" />
            <BreezeInput
                id="description"
                type="text"
                class="mt-1 w-full"
                v-model="form.description"
                autocomplete="off"
            />
        </div>

        <div class="flex gap-3 mt-5">
            <button
                @click="submit()"
                class="min-w-auto transition-rotation flex h-12 w-12 items-center rounded-full bg-green-300 p-2 font-semibold text-white duration-300 ease-in-out hover:bg-green-500"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-12 w-12"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7"
                    />
                </svg>
            </button>
            <button
                @click="remove()"
                class="min-w-auto transition-rotation flex h-12 w-12 items-center rounded-full bg-red-300 p-2 font-semibold text-white duration-300 ease-in-out hover:bg-red-500"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-12 w-12"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>
    </form>
</template>
