<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Carreras\StoreCarrera;
use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $heads = [
            'ID',
            'Nombre',
            'Código',
            'Fecha de Creación',
            'Acciones'
        ];

        $carreras = Carrera::all();

        return view('admin.carreras.index', compact('heads', 'carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarrera $request)
    {
        Carrera::create($request->all());
        
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Hecho!!',
            'text' => ' Carrera creada correctamente.'
        ]);

        return redirect()->route('admin.carreras.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        return view('admin.carreras.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $carrera->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Hecho!!',
            'text' => ' Usuario modificado correctamente.',
        ]);

        return redirect()->route('admin.carreras.index');
    }

    public function confirmDelete(Carrera $carrera)
    {

        return view('admin.carreras.delete', compact('carrera'));               

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Hecho!!',
            'text' => ' Carrera eliminada correctamente.',
        ]);

        return redirect()->route('admin.carreras.index');
    }
}
