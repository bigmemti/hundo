<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({});
defineProps({
    post : Object
})

const options = {
        title: 'Are you sure?',
        text: 'You can find it in the trash!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#666',
        cancelButtonText:'Cancel',
        confirmButtonText: 'Yes, delete it!'
    };
</script>

<template>
    <Head title="Post Show" />

     <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Post Show</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-3">
                        <div class="flex flex-col">
                            <p>Id:</p>
                            <span>{{post.id}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Title:</p>
                            <span>{{post.title}}</span>
                        </div>
                        <div class="flex flex-col items-start">
                            <p>Author:</p>
                            <Link class="px-4 py-2 my-2 bg-gray-900 hover:bg-gray-700 rounded-full" :href="route('dashboard.user.show',[post.user_id])">{{post.user.name}}</Link>
                        </div>
                        <div class="flex flex-col items-start">
                            <p>Category:</p>
                            <Link class="px-4 py-2 my-2 bg-gray-900 hover:bg-gray-700 rounded-full" :href="route('dashboard.category.show',[post.category_id])">{{post.category.name}}</Link>
                        </div>
                        <div class="flex flex-col">
                            <p>Image:</p>
                            <img :src="'/storage/' + post.image" class="w-64" />
                        </div>
                        <div class="flex flex-col">
                            <p>Body:</p>
                            <span>{{post.body}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Created At:</p>
                            <span>{{post.created_at}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Updated At:</p>
                            <span>{{post.updated_at}}</span>
                        </div>
                        <div class="flex gap-4 mt-4">
                           <Link :href="route('dashboard.post.edit', [post.id])" class="rounded-2xl px-4 py-2 bg-yellow-800 hover:bg-yellow-600">
                                <icon icon="fa-solid fa-edit"  /> edit
                            </Link>
                            <button @click="$swal.fire(options).then((result) => (result.isConfirmed)? form.delete(route('dashboard.post.destroy', [post.id])) : null)" class="rounded-2xl px-4 py-2 bg-red-800 hover:bg-red-600">
                                <icon icon="fa-solid fa-trash" /> delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
 p{
    @apply font-bold;
 }
</style>
