<script setup>
import { Head } from '@inertiajs/vue3';
import Section from '@/Components/Section.vue';
import PostCard from '@/Components/PostCard.vue';
import LandingLayout from '@/Layouts/LandingLayout.vue';

defineProps(['posts']);
</script>

<template>
    <Head title="Welcome" />
    <LandingLayout>
        <section class="flex flex-col gap-5">
            <Section>
                <template #header>
                    Latest News
                </template>
                <PostCard v-for="post in posts" :key="post.id" :post="post" />
            </Section>
            <Section>
                <template #header>
                    Popular Posts
                </template>
                <PostCard v-for="post in posts" :key="post.id" :post="post" />
            </Section>
            <Section>
                <template #header>
                    Relavent Stories
                </template>
                <PostCard v-for="post in posts" :key="post.id" :post="post" />
            </Section>
        </section>
    </LandingLayout>
</template>

<style>

</style>
