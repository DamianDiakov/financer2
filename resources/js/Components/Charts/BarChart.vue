<script setup>
import { Bar } from "vue-chartjs";
import { ref, defineProps } from "vue";
import {
    Chart as ChartJS,
    LineElement,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";

ChartJS.register(
    Title,
    LineElement,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

const props = defineProps({
    data: Object,
    chartId: {
        type: String,
        default: "bar-chart",
    },
    datasetIdKey: {
        type: String,
        default: "label",
    },
    width: {
        type: Number,
        default: 500,
    },
    height: {
        type: Number,
        default: 500,
    },
    cssClasses: {
        default: "w-full md:w-2/6",
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
const chartData = ref({
    labels: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ],
    datasets: [props.data],
});

const chartOptions = ref({
    responsive: true,
});
</script>
<script>
export default {
    name: "BarChart",
};
</script>

<template>
    <Bar
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
