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
    <div class="col-12 mb-4">
        <div class="col-xl-6">
            <el-input v-model="filters.name" placeholder="Filter by Name" clearable />
        </div>
        <div class="row col-xl-6 my-2">
            <div class="col-xl-3 d-flex flex-column">
                <label>Filter by Price min</label>
                <el-input-number v-model="filters.price_min" clearable />
            </div>
            <div class="col-xl-3 d-flex flex-column">
                <label>Filter by Price max</label>
                <el-input-number v-model="filters.price_max" clearable />
            </div>
        </div>
        <div class="row col-xl-12 my-2">
            <div class="col-xl-3 d-flex flex-column">
                <label>Filter by Bedrooms</label>
                <el-input-number v-model="filters.bedrooms" clearable />
            </div>
            <div class="col-xl-3 d-flex flex-column">
                <label>Filter by Bathrooms</label>
                <el-input-number v-model="filters.bathrooms" clearable />
            </div>
            <div class="col-xl-3 d-flex flex-column">
                <label>Filter by Storeys</label>
                <el-input-number v-model="filters.storeys" clearable />
            </div>
            <div class="col-xl-3 d-flex flex-column">
                <label>Filter by Garages</label>
                <el-input-number v-model="filters.garages" clearable />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
