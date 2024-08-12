<x-admin-layout>

    @section('title', 'Usuarios')

    @section('content_header')
        <h1>Nuevo Usuario</h1>
    @stop

    <div class="card ">
        <div class="card-body ">

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="">
                    <x-validation-errors class="mb-4" />
                    <div class="row">
                        
                        <div class="mb-4 col-md-3">
                            <label class="mb-1 block">
                                Nombres
                            </label>
                            @error('name')
                                <p class="text-red-600 text-sm"> *{{ $message }}</p>
                            @enderror
                            <x-input class="mt-2 block w-full" type="text"
                                placeholder="Ingrese los nombres del usuario" name="name"
                                value="{{ old('name') }}" />
                        </div>

                        <div class="mb-4 col-md-3">
                            <label class="mb-1 block">
                                Apellidos
                            </label>
                            @error('lastname')
                                <p class="text-red-600 text-sm"> *{{ $message }}</p>
                            @enderror
                            <x-input class="mt-2 block w-full" type="text"
                                placeholder="Ingrese los apellidos del usuario" name="lastname"
                                value="{{ old('lastname') }}" />
                        </div>

                        <div class="mb-4 col-md-3">
                            <label class="mb-1 block">
                                Cédula de Identidad
                            </label>
                            @error('dni')
                                <p class="text-red-600 text-sm"> *{{ $message }}</p>
                            @enderror
                            <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese la cédula del usuario"
                                name="dni" value="{{ old('dni') }}" />
                        </div>              
                    </div>
                  
                    <div class="row">
                        <div class="mb-4 col-md-3">
                            <label class="mb-1 block">
                                Correo electrónico
                            </label>
                            @error('email')
                                <p class="text-red-600 text-sm"> *{{ $message }}</p>
                            @enderror
                            <x-input class="mt-2 block w-full" type="email" placeholder="Ingrese el correo electrónico del usuario"
                                name="email" value="{{ old('email') }}" />
                        </div>   
                         <div class="mb-4 col-md-3">
                            <label class="mb-1 block">
                                Contraseña
                            </label>
                            @error('password')
                                <p class="text-red-600 text-sm"> *{{ $message }}</p>
                            @enderror
                            <x-input class="mt-2 block w-full" type="password"
                                placeholder="Ingrese la contraseña del usuario" name="password"
                                value="{{ old('password') }}" />
                        </div>

                        <div class="mb-4 col-md-3">
                            <label class="mb-1 block">
                                Confirmar Contraseña
                            </label>
                            @error('confirm_password')
                                <p class="text-red-600 text-sm"> *{{ $message }}</p>
                            @enderror
                            <x-input class="mt-2 block w-full" type="password"
                                placeholder="Ingrese la contraseña del usuario" name="confirm_password"
                                 />
                        </div>

                    </div>                                    
                    
                    <div class="flex justify-end w-full">
                        <a href="{{ route('admin.users.index') }}"><x-adminlte-button class="btn-flat mr-2"
                                label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>

                        <x-adminlte-button class="btn-flat" type="submit" label="Crear Usuario" theme="success"
                            icon="fas fa-lg fa-save" />
                    </div>
                </div>
            </form>
            @push('js')
                @if ($errors->count() > 0)
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "¡¡Ups!!",
                            text: "El formulario contiene errores."
                        });
                    </script>
                @endif
            @endpush
        </div>
    </div>






</x-admin-layout>
