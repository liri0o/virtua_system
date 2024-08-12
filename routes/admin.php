<?php

use App\Http\Controllers\Admin\CarreraController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\EmpresarioController;
use App\Http\Controllers\Admin\EstudianteController;
use App\Http\Controllers\Admin\ExpedienteController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\Admin\TutorController;
use App\Models\Carrera;
use App\Models\Empresa;
use App\Models\Expediente;
use Illuminate\Support\Facades\Route;
use App\Models\User;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', function () {
        $heads = [
            'ID',
            'Nombre de Usuario',
            'Descripción',
            'Fecha',
            'Acciones'
        ];
        $users = User::all();
        $empresas = Empresa::all();
        $carreras = Carrera::all();
        $expedientes = Expediente::all();
        return view('admin.dashboard', compact('users', 'empresas','heads', 'carreras', 'expedientes'));
    })->name('dashboard');


    Route::resource('users', UserController::class);
    Route::get('users/{user}/confirmDelete', [UserController::class, 'confirmDelete'])->name('users.confirmDelete');

    Route::resource('empresas', EmpresaController::class);
    Route::get('empresas/{empresa}/confirmDelete', [EmpresaController::class, 'confirmDelete'])->name('empresas.confirmDelete');
   
    
    Route::resource('empresarios', EmpresarioController::class); 
    Route::get('empresarios/{empresario}/confirmDelete', [EmpresarioController::class, 'confirmDelete'])->name('empresarios.confirmDelete');
    
    Route::resource('carreras', CarreraController::class); 
    Route::get('carreras/{carrera}/confirmDelete', [CarreraController::class, 'confirmDelete'])->name('carreras.confirmDelete');

    Route::resource('estudiantes', EstudianteController::class); 
    Route::get('estudiantes/{estudiante}/confirmDelete', [EstudianteController::class, 'confirmDelete'])->name('estudiantes.confirmDelete'); 
    
    Route::resource('tutors', TutorController::class); 
    Route::get('tutors/{tutor}/confirmDelete', [TutorController::class, 'confirmDelete'])->name('tutors.confirmDelete'); 

     

    Route::resource('expedientes', ExpedienteController::class); 
    /* Route::get('grupos/{grupo}/confirmDelete', [GrupoController::class, 'confirmDelete'])->name('grupos.confirmDelete'); */ 

});
