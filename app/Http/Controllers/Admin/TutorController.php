<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tutores\TutorStore;
use App\Http\Requests\Admin\Tutores\TutorUpdate;
use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;

class TutorController extends Controller
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

        $tutores = Tutor::all();
        return view('admin.tutores.index', compact('tutores', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = Carrera::all();

        return view('admin.tutores.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TutorStore $request)
    {
        $user = User::create([
            'name' => $request->nombres,
            'lastname' => $request->apellidos,
            'dni' => $request->cedula,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $tutor = Tutor::create([
            'user_id' => $user->id,
            'carrera_id' => $request->carrera_id,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'tlf' => $request->tlf,
            'edad' => $request->edad,
            'profesion' => $request->profesion,
            'direccion' => $request->direccion,            
        ]);


        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => ' Tutor creado correctamente.'
        ]);
        return redirect()->route('admin.tutors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tutor $tutor)
    {
        $carreras = Carrera::all();
        return view('admin.tutores.edit', compact('tutor', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TutorUpdate $request, Tutor $tutor)
    {
        $tutor->update([

            'carrera_id' => $request->carrera_id,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'tlf' => $request->tlf,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'profesion' => $request->profesion,

        ]);

        $uzer = User::find($tutor->user->id);

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
            'text' => ' Tutor modificado correctamente.'
        ]);
        return redirect()->route('admin.tutors.index');
    }

    public function confirmDelete(Tutor $tutor)
    {
        $carreras = Carrera::all();

        return view('admin.tutores.delete', compact('tutor', 'carreras'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tutor $tutor)
    {
        $user = $tutor->user;

        $user->delete();
 
        session()->flash('swal', [
         'icon' => 'success',
         'title' => '¡¡Hecho!!',
         'text' => ' Tutor eliminado correctamente.',
     ]);
        return redirect()->route('admin.tutors.index');
    }
}
