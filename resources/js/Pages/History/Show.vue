<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CollapseMenu from '@/Layouts/CollapseMenu.vue';
import { format } from 'date-fns';
import { es } from 'date-fns/locale';

const props = defineProps({
  story: Object
});



const formatDate = (dateString) => {
  const date = new Date(dateString);
  return format(date, "dd 'de' MMMM 'de' yyyy", { locale: es });
};
</script>
<template>
  <AuthenticatedLayout>


    <div class="flex">
      <CollapseMenu />
      <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
          <div class="px-6 py-4">
            <h1 class="text-3xl font-bold mb-6">Detalles de la Historia Clínica</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <p><strong>Profesional que registra:</strong> {{ story.profesional.name }} {{
                  story.profesional.last_name
                }}</p>
              </div>
              <div>
                <p><strong>Paciente:</strong> {{ story.paciente.name }} {{ story.paciente.last_name }}</p>
              </div>
              <div>
                <p><strong>Información del Paciente:</strong> {{ story.informacion_paciente }}</p>
              </div>
              <div>
                <p><strong>Fecha:</strong> {{ formatDate(story.fecha) }}</p>
              </div>
              <div>
                <p><strong>Consecutivo:</strong> {{ story.consecutivo }}</p>
              </div>
              <div>
                <p><strong>Estado: </strong>
                  <span :class="{
                    'text-orange-500': story.estado_actual === 'creada',
                    'text-green-500': story.estado_actual === 'asistida'
                  }">
                    {{ story.estado_actual }}
                  </span>
                </p>
              </div>
              <div>
                <p><strong>Antecedentes:</strong> {{ story.antecedentes }}</p>
              </div>
              <div>
                <p><strong>Evolución Final:</strong> {{ story.evolucion_final }}</p>
              </div>
              <div>
                <p><strong>Concepto Profesional:</strong> {{ story.concepto_profesional }}</p>
              </div>
              <div>
                <p><strong>Recomendaciones:</strong> {{ story.recomendaciones }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>