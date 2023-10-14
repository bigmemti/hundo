<script setup>
import { Link } from '@inertiajs/vue3';

defineProps(['href']);
</script>
<template>
    <div class="self-end mx-2 px-4 py-2 bg-yellow-600 hover:bg-yellow-500 text-white dark:text-inherit dark:bg-yellow-800 rounded-xl dark:hover:bg-yellow-600">
        <Link :href="href" class="">
            <icon icon="fa-solid fa-plus" /> create
        </Link>
    </div>
</template>

<style scoped>

</style>
