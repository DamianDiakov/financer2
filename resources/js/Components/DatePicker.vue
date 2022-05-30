<script setup>
import { ref } from "vue";
import LitepieDatepicker from "litepie-datepicker";
import moment from "moment";
const emit = defineEmits(["response"]);
const send = () => {
    if (!dateValue.value) return;
    emit("response", dateValue.value);
};
const formatter = ref({
    date: "DD-MM-YYYY",
    month: "MMM",
});
const dateValue = ref(moment().format("DD-MM-YYYY"));
</script>

<template>
    <div class="w-48">
        <LitepieDatepicker
            i18n="bg"
            :keyup="send()"
            placeholder="Дата"
            as-single
            :formatter="formatter"
            v-model="dateValue"
        ></LitepieDatepicker>
    </div>
</template>
