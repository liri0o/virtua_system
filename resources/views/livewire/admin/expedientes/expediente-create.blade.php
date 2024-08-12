<div>
    <div class="card">

        <div class="card-body">

            <form wire:submit.prevent="store">
                @csrf

                <x-validation-errors class="mb-2" />
                <div class="row mb-4">

                    <div class="col-md-6">
                        <label class="mb-2 block">
                            Carrera
                        </label>
                        <x-select class="w-full" wire:model.live="expediente.carrera_id">
                            <option value="" disabled> Seleccione una carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">
                                    {{ $carrera->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error for="expediente.carrera_id" />
                    </div>
                    <div class="col-md-3">
                        <label class="mb-2 block">
                            Estudiante
                        </label>
                        <x-select class="w-full" name="estudiante_id" wire:model.live="expediente.estudiante_id">
                            <option value="" disabled> Seleccione un estudiante</option>
                            @foreach ($this->estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" @selected(old('estudiante_id') == $estudiante->id)>
                                    {{ $estudiante->user->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error for="expediente.estudiante_id" />
                    </div>
                    <div class="col-md-3">
                        <label class="mb-2 block">
                            Tutor
                        </label>
                        <x-select class="w-full" name="tutor_id" wire:model.live="expediente.tutor_id">
                            <option value="" disabled> Seleccione un tutor</option>
                            @foreach ($this->tutores as $tutor)
                                <option value="{{ $tutor->id }}">
                                    {{ $tutor->user->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error for="expediente.tutor_id" />

                    </div>

                </div>

                <div class="row mb-4">
                    <div class="col-md-3">
                        <label class="mb-1 block">
                            Periodo Académico
                        </label>
                        @error('periodo')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="block w-full" type="text" placeholder="Ingrese el periodo académico"
                            name="periodo" value="{{ old('periodo') }}" wire:model="expediente.periodo" />
                        <x-input-error for="expediente.periodo" />
                    </div>

                    <div class="col-md-4">
                        <label class="mb-1 block">
                            Semestre/Trimestre
                        </label>
                        @error('sem_tri')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="block w-full" type="text"
                            placeholder="Ingrese el semestre/trimestre cursante" name="sem_tri"
                            value="{{ old('sem_tri') }}" wire:model="expediente.sem_tri" />
                        <x-input-error for="expediente.sem_tri" />
                    </div>

                    <div class="col-md-5">
                        <label class="mb-1 block">
                            Empresa
                        </label>
                        <x-select class="w-full" wire:model.live="expediente.empresa_id">
                            <option value="" disabled> Seleccione una empresa</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}">
                                    {{ $empresa->name }}
                                </option>
                            @endforeach
                        </x-select>
                        <x-input-error for="expediente.empresa_id" />
                    </div>

                </div>

                <div class="row mb-4" x-data="{ opcionSeleccionada: '' }">

                    {{-- XXXXXXXXXXXXXXXXTipoXXXXXXXXXXXXXX --}}
                    <div class="col-md-6">
                        <label class="mb-1 block">
                            Tipo de Práctica Profesional
                        </label>
                        @error('tipo')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-select id="opcion" x-model="opcionSeleccionada" class="w-full"
                            wire:model.live="expediente.tipo">
                            <option value="" disabled> Seleccione el tipo de Práctica Profesional</option>
                            <option value="Practica Profesional"> Práctica Profesional</option>
                            <option value="Adelanto"> Adelanto</option>
                            <option value="PAEL">Acreditación por Experiencia Laboral
                            </option>
                        </x-select>
                        <x-input-error for="expediente.tipo" />
                    </div>


                    <div class="col-md-3" id="date1"
                        x-show="opcionSeleccionada === 'Practica Profesional' || opcionSeleccionada === 'Adelanto'">
                        <label class="mb-1 block">
                            Fecha de Inicio
                        </label>
                        <x-input value="{{ old('date_ini') }}" type="date" class="w-full"
                            wire:model="expediente.date_ini" />
                        <x-input-error for="expediente.date_ini" />
                    </div>

                    <div class="col-md-3" id="date2"
                        x-show="opcionSeleccionada === 'Practica Profesional' || opcionSeleccionada === 'Adelanto'">
                        <label class="mb-1 block">
                            Fecha de Culminación
                        </label>
                        <x-input value="{{ old('date_end') }}" type="date" class="w-full"
                            wire:model="expediente.date_end" />
                        <x-input-error for="expediente.date_end" />
                    </div>


                    <div class="col-md-6" x-show="opcionSeleccionada === 'PAEL'">

                        <label class="mb-1 block">
                            Años de Experiencia
                        </label>
                        <x-input class="block w-full" type="text" placeholder="Ingrese los años de servicio"
                            name="serv_time" value="{{ old('expediente.serv_time') }}"
                            wire:model="expediente.serv_time" />

                        <x-input-error for="expediente.serv_time" />

                    </div>
                </div>

                <div class=" flex justify-end w-full">
                    <a href="{{ route('admin.expedientes.index') }}"><x-adminlte-button class="btn-flat mr-2"
                            label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>
                    <x-adminlte-button class="btn-flat mr-2" type="submit" label="Crear Expediente" theme="success"
                        icon="fas fa-lg fa-save" />
                </div>
            </form>
        </div>
    </div>
</div>
