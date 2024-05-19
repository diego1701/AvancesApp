<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>

    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <div class="flex lg:justify-center lg:col-start-2">
                <div class="flex items-center justify-center mt-8">
                    <!-- Aquí puedes agregar tu logo -->
                    <img src="/img/Logodos.png" alt="Logo">
                </div>
            </div>
            <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                Dashboard
                </Link>

                <template v-else>

                    <Link :href="route('login')"
                        class="bg-gray-100 hover:bg-gray-300 rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Iniciar sesión
                    </Link>
                    <div class="w-1"></div>

                    <Link v-if="canRegister" :href="route('register')"
                        class=" bg-gray-100 hover:bg-gray-300 rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Registrarse
                    </Link>

                </template>
            </nav>
        </header>
    
<div class="flex justify-center items-center my-10">


    <div class="max-w-sm rounded overflow-hidden shadow-lg mx-3">
        <img class="w-full" src="/img/image2.jpeg" alt="Software clínico">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Gestión de Pacientes</div>
            <p class="text-gray-700 text-base">
                Nuestro software permite una gestión eficiente de los pacientes, facilitando el seguimiento de historiales clínicos y citas médicas.
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#softwareClínico</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#gestiónPacientes</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#IPS</span>
        </div>
    </div>

    <div class="max-w-sm rounded overflow-hidden shadow-lg mx-3">
        <img class="w-full" src="/img/image3.jpg" alt="Software clínico">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Registro Electrónico de Salud</div>
            <p class="text-gray-700 text-base">
                Implementamos registros electrónicos de salud que permiten el acceso rápido y seguro a la información médica de los pacientes.
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#registroElectrónico</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#saludDigital</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#tecnologíaSalud</span>
        </div>
    </div>

    <div class="max-w-sm rounded overflow-hidden shadow-lg mx-3">
        <img class="w-full" src="/img/image1.jpeg" alt="Software clínico">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">Automatización de Procesos</div>
            <p class="text-gray-700 text-base">
                Nuestra plataforma automatiza procesos administrativos y clínicos, mejorando la eficiencia y reduciendo errores humanos.
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#automatización</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#procesosClínicos</span>
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#eficienciaIPS</span>
        </div>
    </div>


</div>
</div>

<footer class="bg-gray-800 text-white py-10">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="flex flex-wrap justify-between items-center">
            <div class="w-full lg:w-1/3 mb-6 lg:mb-0">
                <img src="/img/Logodos.png" alt="Avances Software Logo" class="w-40">
            </div>
            <div class="w-full lg:w-1/3 mb-6 lg:mb-0">
                <h2 class="font-bold text-xl mb-2">Avances Software</h2>
                <p>Especializados en soluciones de software clínico para IPS.</p>
                <p>Dirección: Calle Ficticia 123, Ciudad Inventada, País Imaginario</p>
                <p>Teléfono: +123 456 7890</p>
                <p>Email: info@avancessoftware.com</p>
            </div>
            <div class="w-full lg:w-1/3">
                <h2 class="font-bold text-xl mb-2">Síguenos</h2>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-gray-400">
                        <svg fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M22.675 0H1.325C.593 0 0 .593 0 1.325v21.351C0 23.407.593 24 1.325 24H12.82v-9.293H9.692v-3.622h3.127V8.414c0-3.1 1.892-4.788 4.655-4.788 1.325 0 2.462.099 2.794.144v3.241l-1.917.001c-1.504 0-1.794.715-1.794 1.764v2.314h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.323-.593 1.323-1.324V1.325C24 .593 23.407 0 22.675 0z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-gray-400">
                        <svg fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M23.954 4.569c-.885.392-1.83.656-2.825.775 1.014-.611 1.793-1.574 2.163-2.723-.951.568-2.005.978-3.127 1.199-.897-.957-2.178-1.554-3.594-1.554-2.717 0-4.92 2.203-4.92 4.917 0 .39.044.765.127 1.125-4.087-.205-7.713-2.164-10.141-5.144-.422.722-.664 1.561-.664 2.457 0 1.694.861 3.188 2.172 4.066-.799-.026-1.55-.245-2.207-.608v.061c0 2.364 1.679 4.338 3.911 4.783-.409.111-.839.171-1.285.171-.314 0-.621-.03-.92-.086.622 1.942 2.422 3.355 4.56 3.395-1.67 1.31-3.777 2.092-6.066 2.092-.393 0-.779-.023-1.161-.067 2.165 1.389 4.735 2.197 7.497 2.197 8.987 0 13.897-7.44 13.897-13.896 0-.211-.006-.42-.016-.63.954-.689 1.78-1.55 2.438-2.533z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-white hover:text-gray-400">
                        <svg fill="currentColor" class="w-6 h-6" viewBox="0 0 24 24">
                            <path d="M12 2.163c-5.514 0-9.93 4.417-9.93 9.931 0 5.513 4.416 9.929 9.93 9.929 5.514 0 9.93-4.416 9.93-9.929 0-5.514-4.416-9.931-9.93-9.931zm0 18.191c-4.561 0-8.26-3.699-8.26-8.26 0-4.56 3.699-8.26 8.26-8.26s8.26 3.7 8.26 8.26c0 4.561-3.7 8.26-8.26 8.26zm0-15.11c-3.788 0-6.85 3.062-6.85 6.85s3.062 6.85 6.85 6.85 6.85-3.062 6.85-6.85-3.063-6.85-6.85-6.85zm0 11.315c-2.479 0-4.493-2.014-4.493-4.493s2.014-4.493 4.493-4.493 4.493 2.014 4.493 4.493-2.015 4.493-4.493 4.493zm0-7.584c-1.706 0-3.092 1.386-3.092 3.091s1.386 3.091 3.092 3.091 3.091-1.386 3.091-3.091-1.386-3.091-3.091-3.091zm6.196-1.281c-.633 0-1.146.513-1.146 1.145 0 .633.513 1.146 1.146 1.146.633 0 1.146-.513 1.146-1.146 0-.632-.513-1.145-1.146-1.145zm0 1.605c-.252 0-.459-.207-.459-.459 0-.252.207-.459.459-.459.252 0 .459.207.459.459 0 .252-.207.459-.459.459z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-6 lg:px-8 mt-8 border-t border-gray-700 pt-4">
        <p class="text-center text-gray-400">&copy; 2024 Avances Software. Todos los derechos reservados.</p>
    </div>
</footer>

</template>