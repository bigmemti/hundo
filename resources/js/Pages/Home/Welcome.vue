<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PostShow from '@/Components/PostShow.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    posts : {
        type : Object
    }
});
</script>

<template>
    <Head title="Welcome" />

    <div class="min-h-screen bg-dots-darker bg-center bg-[#ecf0f1] dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <!-- <header></header> -->
        <main class="container pt-3">
            <div class="bg-white p-3 flex flex-col">
                <PostShow :posts="posts">
                    <template #header>
                        Latest News
                    </template>
                </PostShow>
            </div>
        </main>
        <!-- <footer></footer> -->
        <!-- <div v-if="canLogin" class="p-6 text-right container">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div> -->


    </div>
</template>

<style>
.container {
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .container {
    max-width: 540px;
  }
}

@media (min-width: 768px) {
  .container {
    max-width: 720px;
  }
}

@media (min-width: 992px) {
  .container {
    max-width: 960px;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1140px;
  }
}
</style>
