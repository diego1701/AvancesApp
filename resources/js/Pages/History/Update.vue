<script setup>
import { useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import CollapseMenu from '@/Layouts/CollapseMenu.vue';
const props = defineProps({
    stories: { type: Object, default: () => ({}) }

});
const form = useForm({
    id: props.stories.id,
    profesional_id: props.stories.profesional_id,
    paciente_id: props.stories.paciente_id,
    informacion_paciente: props.stories.informacion_paciente,
    fecha: props.stories.fecha,
    consecutivo: props.stories.consecutivo,
    estado_actual: props.stories.estado_actual,
    antecedentes: props.stories.antecedentes,
    evolucion_final: props.stories.evolucion_final,
    concepto_profesional: props.stories.concepto_profesional,
    recomendaciones: props.stories.recomendaciones,
});

const update = (id) => {
    form.put(route('stories.update', id), {
    });
};

</script>
<template>

    <Head title="Update"></Head>
    <AuthenticatedLayout>
        <div class="flex">
            <CollapseMenu />
            <div class=" p-12">

                <div class=" max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Formulario de Historia</div>
                        <form class="flex flex-wrap justify-between">


                            <input :id="'informacion_paciente'" class="form-input w-full" type="hidden"
                                name="informacion_paciente" v-model="form.paciente_id" maxlength="255"
                                placeholder="Información del paciente..." required>

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="informacion_paciente">
                                    Información del Paciente
                                </label>
                                <TextInput :id="'2'" class="form-input w-full" type="text" name="informacion_paciente"
                                    v-model="form.informacion_paciente" maxlength="255"
                                    placeholder="Información del paciente..." required></TextInput>
                                <div v-if="form.errors.informacion_paciente" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.informacion_paciente }}
                                </div>
                            </div>


                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="fecha">
                                    Fecha
                                </label>
                                <input :id="'fecha' + op" class="form-input w-full" type="date" name="fecha"
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
                                <input :id="'consecutivo' + op" class="form-input w-full" type="number" name="consecutivo"
                                    v-model="form.consecutivo" placeholder="Consecutivo..." required>
                                <div v-if="form.errors.consecutivo" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.consecutivo }}
                                </div>
                            </div>


                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="estado_actual">
                                    Estado Actual
                                </label>
                                <select v-model="form.estado_actual" id="paciente_id" class="form-select w-full" required>
                                    <option value="">Seleccione un paciente</option>
                                    <option value="creada">
                                        Creada
                                    </option>
                                    <option value="asistida">
                                        Asistida
                                    </option>
                                    
                                </select>
                                <div v-if="form.errors.estado_actual" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.estado_actual }}
                                </div>
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="antecedentes">
                                    Antecedentes
                                </label>
                                <input :id="'antecedentes' + op" class="form-input w-full" type="text" name="antecedentes"
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
                                <input :id="'evolucion_final' + op" class="form-input w-full" type="text"
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
                                <input :id="'concepto_profesional' + op" class="form-input w-full" type="text"
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
                                <input :id="'recomendaciones' + op" class="form-input w-full" type="text"
                                    name="recomendaciones" v-model="form.recomendaciones" maxlength="255"
                                    placeholder="Recomendaciones..." required>
                                <div v-if="form.errors.recomendaciones" class="text-sm text-red-500 mt-1">
                                    {{ form.errors.recomendaciones }}
                                </div>
                            </div>




                            <div class="w-full px-3 mb-6">
                                <button @click="update(form.id)"
                                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"
                                    :disabled="form.processing">
                                    <i class="fa-solid fa-floppy-disk"></i> Actualizar
                                </button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </AuthenticatedLayout>
</template>