<script setup>
import CreateLink from '@/Components/CreateLink.vue';
import InfoLink from '@/Components/InfoLink.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps(['users']);

</script>

<style>
    td, th{
        text-align: center;
        border: 1px black solid;
        @apply dark:border-white;
    }
</style>

<template>
    <Head title="Users List" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Users List</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-2">
                        <CreateLink :href="route('dashboard.user.create')" />
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name}}</td>
                                    <td>{{ user.email}}</td>
                                    <td>{{ user.created_at}}</td>
                                    <td class="py-2 space-x-2">
                                        <Link  class="rounded-2xl px-4 py-2 bg-sky-800 hover:bg-sky-600">
                                            <icon icon="fa-solid fa-eye" />
                                        </Link>
                                        <InfoLink :href="route('dashboard.user.show', [user.id])" />
                                        <Link :href="route('dashboard.user.edit', [user.id])" class="rounded-2xl px-4 py-2 bg-yellow-800 hover:bg-yellow-600">
                                            <icon icon="fa-solid fa-edit"  />
                                        </Link>
                                        <button @click="$swal.fire(options).then((result) => (result.isConfirmed)? form.delete(route('dashboard.user.destroy', [user.id])) : null)" class="rounded-2xl px-4 py-2 bg-red-800 hover:bg-red-600">
                                            <icon icon="fa-solid fa-trash" />
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
