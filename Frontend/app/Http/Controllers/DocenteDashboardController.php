<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el usuario de la sesión
        $docente = $request->session()->get('docente');

        // Si no hay un usuario en la sesión, redirigir al login
        if (!$docente) {
            return redirect()->route('logindocente')->with('error', 'Por favor, inicie sesión.');
        }

        // Retornar la vista del dashboard con los datos del alumno
        return view('components.dashboarddocente', compact('docente'));
    }
}
