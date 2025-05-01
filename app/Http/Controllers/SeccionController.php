<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use App\Models\Alumno;
use App\Models\Docente;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secciones = Seccion::all();
        return view('secciones.index', compact('secciones'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Seccion $seccion)
    {
        $alumnos = Alumno::all();
        $docentes = Docente::all();
        $alumnosInscritos = $seccion->alumnos;
        $docentesAsignados = $seccion->docentes;
        
        return view('secciones.show', compact('seccion', 'alumnos', 'docentes', 'alumnosInscritos', 'docentesAsignados'));
    }

    /**
     * Asignar alumnos a la sección
     */
    public function asignarAlumnos(Request $request, Seccion $seccion)
    {
        $request->validate([
            'alumnos' => 'required|array',
            'alumnos.*' => 'exists:alumnos,id',
        ]);

        $seccion->alumnos()->sync($request->alumnos);

        return redirect()->route('secciones.show', $seccion)
            ->with('success', 'Alumnos asignados correctamente');
    }

    /**
     * Asignar docentes a la sección
     */
    public function asignarDocentes(Request $request, Seccion $seccion)
    {
        $request->validate([
            'docentes' => 'required|array',
            'docentes.*' => 'exists:docentes,id',
        ]);

        $seccion->docentes()->sync($request->docentes);

        return redirect()->route('secciones.show', $seccion)
            ->with('success', 'Docentes asignados correctamente');
    }
}
