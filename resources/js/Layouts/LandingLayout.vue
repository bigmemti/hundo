<script setup>
import { Link } from '@inertiajs/vue3';
import Section from '@/Components/Section.vue';

defineProps(['canLogin','canRegister']);
</script>

<template>
    <header>
        <div v-if="canLogin" class="p-6 text-right container">
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
        </div>
    </header>
    <div class="min-h-screen bg-dots-darker bg-center bg-[#ecf0f1] dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <main class="container pt-3">
            <div class=" p-3 flex flex-col lg:grid lg:grid-cols-[8fr,4fr] gap-4">
                <slot />
                <section>
                    <Section>
                        <template #header>
                            Editor’s Pick
                        </template>
                    </Section>
                    <Section>
                        <template #header>
                            Newsletter
                        </template>
                    </Section>
                    <Section>
                        <template #header>
                            Most Popular
                        </template>
                    </Section>
                    <Section>
                        <template #header>
                            Social Networks
                        </template>
                    </Section>

                </section>
            </div>
        </main>
        <footer>
            <div class="bg-[#04091e] text-white">
                <div class="container py-24">
                    <div class="pb-10 lg:flex lg:justify-between">
                        <div class="flex flex-col gap-8 md:grid md:grid-cols-2 lg:grid-cols-4">
                            <div class="flex flex-col items-start">
                                <p class="my-4 text-xl font-bold">Top Products</p>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Managed Website
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300 ">
                                    Manage Reputation
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Power Tools
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Marketing Service
                                </a>
                            </div>
                            <div class="flex flex-col items-start">
                                <p class="my-4 text-xl font-bold">Quick Links</p>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Jobs
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Brand Assets
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Investor Relations
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Terms of Service
                                </a>
                            </div>
                            <div class="flex flex-col items-start">
                                <p class="my-4 text-xl font-bold">Features</p>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Jobs
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Brand Assets
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Investor Relations
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Terms of Service
                                </a>
                            </div>
                            <div class="flex flex-col items-start">
                                <p class="my-4 text-xl font-bold">Resources</p>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Guides
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Research
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Experts
                                </a>
                                <a href="#" class="mt-3  text-md text-stone-600 hover:text-gray-100 transition-all duration-300">
                                    Agencies
                                </a>
                            </div>
                        </div>
                        <div class="my-8 lg:mt-4 space-y-8">
                            <p class="text-xl font-bold">Instagram Feed</p>
                            <div class="grid grid-cols-4 gap-4 max-w-[350px]">
                                <img v-for="index in 8" class="w-16" :key="index" :src="'https://picsum.photos/200?random=' + index">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-8 lg:flex-row lg:justify-between lg:items-center">
                        <div>
                            Copyright ©2023 All rights reserved | This template is made with <icon :icon="['fa-regular', 'fa-heart']"/>  by Colorlib
                        </div>
                        <div class="flex gap-4">
                            <a class="w-10 h-10 flex justify-center items-center bg-gray-800 hover:bg-rose-700 transition-all duration-300" href="#"><icon :icon="['fab','facebook-f']" /></a>
                            <a class="w-10 h-10 flex justify-center items-center bg-gray-800 hover:bg-rose-700 transition-all duration-300" href="#"><icon :icon="['fab','twitter']" /></a>
                            <a class="w-10 h-10 flex justify-center items-center bg-gray-800 hover:bg-rose-700 transition-all duration-300" href="#"><icon :icon="['fab','dribbble']" /></a>
                            <a class="w-10 h-10 flex justify-center items-center bg-gray-800 hover:bg-rose-700 transition-all duration-300" href="#"><icon :icon="['fab','behance']" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>

</style>
