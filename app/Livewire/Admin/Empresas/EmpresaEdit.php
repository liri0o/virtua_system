<?php

namespace App\Livewire\Admin\Empresas;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;

class EmpresaEdit extends Component
{
    use WithFileUploads;

    public $empresa;
    public $empresaEdit;
    public $empresaphoto;

    public $photo;

    public function mount($empresa){

       $this->empresaEdit = $empresa->only(
            'name' ,
            'description' ,
            'direccion' ,
            'tlf_1' ,
            'tlf_2' ,
            'email' ,
            'photo' , 
        ); 
        
    }

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
            'photo' => 'nullable|image|max:8192',
            'empresaEdit.name' => 'required|min:3|unique:empresas,name,' . $this->empresa->id,
            'empresaEdit.description' => 'required|min:5',
            'empresaEdit.direccion' => 'required|min:5',
            'empresaEdit.tlf_1' => 'required|unique:empresas,tlf_1,'. $this->empresa->id,
            'empresaEdit.tlf_2' => 'required|unique:empresas,tlf_2,'. $this->empresa->id,
            'empresaEdit.email' => 'required|unique:empresas,email,'. $this->empresa->id,
        ],[],[

            'photo' => 'foto',
            'empresaEdit.name' => 'nombre de la empresa',
            'empresaEdit.description' => 'descripción de la empresa',
            'empresaEdit.direccion' => 'dirección de la empresa',
            'empresaEdit.tlf_1' => 'número telefónico 1',
            'empresaEdit.tlf_2' => 'número telefónico 2',
            'empresaEdit.email' => 'correo electrónico de la empresa',
        ]);

        if ($this->photo){
            Storage::delete($this->empresaEdit['photo']);
            $this->empresaEdit['photo'] = $this->photo->store('empresas');

        }
        
        $this->empresa->update($this->empresaEdit);
        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Empresa modificada satisfactoriamente.'
        ]);

        return redirect()->route('admin.empresas.index');   
    }


    public function render()
    {
        return view('livewire.admin.empresas.empresa-edit');
    }
}
