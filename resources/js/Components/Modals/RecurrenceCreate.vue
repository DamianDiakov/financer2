<script setup>
import { ref } from "vue";
import { onClickOutside } from "@vueuse/core";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeButton from "@/Components/Button.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

const isOpen = ref(false);
const modal = ref(null);

const group = defineProps({
    id: Number,
});

const form = useForm({
    group_id: group.id,
    amount: "",
    description: "",
    period: 1,
    period_value: "",
});

const submit = () => {
    console.log(form);
    // return;
    Inertia.post(route("recurrence.store"), form, {
        onFinish: () => {
            isOpen.value = false;
            form.reset;
        },
    });
};
</script>

<template>
    <BreezeButton @click="isOpen = true"> Create Recurrence </BreezeButton>
    <Teleport to="body">
        <Transition name="modal">
            <div
                v-show="isOpen"
                class="fixed inset-0 z-50 flex items-center justify-center bg-gray-700 bg-opacity-60"
            >
                <div
                    ref="modal"
                    class="w-2/3 rounded-md bg-white p-6 shadow-xl md:w-5/12"
                >
                    <form class="grid gap-5" @submit.prevent="">
                        <div>
                            <BreezeLabel for="amount" value="Amount" />
                            <BreezeInput
                                id="amount"
                                type="text"
                                v-model="form.amount"
                                class="mt-1 block w-full"
                            />
                        </div>
                        <div>
                            <BreezeLabel
                                for="description"
                                value="Description"
                            />
                            <BreezeInput
                                id="Description"
                                v-model="form.description"
                                type="text"
                                class="mt-1 block w-full"
                            />
                        </div>
                        <div class="mt-5">
                            <BreezeLabel for="period" value="Period" />

                            <div class="inline-flex gap-3 w-full">
                                <select
                                    v-model="form.period"
                                    name="period"
                                    class="shadow-sm w-32 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    id=""
                                >
                                    <option value="day">Days</option>
                                    <option value="month">Months</option>
                                </select>
                                <input
                                    v-model="form.period_value"
                                    class="dark:shadow-sm-light w-14 rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    type="number"
                                    min="1"
                                    max="31"
                                />
                                <div
                                    class="flex items-center w-full justify-end gap-6"
                                >
                                    <BreezeButton @click="submit()"
                                        >Create</BreezeButton
                                    >
                                    <BreezeButton
                                        class="bg-gray-600"
                                        @click="isOpen = false"
                                        >Cancel</BreezeButton
                                    >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>

<style scoped>
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease-in-out;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}
</style>
