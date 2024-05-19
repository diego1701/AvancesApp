<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
import CollapseMenu from '@/Layouts/CollapseMenu.vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { Head } from '@inertiajs/vue3';
import { format } from 'date-fns';
import { es } from 'date-fns/locale';

const form = useForm({});
const props = defineProps({
    stories: Array, // Cambiado de Object a Array
});



const formatDate = (dateString) => {
    const date = new Date(dateString);
    return format(date, "dd 'de' MMMM 'de' yyyy", { locale: es });
};




const ver = (id) => {
    form.get(route('stories.show', id));

};



const toggleStatus = (storyId) => {
    const story = props.stories.find(story => story.id === storyId);
    if (story) {
        // Solicita al usuario que ingrese su nombre de usuario para confirmar la actualización
        const userName = window.prompt(`Ingrese su nombre completo para confirmar la actualización:`, "");

        if (userName && userName.trim() === story.paciente.name) {
            const newState = story.estado_actual === 'asistida' ? 'creada' : 'asistida';
            axios.put(`/patient/${story.id}`, { estado_actual: newState })
                .then(() => {
                    console.log('Estado actualizado con éxito');
                    window.alert('Estado actualizado con exito');
                    // Actualiza el estado localmente solo si la operación fue exitosa
                    story.estado_actual = newState;
                    // Aquí puedes actualizar el estado de la UI si es necesario
                    // Por ejemplo, si estás utilizando Vue 3 Composition API:
                    // this.$emit('update:estadoActual', newState);
                })
                .catch(error => {
                    console.error('Error al actualizar el estado:', error);
                    // Revierte el estado del checkbox mostrando un mensaje al usuario
                    // Nota: Este es un mensaje simulado. Deberías reemplazarlo con la lógica adecuada para tu aplicación.
                    window.alert('Hubo un error al actualizar el estado. Por favor, inténtalo de nuevo.');
                });
        } else {
            // Muestra un mensaje de error si el nombre ingresado no coincide
            window.alert('El estado no se actualizo en la base de datos.');
        }
    }
}


/*const toggleStatus = (storyId) => {
    const story = props.stories.find(story => story.id === storyId);
    if (story) {
        const newState = story.estado_actual === 'asistida'? 'creada' : 'asistida';
        axios.put(`/patient/${story.id}`, { estado_actual: newState })
          .then(() => {
                console.log('Estado actualizado con éxito');
                // Actualiza el estado localmente
                story.estado_actual = newState;
            })
          .catch(error => {
                console.error('Error al actualizar el estado:', error);
            });
    }
}*/




</script>


<template>

    <Head title="stories"></Head>
    <AuthenticatedLayout>
        <div class="flex">
            <div class="flex">
                <CollapseMenu />
                <div class="flex-1 container  ml-10  mt-3 bg-white p-5 shadow-md">
                    <div class="flex justify-center mt-3">
                        <div class="w-full max-w-xs">
                            <div
                                class="w-full bg-gray-100 text-white font-bold py-2 px-4 rounded flex items-center justify-center">
                                <div class="d-grid mx-auto">
                                    <p class="text-gray-800">Historias del paciente</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center mt-6">
                        <div class="w-full">
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Id</th>
                                            <th class="py-3 px-6 text-left">Profesional</th>
                                            <th class="py-3 px-6 text-left">Paciente</th>
                                            <th class="py-3 px-6 text-left">Información Paciente</th>
                                            <th class="py-3 px-6 text-left">Fecha</th>
                                            <th class="py-3 px-6 text-left">Ver</th>
                                            <th class="py-3 px-6 text-left">Asistida</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        <tr v-for="story in stories" :key="story.id"
                                            class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ story.id }}</td>
                                            <td class="py-3 px-6 text-left">
                                                <p>{{ story.profesional.name }} {{ story.profesional.last_name }}</p>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <p>{{ story.paciente.name }} {{ story.paciente.last_name }}</p>
                                            </td>
                                            <td class="py-3 px-6 text-left">{{ story.informacion_paciente }}</td>
                                            <td class="py-3 px-6 text-left">{{ formatDate(story.fecha) }}</td>
                                            <td class="py-3 px-6 text-left">
                                                <button
                                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded"
                                                    @click="ver(story.id)">
                                                    <i class="fa-solid fa-edit"></i>
                                                    Ver</button>
                                            </td>

                                            <td class="py-3 px-6 text-left">
                                                <input type="checkbox" name="estado_actual"
                                                    :checked="story.estado_actual === 'asistida'"
                                                    @change="toggleStatus(story.id)" />
                                            </td>




                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>