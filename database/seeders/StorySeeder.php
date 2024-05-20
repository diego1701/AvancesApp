<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorySeeder extends Seeder
{
   
    public function run() : void
    {
        DB::table('stories')->insert([
            [
                'paciente_id' => 3,
                'profesional_id' => 1,
                'informacion_paciente' => 'Paciente con antecedentes de hipertensión.',
                'fecha' => Carbon::now()->subDays(10),
                'consecutivo' => 1,
                'estado_actual' => 'creada',
                'antecedentes' => 'Hipertensión controlada con medicación.',
                'evolucion_final' => 'Evolución favorable, presión arterial estabilizada.',
                'concepto_profesional' => 'Continuar con el tratamiento actual.',
                'recomendaciones' => 'Control mensual y seguimiento con cardiólogo.',
            ],
            [
                'paciente_id' => 4,
                'profesional_id' => 2,
                'informacion_paciente' => 'Paciente con antecedentes de diabetes tipo 2.',
                'fecha' => Carbon::now()->subDays(5),
                'consecutivo' => 2,
                'estado_actual' => 'asistida',
                'antecedentes' => 'Diabetes tipo 2, medicada con insulina.',
                'evolucion_final' => 'Mejora en los niveles de glucosa en sangre.',
                'concepto_profesional' => 'Revisión de la dosis de insulina.',
                'recomendaciones' => 'Dieta baja en azúcares y ejercicio regular.',
            ],
            [
                'paciente_id' => 3,
                'profesional_id' => 2,
                'informacion_paciente' => 'Paciente con historial de migrañas crónicas.',
                'fecha' => Carbon::now()->subDays(20),
                'consecutivo' => 3,
                'estado_actual' => 'creada',
                'antecedentes' => 'Migrañas tratadas con triptanes.',
                'evolucion_final' => 'Reducción en la frecuencia de las migrañas.',
                'concepto_profesional' => 'Evaluar la efectividad del tratamiento actual.',
                'recomendaciones' => 'Seguimiento trimestral y ajuste de medicación si es necesario.',
            ],
            [
                'paciente_id' => 4,
                'profesional_id' => 1,
                'informacion_paciente' => 'Paciente con problemas de colesterol alto.',
                'fecha' => Carbon::now()->subDays(15),
                'consecutivo' => 4,
                'estado_actual' => 'asistida',
                'antecedentes' => 'Hiperlipidemia tratada con estatinas.',
                'evolucion_final' => 'Niveles de colesterol reducidos a límites normales.',
                'concepto_profesional' => 'Mantener la medicación y dieta adecuada.',
                'recomendaciones' => 'Revisión semestral y control de lípidos en sangre.',
            ],
            [
                'paciente_id' => 3,
                'profesional_id' => 1,
                'informacion_paciente' => 'Paciente con asma bronquial desde la infancia.',
                'fecha' => Carbon::now()->subDays(8),
                'consecutivo' => 5,
                'estado_actual' => 'creada',
                'antecedentes' => 'Asma controlada con inhaladores.',
                'evolucion_final' => 'Sin crisis asmáticas recientes.',
                'concepto_profesional' => 'Continuar con el plan de control de asma.',
                'recomendaciones' => 'Control trimestral y uso regular de inhaladores.',
            ],
            [
                'paciente_id' => 4,
                'profesional_id' => 2,
                'informacion_paciente' => 'Paciente con antecedentes de insuficiencia renal.',
                'fecha' => Carbon::now()->subDays(30),
                'consecutivo' => 6,
                'estado_actual' => 'asistida',
                'antecedentes' => 'Insuficiencia renal crónica, en tratamiento dialítico.',
                'evolucion_final' => 'Función renal estabilizada con diálisis.',
                'concepto_profesional' => 'Monitoreo continuo y posible trasplante renal en el futuro.',
                'recomendaciones' => 'Sesiones de diálisis regulares y seguimiento con nefrólogo.',
            ]
        ]);
    }


}
