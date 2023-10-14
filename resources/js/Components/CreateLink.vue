<script setup>
import { Link } from '@inertiajs/vue3';

defineProps(['href']);
</script>
<template>
    <div class="self-end mx-2 px-4 py-2 bg-green-600 hover:bg-green-500 text-white dark:text-inherit dark:bg-green-800 rounded-xl dark:hover:bg-green-600">
        <Link :href="href" class="">
            <icon icon="fa-solid fa-plus" /> create
        </Link>
    </div>
</template>

<style scoped>

</style>
