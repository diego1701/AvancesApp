<?php

namespace App\Http\Controllers;


use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        

        $permisoNombre = 'patient.index';

        // Verifica si el usuario autenticado tiene el permiso
        if ($request->user()->hasPermissionTo($permisoNombre)) {
            $pacienteId = Auth::id();;
            $stories = Story::where('paciente_id',$pacienteId)->with('paciente','profesional')->get();
            return Inertia::render('History/History',['stories'=>$stories]);
        } else {
            // El usuario no tiene el permiso, redirige o devuelve un mensaje adecuado
            return redirect()->back()->with('error', 'No tienes permiso para realizar esta acción.');
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}