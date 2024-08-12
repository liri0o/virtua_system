<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Empresarios\Store;
use App\Http\Requests\Admin\Empresarios\UpdateEmpresario;
use App\Models\Empresa;
use App\Models\Empresario;
use App\Models\User;
use Illuminate\Http\Request;

class EmpresarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'ID',
            'CI',
            'Nombres',
            'Empresa',
            'Cargo',
            'Acciones'
        ];

        $empresarios = Empresario::all();

        return view('admin.empresarios.index', compact('heads', 'empresarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('admin.empresarios.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        /* $request->validate([
            'empresa_id' => ['required', 'integer', 'exists:empresas,id'],
        ]); */

        $user = User::create([
            'name' => $request->nombres,
            'lastname' => $request->apellidos,
            'dni' => $request->cedula,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $empresario = Empresario::create([
            'user_id' => $user->id,
            'empresa_id' => $request->empresa_id,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'cedula' => $request->cedula,
            'tlf' => $request->tlf,
            'cargo' => $request->cargo,
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Empresario creado correctamente.'
        ]);
        return redirect()->route('admin.empresarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresario $empresario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresario $empresario)
    {
        $empresas = Empresa::all();
        return view('admin.empresarios.edit', compact('empresas', 'empresario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresario $request, Empresario $empresario)
    {
        $empresario->update(
            [
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'cedula' => $request->cedula,
                'edad' => $request->edad,
                'empresa_id' => $request->empresa_id,
                'direccion' => $request->direccion,
                'tlf' => $request->tlf,
                'cargo' => $request->cargo,
            ]
        );

        $uzer = User::find($empresario->user->id);

        $uzer->update(
            [
                'name' => $request->nombres,
                'lastname' => $request->apellidos,
                'dni' => $request->cedula,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]
        );

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Empresario modificado correctamente.',
        ]);

        return redirect()->route('admin.empresarios.index');
    }



    public function confirmDelete(Empresario $empresario)
    {
        $empresas = Empresa::all();

        return view('admin.empresarios.delete', compact('empresario', 'empresas'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresario $empresario)
    {
       $user = $empresario->user;

       $user->delete();

       session()->flash('swal', [
        'icon' => 'success',
        'title' => '¡¡Hecho!!',
        'text' => ' Empresario eliminado correctamente.',
    ]);
       return redirect()->route('admin.empresarios.index');
    }
}
