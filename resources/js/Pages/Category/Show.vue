<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({});
defineProps({
    category : Object,
    posts : Array
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
    <Head title="Category Show" />

     <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Category Show</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col">
                            <p>Id:</p>
                            <span>{{category.id}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Name:</p>
                            <span>{{category.name}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Image:</p>
                            <img :src="'/storage/' + category.image" class="w-64" />
                        </div>
                        <div class="flex flex-col">
                            <p>Created At:</p>
                            <span>{{category.created_at}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Updated At:</p>
                            <span>{{category.updated_at}}</span>
                        </div>
                        <div class="flex gap-4 mt-4">
                           <Link :href="route('category.edit', [category.id])" class="rounded-2xl px-4 py-2 bg-yellow-800 hover:bg-yellow-600">
                                <icon icon="fa-solid fa-edit"  /> edit
                            </Link>
                            <button @click="$swal.fire(options).then((result) => (result.isConfirmed)? form.delete(route('category.destroy', [category.id])) : null)" class="rounded-2xl px-4 py-2 bg-red-800 hover:bg-red-600">
                                <icon icon="fa-solid fa-trash" /> delete
                            </button>
                        </div>
                        <div class="flex flex-col mt-10 gap-5">
                            <p class="self-center text-2xl flex gap-2 items-baseline">
                                Posts
                                <Link :href="route('category.post.create', [category.id])" class="text-sm rounded-full bg-green-900 hover:bg-green-700 p-1.5 px-2.5" >
                                    <icon icon="fa-solid fa-plus" />
                                </Link>
                            </p>
                            <table>
                                <thead>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    <tr v-for="post in posts" :key="post.id">
                                        <td> {{ post.id }} </td>
                                        <td> {{ post.title }} </td>
                                        <td><Link class="px-4 py-2 my-2 bg-gray-900 hover:bg-gray-700 rounded-full" :href="route('user.show',[post.user_id])">{{post.user.name}}</Link></td>
                                        <td> {{ post.created_at }} </td>
                                        <td class="py-2 space-x-2">
                                            <Link :href="route('post.show', [post.id])" class="rounded-2xl px-4 py-2 bg-sky-800 hover:bg-sky-600">
                                                <icon icon="fa-solid fa-eye" />
                                            </Link>
                                            <Link :href="route('post.edit', [post.id])" class="rounded-2xl px-4 py-2 bg-yellow-800 hover:bg-yellow-600">
                                                <icon icon="fa-solid fa-edit"  />
                                            </Link>
                                            <button @click="$swal.fire(options).then((result) => (result.isConfirmed)? form.delete(route('post.destroy', [category.id])) : null)" class="rounded-2xl px-4 py-2 bg-red-800 hover:bg-red-600">
                                                <icon icon="fa-solid fa-trash" />
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="py-4 ">
                                            <Link :href="route('category.post.index' , [category.id])">
                                                More Post
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
