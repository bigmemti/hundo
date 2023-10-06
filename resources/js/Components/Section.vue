<script setup>

</script>

<template>
    <div class="bg-white p-4">
        <div class="bg-[#04091e] text-white p-1.5 px-6 font-bold">
            <slot name="header" />
        </div>
        <div class="mt-3">
            <slot  />
        </div>
    </div>
</template>

<style>

</style>
