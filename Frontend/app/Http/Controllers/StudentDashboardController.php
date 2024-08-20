<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    //Talvez ocupa un cambio 
    public function index(Request $request)
    {
        // Obtener el usuario de la sesión
        $alumno = $request->session()->get('alumno');

        // Si no hay un usuario en la sesión, redirigir al login
        if (!$alumno) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión.');
        }

        // Retornar la vista del dashboard con los datos del alumno
        return view('dashboard', compact('alumno'));
    }

    public function historialAcademico()
    {
        // Obtener el número de cuenta del estudiante autenticado
        $numeroCuenta = auth()->user()->numeroCuenta;

        // Hacer una solicitud al backend para obtener el historial académico
        $response = Http::get("http://localhost:8091/api/historial-academico/{$numeroCuenta}");
        $historial = $response->json();

        return view('historial', compact('historial'));
    }

    public function forma003()
    {
        // Obtener el número de cuenta del estudiante autenticado
        $numeroCuenta = auth()->user()->numeroCuenta;

        // Hacer una solicitud al backend para obtener el formato 003
        $response = Http::get("http://localhost:8091/api/forma-003/{$numeroCuenta}");
        $forma003 = $response->json();

        return view('forma003', compact('forma003'));
    }
}
