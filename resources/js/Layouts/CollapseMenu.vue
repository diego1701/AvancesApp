
<template>
    <div class="w-64 bg-gray-800 min-h-screen">
        <!-- Logo y Nombre de la Aplicación -->
        <div class="flex items-center justify-center mt-8">
            <!-- Aquí puedes agregar tu logo -->
            <img src="/img/Logodos.png" alt="Logo">
        </div>

        <!-- Menú de Navegación -->
        <nav class="mt-10">
            <a :href="route('stories.index')" :active="route().current('stories.index')" class="block text-gray-300 hover:text-white px-4 py-2">Historial</a>
            <a :href="route('profile.edit')" class="block text-gray-300 hover:text-white px-4 py-2"> Configuración </a>
            <a :href="route('patient.index')" :active="route().current('patient.index')" class="block text-gray-300 hover:text-white px-4 py-2">Historial</a>

            <!-- Agrega más elementos de menú según necesites -->
        </nav>
    </div>
</template>