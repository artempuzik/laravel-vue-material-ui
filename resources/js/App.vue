<script setup lang="ts">
import FileTable from "@/src/views/FileTable.vue";

const props = withDefaults(defineProps<{
    files: []
}>(), {
    files: () => []
});
</script>

<template>
    <file-table :files="files" />
</template>
