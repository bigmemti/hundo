<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Section from '@/Components/Section.vue';

defineProps(['post']);
</script>

<template>
<Head :title="'Post | ' + post.title" />

<div class="min-h-screen bg-dots-darker bg-center bg-[#ecf0f1] dark:bg-gray-900 selection:bg-rose-500 selection:text-white">
    <main class="container pt-3">
        <div class=" p-3 flex flex-col lg:grid lg:grid-cols-[8fr,4fr] gap-4">
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
            <section>
                <Section>
                    <template #header>
                        Editor’s Pick
                    </template>
                </Section>
                <Section>
                    <template #header>
                        Newsletter
                    </template>
                </Section>
                <Section>
                    <template #header>
                        Most Popular
                    </template>
                </Section>
                <Section>
                    <template #header>
                        Social Networks
                    </template>
                </Section>

            </section>
        </div>
    </main>
</div>
</template>

<style>
.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
}
</style>
