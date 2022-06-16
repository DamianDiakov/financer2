<script setup>
import { onMounted, reactive, ref } from "vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import { useForm } from "@inertiajs/inertia-vue3";
const props = defineProps({
    groupId: Number,
    date: String,
});
const form = useForm({
    groupId: props.groupId,
    amount: "",
    description: "",
    date: props.date,
});

function submit() {
    form.post(route("expense.store"), {
        onSuccess: () => form.reset(),
    });
}

const toggled = ref(false);
</script>

<template>
    <form
        v-if="toggled"
        @submit.prevent="submit"
        class="grid grid-cols-4 gap-4 pt-5"
    >
        <BreezeInput
            id="date"
            type="hidden"
            class="mt-1 w-full"
            v-model="props.date"
        />
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
        <div>
            <BreezeLabel for="date" value="Date" />
            <BreezeInput
                id="date"
                type="date"
                class="mt-1 w-full"
                v-model="form.expense_date"
                autocomplete="off"
            />
        </div>
        <div class="flex gap-3 mt-5">
            <button
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
                @click="toggled = !toggled"
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

    <div v-else class="flex justify-center p-5">
        <button
            @click="(toggled = !toggled), form.reset()"
            class="min-w-auto transition-rotation flex h-12 w-12 items-center rounded-full bg-gray-300 p-2 font-semibold duration-300 ease-in-out hover:bg-gray-500 hover:shadow-lg"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-12 w-12 text-white"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4v16m8-8H4"
                />
            </svg>
        </button>
    </div>
</template>
