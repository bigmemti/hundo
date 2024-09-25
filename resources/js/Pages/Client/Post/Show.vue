<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Section from '@/Components/Section.vue';
import LandingLayout from '@/Layouts/LandingLayout.vue';
import { ref } from 'vue';

const props = defineProps(['post']);

const form = useForm({
    'message' : null,
    'comment_id' : null
});

let comment_reply = ref(null);

const reply = (id) => {
    comment_reply.value = props.post.comments.find(x => x.id === id)
    form.comment_id = id
}

const noreply = () => {
    comment_reply.value = null
    form.comment_id = null
}
</script>

<template>
    <Head :title="'Post | ' + post.title" />

    <LandingLayout>
        <section class="flex flex-col gap-5 bg-white p-3 mb-5">
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
            <div>
                <p class="text-sm font-bold">
                    {{ post.comments_count }} Comments
                </p>
                <div class="my-8 flex flex-col gap-8">
                    <div class="border-b-2 pb-2 border-b-black" v-for="comment in post.comments.filter(c => c.comment_id == null)"  :key="comment.id">
                        <div class="flex justify-between px-4">
                            <div class="flex flex-col justify-between h-24">
                                <div>
                                    <p class="text-lg font-bold">
                                        {{ comment.user.name }}
                                    </p>
                                    <span class="text-sm text-gray-300 px-1">
                                        {{ comment.created_at }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">
                                        {{ comment.message }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <button class="bg-[#222] px-8 text-sm py-2 hover:bg-rose-600 text-white transition-all duration-300" @click="reply(comment.id)">REPLY</button>
                            </div>
                        </div>
                        <div class="my-4 bg-gray-100 mx-6 px-2 py-2" v-if="comment.replies.length !=0 ">
                            <p class="text-lg font-bold mb-4">
                                Replies:
                            </p>
                            <div v-for="reply in comment.replies" :key="reply.id" class="flex justify-between px-8">
                                <div class="flex flex-col justify-between h-24">
                                    <div>
                                        <p class="text-lg font-bold">
                                            {{ reply.user.name }}
                                        </p>
                                        <span class="text-sm text-gray-300 px-1">
                                            {{ reply.created_at }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">
                                            {{ reply.message }}
                                        </p>
                                    </div>
                                </div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="$page.props.auth.user != null">
                <div class="mt-12 bg-[#ecf0f1] p-4">
                    <h3 class="my-6 font-bold">
                        Post Comment
                    </h3>
                    <div class="flex justify-between px-4 bg-white my-4 p-3" v-if="comment_reply !== null">
                            <div class="flex flex-col justify-between h-24">
                                <div>
                                    <p class="text-lg font-bold">
                                        {{ comment_reply.user.name }}
                                    </p>
                                    <span class="text-sm text-gray-300 px-1">
                                        {{ comment_reply.created_at }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">
                                        {{ comment_reply.message }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <button class="bg-[#222] px-3 text-sm py-2 hover:bg-rose-600 text-white transition-all duration-300" @click="noreply()">
                                    <icon :icon="['fas', 'xmark']" />
                                </button>
                            </div>
                    </div>
                    <form @submit.prevent="form.post(route('post.comment.store', [post.id]), { preserveScroll: true,onSuccess: () => {form.reset('message','comment_id'); comment_reply = null},})" class="flex flex-col gap-6">
                        <textarea v-model="form.message" cols="30" rows="10" placeholder="Message ..."></textarea>
                        <button type="submit" class="px-8 py-2 bg-rose-600 self-center font-bold text-white border border-rose-600 hover:bg-transparent hover:text-rose-600 transition-all duration-300">Post Comment</button>
                    </form>
                </div>
            </div>
        </section>

    </LandingLayout>


</template>

<style>

</style>
