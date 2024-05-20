<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoryRequest;
use App\Models\Story;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StoryController extends Controller
{


    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $stories = Story::with('paciente','profesional')->get();

        return Inertia::render('History/History',['stories'=>$stories]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $pacientes = User::role('Paciente')->get();
        $profesionales = User::role('Profesional')->get();
        return Inertia::render('History/Store',['pacientes' => $pacientes,'profesionales'=>$profesionales]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required',
            'informacion_paciente' => 'required',
            'fecha' => 'required',
        ]);
       
        $stories = new Story($request->input());
        $stories->estado_actual ='creada';
        $stories->consecutivo=1;
        $stories->profesional_id = Auth::id();
        $stories->save();
        return redirect('stories');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $stories = Story::with('paciente','profesional')->findOrFail($id);
        return Inertia::render('History/Show',['story' => $stories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stories = Story::find($id);

        return Inertia::render('History/Update',['stories'=> $stories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stories = Story::find($id);
        $stories->update($request->all());
        return redirect('stories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stories = Story::find($id);
        $stories->delete();
        return redirect()->route('stories.index');
    }
}
