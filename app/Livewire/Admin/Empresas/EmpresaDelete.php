<?php

namespace App\Livewire\Admin\Empresas;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;

class EmpresaDelete extends Component
{
     use WithFileUploads;

    public $empresa;
    public $empresaDelete;

    public $photo;

    public function mount($empresa){

        $this->empresaDelete = $empresa->only(

            'name' ,
            'description' ,
            'direccion' ,
            'tlf_1' ,
            'tlf_2' ,
            'email' ,
            'photo' ,
        );
    }

    public function render()
    {
        return view('livewire.admin.empresas.empresa-delete');
    }
}
