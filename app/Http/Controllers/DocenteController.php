<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docente::all();
        return response()->json($docentes);
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
        $request->validate([
            'nombre'=> 'required',
            'apellido'=> 'required',
            'telefono' => 'required',
            'email'=> 'required|email|unique:docentes',
        ]);
        $docentes = Docente::create($request->all());
        return response()->json($docentes,201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $docentes = Docente::findOrFail($id);
        return response()->json($docentes);
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
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'email' => 'required|email|unique:docente,email'. $id,
        ]);

        $docente = Docente::findOrFail($id);
        $docente->update($request->all());
        return response()->json($docente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();
        return response()->json(null,204);
    }
}
