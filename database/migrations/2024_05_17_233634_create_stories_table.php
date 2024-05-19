<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id'); // ID del paciente
            $table->unsignedBigInteger('profesional_id'); // ID del profesional // Cambio de profesional_id y paciente_id a user_id
            $table->text('informacion_paciente');
            $table->dateTime('fecha');
            $table->unsignedInteger('consecutivo');
            $table->enum('estado_actual',['creada','asistida'])->nullable();
            $table->text('antecedentes')->nullable();
            $table->text('evolucion_final')->nullable();
            $table->text('concepto_profesional')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->timestamps();
        
            $table->foreign('paciente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('profesional_id')->references('id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
