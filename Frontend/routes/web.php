<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\SeccionesController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\ClasesHistorialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\DocenteDashboardController;
use App\Http\Controllers\StudentHistorialController;
use App\Http\Controllers\StudentForma03Controller;
use App\Http\Controllers\HistorialController;

Route::get('/', function () { return view('welcome'); });

Route::get('/landing', function () { return view('landing'); });

Route::get('/register', [StudentController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [StudentController::class, 'registerStudent'])->name('register.post');

Route::get('/registerdocente', [DocenteController::class, 'showRegisterForm'])->name('registerdocente');
Route::post('/registerdocente', [DocenteController::class, 'registerDocente'])->name('registerdocente.post');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/logindocente', [AuthController::class, 'showLoginFormDocente'])->name('logindocente');
Route::post('/logindocente', [AuthController::class, 'loginDocente'])->name('logindocente.post');

Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboarddocente',[DocenteDashboardController::class, 'index'])->name('dashboarddocente');

Route::get('/historial', [StudentHistorialController::class , 'index'])->name('historial');

Route::get('/forma03', [StudentForma03Controller::class, 'index'])->name('forma03');

Route::get('/agregarSecciones', [SeccionesController::class, 'showForm'])->name('agregarsecciones');
Route::post('/agregarSecciones',[SeccionesController::class, 'guardarSecciones'])->name('agregarsecciones.post');


Route::get('/agregarClases', [ClasesController::class, 'showForm'])->name('agregarclases');
Route::post('/agregarClases', [ClasesController::class, 'guardarClases'])->name('agregarclases.post');

//Ingresar Notas en Dashboard de Docentes
Route::get('/selectalumno', [ClasesHistorialController::class, 'selectAlumno'])->name('selectalumno');
Route::get('/agregarnotas', [ClasesHistorialController::class, 'showForm'])->name('agregarnotas');
Route::post('/agregarnotas/{numeroCuenta}',[ClasesHistorialController::class, 'guardarNotas'])->name('agregarnotas.post');

Route::get('/matricula', [MatriculaController::class, 'index'])->name('matricula.index');
Route::post('/matricula/adicionar', [MatriculaController::class, 'adicionar'])->name('matricula.adicionar');
Route::post('/matricula/cancelar', [MatriculaController::class, 'cancelar'])->name('matricula.cancelar');

Route::get('/crearcarrera', [CarrerasController::class, 'index'])->name('crearcarrera');
Route::post('/crearcarrera', [CarrerasController::class, 'guardarCarrera'])->name('crearcarrera.post');

Route::get('/crearhistorial', [HistorialController::class, 'index'])->name('crearhistorial');
Route::post('/crearhistorial', [HistorialController::class, 'guardarHistorial'])->name('crearhistorial.post');