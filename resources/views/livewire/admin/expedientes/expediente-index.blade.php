<div class="card">

    <div class="card-body">

        <form action="">
            <label class="mb-1 block">
                Estudiante
            </label>
            <div class="row mb-4">

                <div class="col-md-6">
                    <x-select class="w-full" wire:model.live="expediente.carrera_id">
                        <option value=""> Seleccione una carrera</option>
                        @foreach ($carreras as $carrera)
                            <option value="{{ $carrera->id }}">
                                {{ $carrera->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
                <div class="col-md-6">
                    <x-select class="w-full" wire:model.live="expediente.estudiante_id">
                        <option value=""> Seleccione un estudiante</option>
                        @foreach ($this->estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}">
                                {{ $estudiante->user->name }}
                            </option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <label class="mb-1 block">
                Tutor
            </label>
            <div class="row">
                <div class="col-md-6">
                    <x-select class="w-full">
                        <option value=""> Seleccione una carrera</option>
                    </x-select>
                </div>
                <div class="col-md-6">
                    <x-select class="w-full">
                        <option value=""> Seleccione una carrera</option>
                    </x-select>
                </div>
            </div>
        </form>
    </div>

</div>
