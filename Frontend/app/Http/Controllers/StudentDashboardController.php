<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
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
}
