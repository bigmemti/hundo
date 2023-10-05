<script setup>

defineProps(['post'])
</script>

<template>
    <article class="mb-8 lg:flex lg:gap-4 lg:items-center lg:text-xs">
        <header class="relative overflow-hidden">
            <img class="z-0 lg:w-64 relative hover:scale-110 max-w-full brightness-50 hover:brightness-75 transition-all duration-150" :src="'./storage/' + post.image" alt="">
            <a href="#" class="z-10 absolute bottom-3 left-3 bg-red-600 text-white p-1 px-4">{{ post.category.name }}</a>
        </header>
        <main class="mt-3 flex flex-col gap-3">
            <h3 class="text-xl font-bold ">
                <a href="#" class="hover:text-red-500">
                    {{ post.title }}
                </a>
            </h3>
            <div class="text-gray-400 flex gap-3 text-sm">
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
                <p class="text-gray-400">{{ post.body.substring(0,40) }}...</p>
            </div>
        </main>
    </article>
</template>

<style>

</style>
