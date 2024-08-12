<x-admin-layout>

    @section('title', 'Estudiantes')

    @section('content_header')
        <h1>Eliminar Estudiante: {{ $estudiante->user->name }}</h1>
    @stop

    <x-adminlte-card title="¿Está seguro de eliminar este Estudiante?" theme="danger">

        <div class="row">

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Nombres
                </label>
                <x-input class="mt-2 block w-full" type="text" name="nombres"
                    value="{{ old('nombres', $estudiante->user->name) }}" disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Apellidos
                </label>
                <x-input class="mt-2 block w-full" type="text" name="apellidos"
                    value="{{ old('apellidos', $estudiante->user->lastname) }}" disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Cédula de Identidad
                </label>
                <x-input class="mt-2 block w-full" type="text" name="cedula"
                    value="{{ old('cedula', $estudiante->user->dni) }}" disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Edad
                </label>
                <x-input class="mt-2 block w-full" type="text" name="edad" value="{{ old('edad', $estudiante) }}"
                    disabled />
            </div>
        </div>

        <div class="row">

            <div class="mb-4 col-md-5">
                <label class="mb-1 block">
                    Correo electrónico
                </label>

                <x-input class="mt-2 block w-full" type="email" name="email"
                    value="{{ old('email', $estudiante->user->email) }}" disabled />
            </div>

            <div class="mb-4 col-md-4">
                <label class="mb-1 block">
                    Número Telefónico
                </label>

                <x-input class="mt-2 block w-full" type="tel" name="tlf" value="{{ old('tlf', $estudiante) }}"
                    disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Carrera
                </label>
                <x-input value="{{ $estudiante->carrera->name }}" name="carrera_id" class="w-full mt-1" disabled />

            </div>

        </div>
        <div class="row">

            <div class="mb-4 col-md-6">
                <label class="mb-1 block">
                    Dirección de Habitación
                </label>               
                <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese la direccion del estudiante"
                    name="direccion" value="{{ old('direccion', $estudiante) }}" disabled />
            </div>

            <div class="col-md-6 flex items-end ">

                <div class="flex items-end justify-end w-full">
                    <a href="{{ route('admin.estudiantes.index') }}"><x-adminlte-button class="btn-flat mr-2"
                            label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>

                    <x-adminlte-button class="btn-flat" onclick="confirmDelete()" label="Eliminar Estudiante"
                        theme="danger" icon="fas fa-lg fa-trash" />

                    <form action="{{ route('admin.estudiantes.destroy', $estudiante) }}" method="POST"
                        id="delete-form">
                        @csrf
                        @method('DELETE')

                    </form>

                    @push('js')
                        <script>
                            function confirmDelete() {
                                Swal.fire({
                                    title: "¿Estás seguro?",
                                    text: "¡No podrás revertir esta acción!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Si, bórralo!",
                                    cancelButtonText: "Cancelar"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById('delete-form').submit();
                                    }
                                });
                            }
                        </script>
                    @endpush
                </div>
            </div>
        </div>

    </x-adminlte-card>


</x-admin-layout>
