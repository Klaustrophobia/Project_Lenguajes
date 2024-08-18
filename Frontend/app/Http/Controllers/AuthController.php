<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required|string|min:8',
        ]);

        // Buscar el alumno por correo y contraseña
        $alumno = Alumno::where('correo', $request->correo)
                         ->where('contrasena', $request->contrasena)
                         ->first();

        // Verificar si el alumno existe
        if ($alumno) {
            // Almacenar datos en la sesión para acceder al usuario en el dashboard
            $request->session()->put('alumno', $alumno);

            // Redirigir al dashboard
            return redirect('/dashboard');
        } else {
            // Si las credenciales no son correctas, redirigir de vuelta al login con un mensaje de error
            return redirect()->route('login')->with('error', 'Correo o contraseña incorrectos.');
        }
    }

    public function logout(Request $request)
    {
        // Eliminar los datos del usuario de la sesión
        $request->session()->forget('alumno');

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
