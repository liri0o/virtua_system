<x-admin-layout>

    @section('title', 'Empresarios')

    @section('content_header')
        <h1>Nuevo</h1>
    @stop

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.empresarios.store') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Nombres
                        </label>
                        @error('nombres')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese los nombres del usuario"
                            name="nombres" value="{{ old('nombres') }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Apellidos
                        </label>
                        @error('apellidos')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text"
                            placeholder="Ingrese los apellidos del usuario" name="apellidos"
                            value="{{ old('apellidos') }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Cédula de Identidad
                        </label>
                        @error('cedula')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese la cédula del usuario"
                            name="cedula" value="{{ old('cedula') }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Edad
                        </label>
                        @error('edad')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese la edad del usuario"
                            name="edad" value="{{ old('edad') }}" />
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
                        <x-input class="mt-2 block w-full" type="email"
                            placeholder="Ingrese el correo electrónico del usuario" name="email"
                            value="{{ old('email') }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Número Telefónico
                        </label>
                        @error('tlf')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="tel" placeholder="Digite su número telefónico"
                            name="tlf" value="{{ old('tlf') }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Empresa
                        </label>
                        @error('empresa_id')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-select name="empresa_id" class="w-full mt-1">
                            <option value=""> Seleccione una empresa</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}" @selected(old('empresa_id') == $empresa->id)>{{ $empresa->name }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Cargo
                        </label>
                        @error('cargo')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese el cargo en la empresa"
                            name="cargo" value="{{ old('cargo') }}" />
                    </div>

                </div>
                <div class="row">

                    <div class="mb-4 col-md-6">
                        <label class="mb-1 block">
                            Dirección de residencia
                        </label>
                        @error('direccion')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text"
                            placeholder="Ingrese la direccion de residencia del empresario" name="direccion"
                            value="{{ old('direccion') }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Contraseña
                        </label>
                        @error('password')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="password"
                            placeholder="Ingrese la contraseña " name="password"
                            value="{{ old('password') }}" id="showPass" />
                        <x-checkbox onclick="myFunction()" /> <label class="ml-1 mt-1" for="showPass"> Mostrar
                            contraseña </label>
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Confirmar Contraseña
                        </label>
                        @error('confirm_password')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="password"
                            placeholder="Confirme la contraseña  " name="confirm_password" id="showPass2"/>
                            <x-checkbox onclick="myFunction2()" /> <label class="ml-1 mt-1" for="showPass2"> Mostrar
                                contraseña </label>
                    </div>
                </div>

                <div class="flex justify-end w-full">
                    <a href="{{ route('admin.empresarios.index') }}"><x-adminlte-button class="btn-flat mr-2"
                            label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>

                    <x-adminlte-button class="btn-flat" type="submit" label="Crear Empresario" theme="success"
                        icon="fas fa-lg fa-save" />
                </div>
            </form>

        </div>
    </div>

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

        <script>
            function myFunction() {
                var x = document.getElementById("showPass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <script>
            function myFunction2() {
                var x = document.getElementById("showPass2");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    @endpush

</x-admin-layout>
