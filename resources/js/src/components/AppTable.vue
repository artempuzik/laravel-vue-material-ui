<script setup lang="ts">
import * as API from '@/src/api'
import {defaultQuery, defaultSort} from "@/src/config";
import {ref, watch} from "vue";
import {useRoute} from "vue-router";
import {ElNotification} from "element-plus";

const route = useRoute();
const q = ref(defaultQuery);

const sortKey = ref(defaultSort.sortKey);
const sortOrder = ref(defaultSort.sortOrder);

const files = ref([]);

const isLoading = ref(false)

const fetchData = async () => {
    try {
        isLoading.value = true
        const response = await API.files.getFiles({
            params: {
                ...q.value,
                sortKey: sortKey.value,
                sortOrder: sortOrder.value
            }
        });
        if(response.status === 200) {
            files.value = response.data.data;
        }
    } catch (e: any) {
        ElNotification({
            title: 'Error',
            message: e.message,
            type: 'error',
        })
    } finally {
        isLoading.value = false
    }
};
const refresh = async () => {
    q.value = {
        ...defaultQuery,
        ...route.query,
    };
    await fetchData();
};

const handleSort = ({ prop, order }) => {
    sortKey.value = prop;
    sortOrder.value = order === 'ascending' ? 'asc' : 'desc';
    fetchData();
};

watch(
    () => route.query,
    async () => {
        await refresh();
    },
    { deep: true}
);

const svg = `
        <path class="path" d="
          M 30 15
          L 28 17
          M 25.61 25.61
          A 15 15, 0, 0, 1, 15 30
          A 15 15, 0, 1, 1, 27.99 7.5
          L 15 15
        " style="stroke-width: 4px; fill: rgba(0, 0, 0, 0)"/>
      `

</script>

<template>

    <el-table
        :data="files"
        style="width: 100%"
        @sort-change="handleSort"
        v-loading="isLoading"
        element-loading-text="Loading..."
        :element-loading-spinner="svg"
        element-loading-svg-view-box="-10, -10, 50, 50"
        empty-text="No results were found for your request. Try changing filters"
    >
        <el-table-column prop="name" label="Name" sortable="custom"></el-table-column>
        <el-table-column prop="price" label="Price" sortable="custom"></el-table-column>
        <el-table-column prop="bedrooms" label="Bedrooms" sortable="custom"></el-table-column>
        <el-table-column prop="bathrooms" label="Bathrooms" sortable="custom"></el-table-column>
        <el-table-column prop="storeys" label="Storeys" sortable="custom"></el-table-column>
        <el-table-column prop="garages" label="Garages" sortable="custom"></el-table-column>
    </el-table>
</template>

<style scoped>

</style>
