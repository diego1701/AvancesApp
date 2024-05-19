<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Swal from 'sweetalert2';
import CollapseMenu from '@/Layouts/CollapseMenu.vue';
import { useForm } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import { useRouter } from 'vue-router';
import { format } from 'date-fns';
import { es } from 'date-fns/locale';


const form = useForm({});
const props = defineProps({
  stories: { type: Object }
});





const formatDate = (dateString) => {
  const date = new Date(dateString);
  return format(date, "dd 'de' MMMM 'de' yyyy", { locale: es });
};

const eliminar = (id, name) => {
  const swalWithBootstrapButtons = Swal.mixin({
    buttonsStyling: true
  })

  swalWithBootstrapButtons.fire({
    title: 'Estas seguro que deseas eliminar la historia clinica Nro.' + id + ' ?',
    text: 'Se perdera el registro!',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: '<i class="fa-solid fa-check"></i> Si, Eliminar',
    cancelButtonText: '<i class="fa-solid fa-ban"></i> Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      form.delete(route('stories.destroy', id));
    }
  })
};

const router = useRouter()

const ver = (id) => {
  form.get(route('stories.show', id));

};


const update = (id) => {
  form.put(route('stories.update', id), {
  });
}


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
              <button class="w-full bg-gray-800 text-white font-bold py-2 px-4 rounded flex items-center justify-center"
                @click="openCreateModal">
                <div class="d-grid mx-auto">
                  <button><a :href="route('stories.create')" :active="route().current('stories.create')"><i
                        class="fa-solid fa-circle-plus"></i> + Nueva historia</a> </button>
                </div>
              </button>
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
                      <th class="py-3 px-6 text-left">Editar</th>
                      <th class="py-3 px-6 text-left">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody class="text-gray-600 text-sm font-light">
                    <tr v-for="story in stories" :key="story.id" class="border-b border-gray-200 hover:bg-gray-100">
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
                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-3 rounded"
                          @click="ver(story.id)">
                          <i class="fa-solid fa-edit"></i>
                          Ver</button>
                      </td>

                      <td class="py-3 px-6 text-left">
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">
                          <a :href="route('stories.edit', story.id)" :active="route().current('stories.edit', story.id)">
                            Editar</a>
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </td>

                      <td class="py-3 px-6 text-left">
                        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded"
                          @click="eliminar(story.id)">Eliminar
                          <i class="fa-solid fa-trash"></i>
                        </button>


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