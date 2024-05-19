<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'paciente_id' => 'required|exists:users,id',
            'profesional_id' => 'required|exists:users,id',
            'informacion_paciente' => 'required|string',
            'fecha' => 'required|date_format:Y-m-d H:i:s',
            'consecutivo' => 'required|integer',
            'estado_actual' => 'nullable|in:creada,asistida',
            'antecedentes' => 'nullable|string',
            'evolucion_final' => 'nullable|string',
            'concepto_profesional' => 'nullable|string',
            'recomendaciones' => 'nullable|string',
      
        ];
    }


        
}
