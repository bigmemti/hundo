<script setup>
import {Link} from '@inertiajs/vue3';

defineProps(['post'])
</script>

<template>
    <article class="mb-8 lg:gap-2 lg:items-center lg:grid lg:grid-cols-[5fr,7fr]">
        <header class="relative overflow-hidden">
            <img class="z-0 lg:w-64 relative hover:scale-110 brightness-50 hover:brightness-75 transition-all duration-150" :src="'/storage/' + post.image" alt="">
            <Link :href="route('category.show', [post.category.id])" class="z-10 absolute bottom-3 left-3 lg:text-xs bg-red-600 text-white p-1 px-4">{{ post.category.name }}</Link>
        </header>
        <main class="mt-3 flex flex-col gap-3">
            <h3 class="text-xl font-bold ">
                <a :href="route('post.show', [post.id])" class="hover:text-red-500">
                    {{ post.title }}
                </a>
            </h3>
            <div class="text-gray-500 flex gap-3 text-sm">
                <a href="#" class="flex gap-1 items-center hover:text-red-500">
                    <icon icon="fa-regular fa-user"/>
                    {{ post.user.name }}
                </a>
                <span class="flex gap-1 items-center">
                    <icon :icon="['far', 'calendar-days']" />
                    {{ post.created_at }}
                </span>
                <a href="#" class="flex gap-1 items-center hover:text-red-500">
                    <icon :icon="['far', 'comment']" />
                    {{ post.comments_count }} Comments
                </a>
            </div>
            <div>
                <p class="text-gray-600 lg:text-sm">{{ post.body.substring(0,100) }}...</p>
            </div>
        </main>
    </article>
</template>

<style>

</style>
