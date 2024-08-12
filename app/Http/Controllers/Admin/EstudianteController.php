<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Estudiantes\EstudianteStore;
use App\Http\Requests\Admin\Estudiantes\EstudianteUpdate;
use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;

class EstudianteController extends Controller
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
            'Carrera',
            'Acciones'
        ];

        $estudiantes = Estudiante::all();

        return view('admin.estudiantes.index', compact('heads', 'estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = Carrera::all();

        return view('admin.estudiantes.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudianteStore $request)
    {
        $user = User::create([
            'name' => $request->nombres,
            'lastname' => $request->apellidos,
            'dni' => $request->cedula,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $estudiante = Estudiante::create([
            'user_id' => $user->id,
            'carrera_id' => $request->carrera_id,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'tlf' => $request->tlf,
            'edad' => $request->edad,
            'direccion' => $request->direccion,            
        ]);


        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Estudiante creado correctamente.'
        ]);
        return redirect()->route('admin.estudiantes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        return view('admin.estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        $carreras = Carrera::all();
        return view('admin.estudiantes.edit', compact('estudiante', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudianteUpdate $request, Estudiante $estudiante)
    {
        $estudiante->update([

            'carrera_id' => $request->carrera_id,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'tlf' => $request->tlf,
            'edad' => $request->edad,
            'direccion' => $request->direccion,

        ]);

        $uzer = User::find($estudiante->user->id);

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
            'title' => '¡¡Hecho!!',
            'text' => ' Estudiante modificado correctamente.'
        ]);
        return redirect()->route('admin.estudiantes.index');
    }

    public function confirmDelete(Estudiante $estudiante)
    {
        $carreras = Carrera::all();

        return view('admin.estudiantes.delete', compact('estudiante', 'carreras'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estudiante $estudiante)
    {
       $user = $estudiante->user;

       $user->delete();

       session()->flash('swal', [
        'icon' => 'success',
        'title' => '¡¡Hecho!!',
        'text' => ' Estudiante eliminado correctamente.',
    ]);
       return redirect()->route('admin.estudiantes.index');
    }
}
