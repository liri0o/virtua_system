<?php

namespace App\Livewire\Admin\Expedientes;

use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Expediente;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ExpedienteIndex extends Component
{

    public $carreras;
    /* public $carrera_id = ''; */
   /*  public $estudiante_id = ''; */

    public $expediente = [
        'periodo' => '',
        'sem_tri' => '',
        'tipo' => '',
        'estudiante_id' => '',
        'carrera_id' => ''
        /* 'tutor_id' */
    ];

    #[Computed()]
    public function estudiantes(){

        return Estudiante::where('carrera_id', $this->expediente['carrera_id'])->get();

        /* return Estado::where('region_id', $this->localidad['region_id'])->get();  */

    }

    public function mount()
    {
        $this->carreras = Carrera::all();
    }
   
    public function updatedCarreraId($value)
    {               
        $this->expediente['estudiante_id'] = '';
    }

    public function render()
    {
        return view('livewire.admin.expedientes.expediente-index');
    }
}
