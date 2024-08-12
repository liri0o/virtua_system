<x-admin-layout>

    @section('title', 'Usuarios')

    @section('content_header')
        <h1>{{ $user->name }}</h1>
    @stop



    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf

                @method('PUT')

                <div class="">
                    <x-validation-errors class="mb-4" />
                    <div class="row">

                        <div class="mb-4 col-md-3">
                            <label class="mb-1 block">
                                Nombres
                            </label>
                            @error('name')
                                <p class="text-red-600 text-sm"> *Este campo es obligatorio</p>
                            @enderror
                            <x-input class="mt-2 block w-full" type="text"
                                placeholder="Ingrese los nombres del usuario" name="name"
                                value="{{ old('name', $user) }}" />
                        </div>
                        <div class="mb-4 col-md-3">
                            <label class="mb-2 block">
                                Apellidos
                            </label>
                            @error('lastname')
                                <p class="text-red-600 text-sm"> *Este campo es obligatorio</p>
                            @enderror
                            <x-input class="mt-1 block w-full" type="text"
                                placeholder="Ingrese los apellidos del usuario" name="lastname"
                                value="{{ old('lastname', $user) }}" />
                        </div>
                        <div class="mb-4 col-md-3">
                            <label class="mb-2 block">
                                Cédula de Identidad
                            </label>
                            @error('dni')
                                <p class="text-red-600 text-sm"> *Este campo es obligatorio</p>
                            @enderror
                            <x-input class="mt-1 block w-full" type="text"
                                placeholder="Ingrese la cédula del usuario" name="dni"
                                value="{{ old('dni', $user) }}" />
                        </div>    
                        <div class="mb-4 col-md-3">
                            <label class="mb-2 block">
                                Correo electrónico
                            </label>
                            @error('email')
                                <p class="text-red-600 text-sm"> *Este campo es obligatorio</p>
                            @enderror
                            <x-input class="mt-1 block w-full" type="email"
                                placeholder="Ingrese el correo del usuario" name="email"
                                value="{{ old('email', $user) }}" />
                        </div>                   
                    </div>

                    <div class="row">
                                           
                        <div class="mb-4 col-md-6">
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

                        <div class="mb-4 col-md-6">
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
                        <x-adminlte-button class="btn-flat" type="submit" label="Guardar Cambios" theme="success"
                            icon="fas fa-lg fa-save" />
                    </div>

                </div>
                @push('js')
                    @if ($errors->count() > 0)
                        <script>
                            Swal.fire({
                                icon: "error",
                                title: "¡¡Error!!",
                                text: "El formulario contiene errores."
                            });
                        </script>
                    @endif
                @endpush
            </form>
        </div>
    </div>

</x-admin-layout>
