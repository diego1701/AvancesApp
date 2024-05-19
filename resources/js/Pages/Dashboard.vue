<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CollapseMenu from '@/Layouts/CollapseMenu.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!--<template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>-->
        <div class="flex h-screen bg-gray-100">
        <CollapseMenu></CollapseMenu>
    <!-- Contenido Principal -->
    <div class="flex-1">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Has iniciado sesión!</div>
                </div>
            </div>
        </div>
    </div>
</div>
    </AuthenticatedLayout>
</template>
