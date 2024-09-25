<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Section from '@/Components/Section.vue';
import PostCard from '@/Components/PostCard.vue';
import LandingLayout from '@/Layouts/LandingLayout.vue';

const props = defineProps(['category']);
</script>

<template>
    <Head :title="'Category | ' + category.name" />

    <LandingLayout>
        <section class="flex flex-col gap-5 bg-white p-3 mb-5">
            <Section>
                <template #header>
                    Latest News
                </template>
                <PostCard v-for="post in category.posts" :key="post.id" :post="post" />
            </Section>
        </section>

    </LandingLayout>


</template>

<style>

</style>
