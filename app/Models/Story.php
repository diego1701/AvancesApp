<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';
    protected $fillable = [
        'paciente_id',
        'profesional_id',
        'informacion_paciente',
        'fecha',
        'consecutivo',
        'estado_actual',
        'antecedentes',
        'evolucion_final',
        'concepto_profesional',
        'recomendaciones',
    ];


    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id');
    }

    // Profesional que registró la historia
    public function profesional()
    {
        return $this->belongsTo(User::class, 'profesional_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
