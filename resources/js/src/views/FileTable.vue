<!-- resources/js/components/FilesTable.vue -->
<template>
    <div>
        <el-input v-model="filters.name" placeholder="Filter by Name" style="margin: 10px 0;" />
        <el-input v-model="filters.price" placeholder="Filter by Price" style="margin: 10px 0;" />
        <el-input v-model="filters.bedrooms" placeholder="Filter by Bedrooms" style="margin: 10px 0;" />
        <el-input v-model="filters.bathrooms" placeholder="Filter by Bathrooms" style="margin: 10px 0;" />
        <el-input v-model="filters.storeys" placeholder="Filter by Storeys" style="margin: 10px 0;" />
        <el-input v-model="filters.garages" placeholder="Filter by Garages" style="margin: 10px 0;" />

        <el-table :data="filteredFiles" style="width: 100%" @sort-change="handleSort">
            <el-table-column prop="name" label="Name" sortable="custom"></el-table-column>
            <el-table-column prop="price" label="Price" sortable="custom"></el-table-column>
            <el-table-column prop="bedrooms" label="Bedrooms" sortable="custom"></el-table-column>
            <el-table-column prop="bathrooms" label="Bathrooms" sortable="custom"></el-table-column>
            <el-table-column prop="storeys" label="Storeys" sortable="custom"></el-table-column>
            <el-table-column prop="garages" label="Garages" sortable="custom"></el-table-column>
        </el-table>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
    files: {
        type: Array,
        required: true
    }
});

const filters = ref({
    name: '',
    price: '',
    bedrooms: '',
    bathrooms: '',
    storeys: '',
    garages: ''
});

const sortKey = ref('');
const sortOrder = ref('');

const filteredFiles = computed(() => {
    return props.files
        .filter(file => {
            return Object.keys(filters.value).every(key => {
                return (
                    filters.value[key] === '' ||
                    String(file[key]).toLowerCase().includes(String(filters.value[key]).toLowerCase())
                );
            });
        })
        .sort((a, b) => {
            if (sortKey.value) {
                const order = sortOrder.value === 'ascending' ? 1 : -1;
                if (a[sortKey.value] < b[sortKey.value]) return -order;
                if (a[sortKey.value] > b[sortKey.value]) return order;
                return 0;
            }
            return 0;
        });
});

const handleSort = ({ prop, order }) => {
    sortKey.value = prop;
    sortOrder.value = order;
};
</script>

<style scoped>
/* Add your styles here */
</style>
