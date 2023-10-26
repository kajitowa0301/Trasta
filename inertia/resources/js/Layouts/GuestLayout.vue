<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import App from '@/Layouts/App.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <App></App>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <Link :href="route('index')">
                <ApplicationLogo class="w-20 h-20 fill-current hover:text-pink-400" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
        <div>
        </div>
    </div>
</template>
