<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Users\StoreUser;
use App\Http\Requests\Admin\Users\UpdateUser;

class UserController extends Controller
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

        $users = User::all();

        return view('admin.users.index', compact('heads', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUser $request)
    {

        $user = User::create($request->only('name', 'lastname','dni', 'email')
            + [
                'password' => bcrypt($request->input('password'))
            ]);


        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Usuario creado correctamente.'
        ]);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, User $user)
    {
        $user->update($request->only('name', 'lastname','dni', 'email')
            + [
                'password' => bcrypt($request->input('password'))
            ]);
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Usuario modificado correctamente.',
        ]);
        return redirect()->route('admin.users.index');
    }
    public function confirmDelete(User $user)
    {
        return view('admin.users.delete', compact('user'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) 
    {
        $user->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Usuario eliminado correctamente.'
        ]);

        return redirect()->route('admin.users.index')
            ->with('message', 'Usuario eliminado correctamente.');
    }
}
