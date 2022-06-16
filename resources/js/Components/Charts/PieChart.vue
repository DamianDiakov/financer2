<script setup>
import { Pie } from "vue-chartjs";
import { ref, defineProps } from "vue";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    ArcElement,
    CategoryScale,
} from "chart.js";

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale);

const props = defineProps({
    data: Object,
    chartId: {
        type: String,
        default: "pie-chart",
    },
    width: {
        type: Number,
        default: 400,
    },
    height: {
        type: Number,
        default: 400,
    },
    cssClasses: {
        default: "w-full md:w-2/6 ",
        type: String,
    },
    styles: {
        type: Object,
        default: () => {},
    },
    plugins: {
        type: Object,
        default: () => {},
    },
});

const chartData = ref(props.data);

const chartOptions = ref({
    responsive: true,
});
</script>
<script>
export default {
    name: "PieChart",
};
</script>

<template>
    <Pie
        :chart-options="chartOptions"
        :chart-data="chartData"
        :chart-id="props.chartId"
        :dataset-id-key="props.datasetIdKey"
        :plugins="props.plugins"
        :css-classes="props.cssClasses"
        :styles="props.styles"
        :width="props.width"
        :height="props.height"
    />
</template>
