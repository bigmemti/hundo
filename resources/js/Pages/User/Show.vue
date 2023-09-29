<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    user : Object
})
</script>

<template>
    <Head title="Users Show" />

     <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Users Show</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col">
                            <p>Id:</p>
                            <span>{{user.id}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Name:</p>
                            <span>{{user.name}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Email:</p>
                            <span>{{user.email}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Verify Email At:</p>
                            <span>{{user.verify_email_at ? user.verify_email_at : 'null'}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Created At:</p>
                            <span>{{user.created_at}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Updated At:</p>
                            <span>{{user.updated_at}}</span>
                        </div>
                        <div class="flex flex-col">
                            <p>Deleted At:</p>
                            <span>{{user.deleted_at ? user.deleted_at : 'null'}}</span>
                        </div>
                        <div class="flex gap-4 mt-4">
                            <Link class="text-lg">edit</Link>
                            <Link class="text-lg">delete</Link>
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
