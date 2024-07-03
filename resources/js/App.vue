<script setup lang="ts">
import FileTable from "@/src/views/FileTable.vue";

withDefaults(defineProps<{
    files: []
}>(), {
    files: () => []
});
</script>

<template>
    <file-table :files="files" />
</template>
