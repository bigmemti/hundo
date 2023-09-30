<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
const form = useForm({
    'title': null,
    'body': null,
    'image': null,
});
defineProps(['errors', 'category'])
</script>

<template>
    <Head title="Post Create" />

     <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Post Create</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="form.post(route('category.post.store', [category.id]))">
                            <div class="flex flex-col gap-2">
                                <label for="title">Title:</label>
                                <input class="dark:bg-gray-800 dark:text-white" type="text" v-model="form.title" id="title">
                                <div v-if="errors.title" class="text-red-600">
                                    {{ errors.title }}
                                </div>
                                <label for="body">body:</label>
                                <textarea class="dark:bg-gray-800 dark:text-white" v-model="form.body" id="body" cols="30" rows="10">

                                </textarea>
                                <div v-if="errors.body" class="text-red-600">
                                    {{ errors.body }}
                                </div>
                                <label for="image">Image:</label>
                                <input type="file" @input="form.image = $event.target.files[0]" />
                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                </progress>
                                <div v-if="errors.image" class="text-red-600">
                                    {{ errors.image }}
                                </div>
                            </div>

                            <div class="flex gap-4 mt-4">
                                <button type="submit" class="px-4 py-2 bg-green-800 hover:bg-green-600 rounded-xl">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
 label{
    @apply font-bold;
 }
</style>
