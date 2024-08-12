<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'ID',
            'Nombre',
            'Correo',
            'Fecha de Creación',
            'Acciones'
        ];

        $empresas = Empresa::all();

        return view('admin.empresas.index', compact('heads', 'empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        return view('admin.empresas.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    public function confirmDelete(Empresa $empresa)
    {
        return view('admin.empresas.delete', compact('empresa'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Empresa $empresa)
    {     
        if (isset($empresa->empresario)) 
        {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => '¡Oh no!',
                'text' => 'La empresa no puede ser eliminada debido a que existe un empresario asignado.'
            ]);
            return redirect()->route('admin.empresas.index', $empresa);
        }    

        Storage::delete($empresa->photo);
        $empresa->delete();

        

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Empresa eliminada correctamente.'
        ]);

        return redirect()->route('admin.empresas.index');
    }
}
