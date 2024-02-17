<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return response()->json($alumnos);
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
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:alumnos',
        ]);

        $alumno = Alumno::create($request->all());
        return response()->json($alumno, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        return response()->json($alumno);
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
            'email' => 'required|email|unique:alumnos,email,' . $id,
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());
        return response()->json($alumno);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
        return response()->json(null, 204);
    }

    
    public function enrollInCourse(Request $request, $alumnoId, $cursoId)
    {

        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'curso_id' => 'required|exists:cursos,id',
        ]);


        $alumno = Alumno::findOrFail($alumnoId);
        $curso = Curso::findOrFail($cursoId);

        // Attach the student to the course
        $alumno->cursos()->attach($curso);

        // Optionally, return a response indicating success
        return response()->json(['message' => 'Student enrolled in course successfully'], 200);
    }

    public function checkEnrollment($alumnoId, $cursoId)
    {
        // Find the student and the course
        $alumno = Alumno::findOrFail($alumnoId);
        $curso = Curso::findOrFail($cursoId);

        // Check if the student is enrolled in the course
        $isEnrolled = $alumno->cursos()->where('curso_id', $cursoId)->exists();

        // If enrolled, return details of student and course
        if ($isEnrolled) {
            return response()->json([
                'enrolled' => true,
                'alumno' => $alumno,
                'curso' => $curso
            ]);
        } else {
            return response()->json(['enrolled' => false]);
        }
    }
}
