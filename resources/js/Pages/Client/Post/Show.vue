<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Section from '@/Components/Section.vue';
import LandingLayout from '@/Layouts/LandingLayout.vue';

defineProps(['post']);
</script>

<template>
    <Head :title="'Post | ' + post.title" />

    <LandingLayout :canLogin="canLogin" :canRegister="canRegister">
        <section class="flex flex-col gap-5 bg-white p-3">
            <article class="mb-8 lg:gap-2 lg:items-center">
                <header >
                    <img class="brightness-75" :src=" '/storage/' + post.image" alt="">
                </header>
                <main class="mt-6 flex flex-col gap-3 px-2">
                    <a href="#" class=" lg:text-xs bg-rose-600 text-white p-1 px-4 self-start">{{ post.category.name }}</a>
                    <h3 class="text-2xl font-bold ">
                        <p>
                            {{ post.title }}
                        </p>
                    </h3>
                    <div class="text-gray-500 flex gap-3 text-sm">
                        <a href="#" class="flex gap-1 items-center hover:text-rose-500">
                            <icon icon="fa-regular fa-user"/>
                            {{ post.user.name }}
                        </a>
                        <span class="flex gap-1 items-center">
                            <icon :icon="['far', 'calendar-days']" />
                            {{ post.created_at }}
                        </span>
                        <a href="#" class="flex gap-1 items-center hover:text-rose-500">
                            <icon :icon="['far', 'comment']" />
                            {{ post.comments_count }} Comments
                        </a>
                    </div>
                    <div>
                        <p class="text-gray-600 lg:text-sm">{{ post.body }}</p>
                    </div>
                </main>
            </article>
            <p>
                {{ post.comments_count }} Comments
            </p>
            <div>
                <div></div>
                <div class="mt-12 bg-[#ecf0f1] p-4">
                    <h3 class="my-6 font-bold">
                        Post Comment
                    </h3>
                    <form action="" class="flex flex-col gap-6">
                        <textarea name="" id="" cols="30" rows="10" placeholder="Message ..."></textarea>
                        <button type="submit" class="px-8 py-2 bg-rose-600 self-center font-bold text-white border border-rose-600 hover:bg-transparent hover:text-rose-600 transition-all duration-300">Post Comment</button>
                    </form>
                </div>
            </div>
        </section>

    </LandingLayout>


</template>

<style>

</style>
