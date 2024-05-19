<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CollapseMenu from '@/Layouts/CollapseMenu.vue';
const prs = defineProps({
    stories: { type: Object, default: () => ({}) },
    pacientes: { type: Array, default: () => [] },
});
const form = useForm({
    id: prs.stories.id,
    profesional_id: prs.stories.profesional_id,
    paciente_id: prs.stories.paciente_id,
    informacion_paciente: prs.stories.informacion_paciente,
    fecha: prs.stories.fecha,
    consecutivo: prs.stories.consecutivo,
    estado_actual: prs.stories.estado_actual,
    antecedentes: prs.stories.antecedentes,
    evolucion_final: prs.stories.evolucion_final,
    concepto_profesional: prs.stories.concepto_profesional,
    recomendaciones: prs.stories.recomendaciones,
});
const save = () => {
    form.post(route('stories.store'), {
    });
}


</script>
<template>

    <Head title="create"></Head>
    <AuthenticatedLayout>
        <div class="flex">
            <CollapseMenu />
            <div class=" p-12">

                <div class=" max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Formulario de Historia</div>
                        <form class="flex flex-wrap justify-between">

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="paciente_id">
                                    Paciente
                                </label>
                                <select v-model="form.paciente_id" id="paciente_id" class="form-select w-full" required>
                                    <option value="">Seleccione un paciente</option>
                                    <option v-for="paciente in pacientes" :key="paciente.id" :value="paciente.id">
                                        {{ paciente.name }}
                                    </option>
                                </select>

                                <div v-if="form.errors.paciente_id" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.paciente_id }}
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="informacion_paciente">
                                    Información del Paciente
                                </label>
                                <input :id="'informacion_paciente'  " class="form-input w-full" type="text"
                                    name="informacion_paciente" v-model="form.informacion_paciente" maxlength="255"
                                    placeholder="Información del paciente..." required>
                                <div v-if="form.errors.informacion_paciente" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.informacion_paciente }}
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="fecha">
                                    Fecha
                                </label>
                                <input :id="'fecha'  " class="form-input w-full" type="date" name="fecha"
                                    v-model="form.fecha" placeholder="Fecha..." required>
                                <div v-if="form.errors.fecha" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.fecha }}
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="consecutivo">
                                    Consecutivo
                                </label>
                                <input :id="'consecutivo'  " class="form-input w-full" type="number" name="consecutivo"
                                    v-model="form.consecutivo" placeholder="Consecutivo..." required>
                                <div v-if="form.errors.consecutivo" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.consecutivo }}
                                </div>
                            </div>


                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="antecedentes">
                                    Antecedentes
                                </label>
                                <input :id="'antecedentes'  " class="form-input w-full" type="text" name="antecedentes"
                                    v-model="form.antecedentes" maxlength="255" placeholder="Antecedentes..." required>
                                <div v-if="form.errors.antecedentes" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.antecedentes }}
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="evolucion_final">
                                    Evolución Final
                                </label>
                                <input :id="'evolucion_final'  " class="form-input w-full" type="text"
                                    name="evolucion_final" v-model="form.evolucion_final" maxlength="255"
                                    placeholder="Evolución final..." required>
                                <div v-if="form.errors.evolucion_final" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.evolucion_final }}
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="concepto_profesional">
                                    Concepto Profesional
                                </label>
                                <input :id="'concepto_profesional'  " class="form-input w-full" type="text"
                                    name="concepto_profesional" v-model="form.concepto_profesional" maxlength="255"
                                    placeholder="Concepto profesional..." required>
                                <div v-if="form.errors.concepto_profesional" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.concepto_profesional }}
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="recomendaciones">
                                    Recomendaciones
                                </label>
                                <input :id="'recomendaciones'  " class="form-input w-full" type="text"
                                    name="recomendaciones" v-model="form.recomendaciones" maxlength="255"
                                    placeholder="Recomendaciones..." required>
                                <div v-if="form.errors.recomendaciones" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.recomendaciones }}
                                </div>
                            </div>


                            <div class="w-full px-3 mb-6">
                                <button @click="save()"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                    :disabled="form.processing">
                                    <i class="fa-solid fa-flpy-disk"></i> Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </AuthenticatedLayout>
</template>