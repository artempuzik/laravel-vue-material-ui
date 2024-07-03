<script setup>
import { ref, watch } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const route = useRoute();
const router = useRouter();

const filters = ref({
    name: '',
    price_min: '',
    price_max: '',
    bedrooms: '',
    bathrooms: '',
    storeys: '',
    garages: ''
});

watch(() => route.query, (newQuery) => {
    for (let key in filters.value) {
        filters.value[key] = newQuery[key] || '';
    }
}, { immediate: true });

const updateUrl = () => {
    const query = { ...route.query };

    for (let key in filters.value) {
        if (filters.value[key]) {
            query[key] = filters.value[key];
        } else {
            delete query[key];
        }
    }

    router.push({ path: route.path, query });
};

watch(() => filters, updateUrl, {deep: true});

</script>

<template>
    <el-input v-model="filters.name" placeholder="Filter by Name" style="margin: 10px 0;" />
    <el-input v-model="filters.price_min" placeholder="Filter by Price" style="margin: 10px 0;" />
    <el-input v-model="filters.price_max" placeholder="Filter by Price" style="margin: 10px 0;" />
    <el-input v-model="filters.bedrooms" placeholder="Filter by Bedrooms" style="margin: 10px 0;" />
    <el-input v-model="filters.bathrooms" placeholder="Filter by Bathrooms" style="margin: 10px 0;" />
    <el-input v-model="filters.storeys" placeholder="Filter by Storeys" style="margin: 10px 0;" />
    <el-input v-model="filters.garages" placeholder="Filter by Garages" style="margin: 10px 0;" />
</template>

<style scoped></style>
