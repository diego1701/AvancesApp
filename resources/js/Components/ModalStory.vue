<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
const props = defineProps({
    stories:{type:Object,default :() =>({})},
    modal:String,title:String,op:String
});
const form = useForm({
    id:props.stories.id,
    informacion_paciente:props.stories.informacion_paciente,
    fecha:props.stories.fecha,
    consecutivo: props.stories.consecutivo,
    estado_actual: props.stories.estado_actual,
    antecedentes: props.stories.antecedentes,
    evolucion_final: props.stories.evolucion_final,
    concepto_profesional: props.stories.concepto_profesional,
    recomendaciones: props.stories.recomendaciones,
});
const save = () =>{
    form.post(route('stories.store'),{
        onSuccess: () => cerrar()
    });
}
const update = () =>{
    var id = document.getElementById('id2').value;
    form.put(route('stories.update',id),{
        onSuccess: () => cerrar()
    });
}

const cerrar =()=>{
    form.reset();
    document.querySelector('#cerrar'+props.op).click();
};
</script>
<template>
    <div class="modal fade" :id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="h5">{{ title }}</label>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                    aria-label="close"></button>
                </div>
           
            <div class="modal-body">
                <form @submit.prevent="(op ==='1'? save() : update())">
                    <TextInput :id="'id'+op" type="hidden" name="id" v-model="form.id">                        
                    </TextInput>

                                    <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <TextInput :id="'user_id'+op" class="form-control" type="text"
                    name="user_id" v-model="form.user_id" maxlength="120" placeholder="ID del usuario..."
                    required></TextInput>
                </div>
                <div v-if="form.errors.user_id" class="text-sm text-danger">
                    {{ form.errors.user_id }}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-info-circle"></i></span>
                    <TextInput :id="'informacion_paciente'+op" class="form-control" type="text"
                    name="informacion_paciente" v-model="form.informacion_paciente" maxlength="255"
                    placeholder="Información del paciente..." required></TextInput>
                </div>
                <div v-if="form.errors.informacion_paciente" class="text-sm text-danger">
                    {{ form.errors.informacion_paciente }}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-calendar-alt"></i></span>
                    <TextInput :id="'fecha'+op" class="form-control" type="text"
                    name="fecha" v-model="form.fecha" placeholder="Fecha..." required></TextInput>
                </div>
                <div v-if="form.errors.fecha" class="text-sm text-danger">
                    {{ form.errors.fecha }}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-list-ol"></i></span>
                    <TextInput :id="'consecutivo'+op" class="form-control" type="text"
                    name="consecutivo" v-model="form.consecutivo" placeholder="Consecutivo..."
                    required></TextInput>
                </div>
                <div v-if="form.errors.consecutivo" class="text-sm text-danger">
                    {{ form.errors.consecutivo }}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-heart"></i></span>
                    <TextInput :id="'estado_actual'+op" class="form-control" type="text"
                    name="estado_actual" v-model="form.estado_actual" maxlength="255"
                    placeholder="Estado actual..." required></TextInput>
                </div>
                <div v-if="form.errors.estado_actual" class="text-sm text-danger">
                    {{ form.errors.estado_actual }}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-history"></i></span>
                    <TextInput :id="'antecedentes'+op" class="form-control" type="text"
                    name="antecedentes" v-model="form.antecedentes" maxlength="255"
                    placeholder="Antecedentes..." required></TextInput>
                </div>
                <div v-if="form.errors.antecedentes" class="text-sm text-danger">
                    {{ form.errors.antecedentes }}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-notes-medical"></i></span>
                    <TextInput :id="'evolucion_final'+op" class="form-control" type="text"
                    name="evolucion_final" v-model="form.evolucion_final" maxlength="255"
                    placeholder="Evolución final..." required></TextInput>
                </div>
                <div v-if="form.errors.evolucion_final" class="text-sm text-danger">
                    {{ form.errors.evolucion_final }}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-stethoscope"></i></span>
                    <TextInput :id="'concepto_profesional'+op" class="form-control" type="text"
                    name="concepto_profesional" v-model="form.concepto_profesional" maxlength="255"
                    placeholder="Concepto profesional..." required></TextInput>
                </div>
                <div v-if="form.errors.concepto_profesional" class="text-sm text-danger">
                    {{ form.errors.concepto_profesional }}
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-lightbulb"></i></span>
                    <TextInput :id="'recomendaciones'+op" class="form-control" type="text"
                    name="recomendaciones" v-model="form.recomendaciones" maxlength="255"
                    placeholder="Recomendaciones..." required></TextInput>
                </div>
                <div v-if="form.errors.recomendaciones" class="text-sm text-danger">
                    {{ form.errors.recomendaciones }}
                </div>


                    <div class="d-grid mx-auto">
                        <button class="btn btn-success" :disabled="form.processing" >
                        <i class="fa-solid fa-floppy-disk"></i> Guardar
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-dark" type="submit" :id="'cerrar'+op"
                    data-bs-dismiss="modal"> Cerrar
                </button>
            </div>
        </div>
    </div>
    </div>
</template>