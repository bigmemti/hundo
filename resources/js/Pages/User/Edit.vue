<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
const form = useForm({
    'name': props.user.name,
    'email': props.user.email,
    'password' : ''
});

const props = defineProps(['user','errors']);
</script>

<template>
    <Head title="User Create" />

     <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">User Edit</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="form.put(route('dashboard.user.update', [user.id]))">
                            <div class="flex flex-col">
                                <label for="name">Name:</label>
                                <input class="dark:bg-gray-800 dark:text-white" type="text" v-model="form.name" id="name">
                                <div v-if="errors.name" class="text-red-600">
                                    {{ errors.name }}
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label for="email">Email:</label>
                                <input class="dark:bg-gray-800 dark:text-white" type="email" v-model="form.email" id="email">
                                <div v-if="errors.email" class="text-red-600">
                                    {{ errors.email }}
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <label for="password">Password:</label>
                                <input class="dark:bg-gray-800 dark:text-white" type="password" v-model="form.password" id="password">
                                <div v-if="errors.password" class="text-red-600">
                                    {{ errors.password }}
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
