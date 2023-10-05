<script setup>
import PostCard from "./PostCard.vue";

defineProps(['posts'])

</script>

<template>
    <div class="bg-blue-950 text-white p-1.5 px-6 font-bold">
        <slot name="header" />
    </div>
    <div class="mt-3">
        <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </div>
</template>

<style>

</style>
