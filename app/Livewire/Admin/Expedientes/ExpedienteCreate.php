<?php

namespace App\Livewire\Admin\Expedientes;

use App\Models\Carrera;
use App\Models\Empresa;
use App\Models\Estudiante;
use App\Models\Expediente;
use App\Models\Tutor;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ExpedienteCreate extends Component
{
    public $carreras;
    public $empresas;
    /* public $carrera_id = ''; */
    /*  public $estudiante_id = ''; */

    public $expediente = [
        'periodo' => '',
        'sem_tri' => '',
        'tipo' => '',
        'carrera_id' => '',
        'estudiante_id' => '',
        'tutor_id' => '',
        'empresa_id' => '',
        'serv_time' => null,
        'date_ini' => null,
        'date_end' => null
    ];

    #[Computed()]
    public function estudiantes()
    {
        return Estudiante::where('carrera_id', $this->expediente['carrera_id'])->get();
    }
    #[Computed()]
    public function tutores()
    {
        return Tutor::where('carrera_id', $this->expediente['carrera_id'])->get();
    }

    public function mount()
    {
        $this->carreras = Carrera::all();
        $this->empresas = Empresa::all();
    }

    public function updatedExpedienteCarreraId()
    {
        $this->expediente['estudiante_id'] = '';
        $this->expediente['tutor_id'] = '';
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

            'expediente.periodo' => 'required|min:3',
            'expediente.serv_time' => 'nullable|string',
            'expediente.sem_tri' => 'required|min:1',
            'expediente.tipo' => 'required',
            'expediente.date_ini' => 'nullable|date',
            'expediente.date_end' => 'nullable|date',
            'expediente.carrera_id' => 'required|exists:carreras,id',
            'expediente.estudiante_id' => 'required|exists:estudiantes,id|unique:expedientes,estudiante_id',
            'expediente.tutor_id' => 'required|exists:tutors,id',
            'expediente.empresa_id' => 'required|exists:empresas,id',
        ]);
        
        /* dd($this->expediente); */
         Expediente::create($this->expediente); 

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡¡Listo!!',
            'text' => 'Expediente creado satisfactoriamente.'
        ]);

        return redirect()->route('admin.expedientes.index');
    }


    public function render()
    {
        return view('livewire.admin.expedientes.expediente-create');
    }
}
