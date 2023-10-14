<script setup>
import {useForm } from '@inertiajs/vue3';


const form = useForm({});

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
defineProps(['href']);
</script>
<template>
    <button @click="$swal.fire(options).then((result) => (result.isConfirmed)? form.delete(route('dashboard.user.destroy', [user.id])) : null)" class="rounded-2xl px-4 py-2 bg-red-800 hover:bg-red-600">
        <icon icon="fa-solid fa-trash" />
    </button>
</template>

<style scoped>

</style>
