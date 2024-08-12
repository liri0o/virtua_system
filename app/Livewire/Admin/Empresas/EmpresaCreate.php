<?php

namespace App\Livewire\Admin\Empresas;

use App\Models\Empresa;
use Livewire\Component;
use Livewire\WithFileUploads;


class EmpresaCreate extends Component
{
    use WithFileUploads;
    public $photo;


    public $empresa = [
        'name' => '',
        'description' => '',
        'direccion' => '',
        'tlf_1' => '',
        'tlf_2' => '',
        'email' => '',
        'photo' => '',
    ];

    public function boot()
    {

        $this->withValidator(function ($validator) {

            if ($validator->fails()) {

                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => '¡Ups, algo salió mal!',
                    'text' => 'El formulario contiene errores.'
                ]);
            }
        });
    }

    public function store()
    {
        $this->validate([
            'photo' => 'required|image|max:8192',
            'empresa.name' => 'required|min:3|unique:empresas,name',
            'empresa.description' => 'required|min:5',
            'empresa.direccion' => 'required|min:5',
            'empresa.tlf_1' => 'required|unique:empresas,tlf_1',
            'empresa.tlf_2' => 'required|unique:empresas,tlf_2',
            'empresa.email' => 'required|unique:empresas,email',
        ],[],[

            'photo' => 'foto',
            'empresa.name' => 'nombre de la empresa',
            'empresa.description' => 'descripción de la empresa',
            'empresa.direccion' => 'dirección de la empresa',
            'empresa.tlf_1' => 'número telefónico 1',
            'empresa.tlf_2' => 'número telefónico 2',
            'empresa.email' => 'correo electrónico de la empresa',
        ]);

        $this->empresa['photo'] = $this->photo->store('empresas');

        Empresa::create($this->empresa);

        session()->flash('swal' , [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Empresa creada satisfactoriamente.'
        ]);

        return redirect()->route('admin.empresas.index');   
    }

    /* 'name',
        'direccion',
        'tlf_1',
        'tlf_2',
        'email',       
        'photo',  */

    public function render()
    {
        return view('livewire.admin.empresas.empresa-create');
    }
}
