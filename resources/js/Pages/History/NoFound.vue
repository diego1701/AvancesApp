<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CollapseMenu from '@/Layouts/CollapseMenu.vue';


</script>

<template>
    <AuthenticatedLayout>
        <div class="flex">
      <CollapseMenu />
      <div class="container mx-auto px-4 py-8">
   <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">No disponible!</strong>
    <span class="block sm:inline">Usuario no autorizado para navegar en este sitio.</span>
</div>
      </div>
        </div>
</AuthenticatedLayout>
</template>
