<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencia = Asistencia::all();
        $alumnos = Alumno::all();
        // return response()->json($asistencia);
        return view('asistencia', ['asistencias' => $asistencia, 'alumnos' => $alumnos]);

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
            'alumno_id' => 'required|exists:alumnos,id',
            'fecha' => 'required|date',
            'asistencia' => 'required|in:A,T,F',
        ]);

        // Crea un nuevo registro de asistencia
        $asistencia = Asistencia::create([
            'alumno_id' => $request->alumno_id,
            'fecha' => $request->fecha,
            'asistencia' => $request->asistencia,
        ]);

        // Devuelve una respuesta
        return response()->json(['message' => 'Asistencia registrada correctamente', 'data' => $asistencia], 201);
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

    public function registrarAsistencia(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'fecha' => 'required|date',
            'asistencia' => 'required|in:A,T,F', // Validar que la opción de asistencia sea una de las permitidas
        ]);

        $asistencia = new Asistencia();
        $asistencia->alumno_id = $request->alumno_id;
        $asistencia->fecha = $request->fecha;
        $asistencia->asistencia = $request->asistencia;
        $asistencia->save();

        return response()->json(['message' => 'Asistencia registrada correctamente'], 200);
    }
}
