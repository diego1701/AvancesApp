<?php

namespace App\Http\Controllers;


use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pacienteId = Auth::id();;
        $stories = Story::where('paciente_id',$pacienteId)->with('paciente','profesional')->get();
        return Inertia::render('History/HistoryPatient',['stories'=>$stories]);
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
    public function show($id)
    {
        
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
        $stories = Story::findOrFail($id);
        $stories->estado_actual = $request->input('estado_actual');
        $stories->save();

        return response()->json(['message' => 'Estado actualizado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
