<x-admin-layout>

    @section('title', 'Empresarios')

    @section('content_header')
        <h1>Eliminar Empresario: {{ $empresario->user->name }}</h1>
    @stop

    <x-adminlte-card title="¿Está seguro de eliminar este Empresario registrado?" theme="danger">

        <div class="row">

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Nombres
                </label>
               
                <x-input class="mt-2 block w-full" type="text" name="nombres"
                    value="{{ old('nombres', $empresario->user->name) }}" disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Apellidos
                </label>
               
                <x-input class="mt-2 block w-full" type="text" name="apellidos"
                    value="{{ old('apellidos', $empresario->user->lastname) }}" disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Cédula de Identidad
                </label>
                
                <x-input class="mt-2 block w-full" type="text" name="cedula"
                    value="{{ old('cedula', $empresario->user->dni) }}" disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Edad
                </label>
                
                <x-input class="mt-2 block w-full" type="text" name="edad" value="{{ old('edad', $empresario) }}"
                    disabled />
            </div>
        </div>

        <div class="row">

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Correo electrónico
                </label>
              
                <x-input class="mt-2 block w-full" type="email" name="email"
                    value="{{ old('email', $empresario->user->email) }}" disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Número Telefónico
                </label>
               
                <x-input class="mt-2 block w-full" type="tel" name="tlf" value="{{ old('tlf', $empresario) }}"
                    disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Empresa
                </label>                

                <x-input value="{{ $empresario->empresa->name }}" name="empresa_id" class="w-full mt-1" disabled />
            </div>

            <div class="mb-4 col-md-3">
                <label class="mb-1 block">
                    Cargo
                </label>
             
                <x-input class="mt-2 block w-full" type="text" name="cargo"
                    value="{{ old('cargo', $empresario) }}" disabled />
            </div>

        </div>
        <div class="row">

            <div class="mb-4 col-md-6">
                <label class="mb-1 block">
                    Dirección de Habitación
                </label>      
                
                 <x-input class="mt-2 block w-full" type="text" value="{{ old('direccion', $empresario) }}"
                    disabled /> 
                    
            </div>
            <div class="col-md-6 flex items-end ">

                <div class="flex items-end justify-end w-full">
                    <a href="{{ route('admin.empresarios.index') }}"><x-adminlte-button class="btn-flat mr-2"
                            label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>

                    <x-adminlte-button class="btn-flat" onclick="confirmDelete()" label="Eliminar Empresario"
                        theme="danger" icon="fas fa-lg fa-trash" />

                    <form action="{{ route('admin.empresarios.destroy', $empresario) }}" method="POST"
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
