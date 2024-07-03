<script setup lang="ts">
import * as API from '@/src/api'
import {defaultQuery, defaultSort} from "@/src/config";
import {ref, watch} from "vue";
import {useRoute} from "vue-router";

const route = useRoute();
const q = ref(defaultQuery);

const sortKey = ref(defaultSort.sortKey);
const sortOrder = ref(defaultSort.sortOrder);

const files = ref([]);

const fetchData = async () => {
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
};
const refresh = async () => {
    for (const key in route.query) {
        console.log(route.query[key])
    }
    q.value = {
        ...defaultQuery,
        ...route.query,
    };
    await fetchData();
};

const handleSort = ({ prop, order }) => {
    console.log(prop, order)
    sortKey.value = prop;
    sortOrder.value = order === 'ascending' ? 'asc' : 'desc';
    fetchData();
};

watch(
    () => route.query,
    async () => {
        console.log(route.query)
        await refresh();
    },
    { deep: true, immediate: true }
);
</script>

<template>
    <el-table :data="files" style="width: 100%" @sort-change="handleSort">
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
