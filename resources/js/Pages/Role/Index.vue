<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link, useForm } from '@inertiajs/vue3';

    const form = useForm({});
    defineProps(['roles']);
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

<style>
    td, th{
        text-align: center;
        border: 1px black solid;
        @apply dark:border-white;
    }
</style>

<template>
    <Head title="Roles List" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Roles List</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-2">
                        <div class="self-end mx-2 px-4 py-2 bg-green-800 rounded-xl hover:bg-green-600">
                            <Link :href="route('dashboard.role.create')" class="">
                                <icon icon="fa-solid fa-plus" /> create
                            </Link>
                        </div>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="role in roles" :key="role.id">
                                    <td>{{ role.id }}</td>
                                    <td>{{ role.name}}</td>
                                    <td>{{ role.created_at}}</td>
                                    <td class="py-2 space-x-2">
                                        <Link :href="route('dashboard.role.show', [role.id])" class="rounded-2xl px-4 py-2 bg-sky-800 hover:bg-sky-600">
                                            <icon icon="fa-solid fa-eye" />
                                        </Link>
                                        <Link :href="route('dashboard.role.edit', [role.id])" class="rounded-2xl px-4 py-2 bg-yellow-800 hover:bg-yellow-600">
                                            <icon icon="fa-solid fa-edit"  />
                                        </Link>
                                        <button @click="$swal.fire(options).then((result) => (result.isConfirmed)? form.delete(route('dashboard.role.destroy', [role.id])) : null)" class="rounded-2xl px-4 py-2 bg-red-800 hover:bg-red-600">
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
