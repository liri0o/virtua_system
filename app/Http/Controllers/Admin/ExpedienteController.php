<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Expediente;
use App\Models\Tutor;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
        $expedientes = Expediente::all();
        return view('admin.expedientes.index', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        $carreras = Carrera::all();
        $tutores = Tutor::all();

        return view('admin.expedientes.create' , compact('carreras', 'estudiantes', 'tutores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Expediente $expediente)
    {
        $estudiante = Estudiante::all();
        $heads = [
            'ID',
            'Tutor',
            'Alumno',
            'Concepto',
            'Fecha',
            'Acciones'
        ];
        return view('admin.expedientes.show', compact('expediente', 'heads', 'estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expediente $expediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expediente $expediente)
    {
        //
    }

    public function confirmDelete()
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expediente $expediente)
    {
        //
    }
}
