<script setup>
import { Link } from '@inertiajs/vue3';

defineProps(['href']);
</script>
<template>
    <Link :href="href" class="px-4 py-2 bg-sky-600 hover:bg-sky-500 text-white dark:text-inherit dark:bg-sky-800 rounded-2xl dark:hover:bg-sky-600">
        <icon icon="fa-solid fa-eye"/>
    </Link>
</template>

<style scoped>

</style>
