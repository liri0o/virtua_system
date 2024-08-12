<x-admin-layout>

    @section('title', 'Estudiantes')

    @section('content_header')
        <h1>Editar Estudiante: {{$estudiante->user->name}}</h1>
    @stop

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.estudiantes.update', $estudiante) }}" method="POST">

                @csrf
                @method('PUT')
                <div class="row">

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Nombres
                        </label>
                        @error('nombres')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese los nombres del estudiante"
                            name="nombres" value="{{ old('nombres', $estudiante->user->name) }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Apellidos
                        </label>
                        @error('apellidos')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text"
                            placeholder="Ingrese los apellidos del estudiante" name="apellidos"
                            value="{{ old('apellidos', $estudiante->user->lastname) }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Cédula de Identidad
                        </label>
                        @error('cedula')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese la cédula del estudiante"
                            name="cedula" value="{{ old('cedula', $estudiante->user->dni) }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Edad
                        </label>
                        @error('edad')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese la edad del estudiante"
                            name="edad" value="{{ old('edad', $estudiante) }}" />
                    </div>
                </div>

                <div class="row">

                    <div class="mb-4 col-md-5">
                        <label class="mb-1 block">
                            Correo electrónico
                        </label>
                        @error('email')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="email"
                            placeholder="Ingrese el correo electrónico del estudiante" name="email"
                            value="{{ old('email', $estudiante->user->email) }}" />
                    </div>

                    <div class="mb-4 col-md-4">
                        <label class="mb-1 block">
                            Número Telefónico
                        </label>
                        @error('tlf')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="tel" placeholder="Digite el número telefónico"
                            name="tlf" value="{{ old('tlf', $estudiante) }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Carrera
                        </label>
                        @error('carrera_id')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-select name="carrera_id" class="w-full mt-1">
                            <option value=""> Seleccione una carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}" @selected(old('carrera_id', $estudiante) == $carrera->id)>{{ $carrera->name }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>

                </div>
                <div class="row">

                    <div class="mb-4 col-md-6">
                        <label class="mb-1 block">
                            Dirección de Habitación
                        </label>
                        @error('direccion')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text"
                            placeholder="Ingrese la direccion del estudiante" name="direccion"
                            value="{{ old('direccion', $estudiante) }}" />
                    </div>

                    <div class="mb-4 col-md-3">
                        <label class="mb-1 block">
                            Contraseña
                        </label>
                        @error('password')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="password" placeholder="Ingrese la contraseña "
                            name="password" value="{{ old('password') }}" id="showPass" />
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
                        <x-input class="mt-2 block w-full" type="password" placeholder="Confirme la contraseña  "
                            name="confirm_password" id="showPass2" />
                        <x-checkbox onclick="myFunction2()" /> <label class="ml-1 mt-1" for="showPass2"> Mostrar
                            contraseña </label>
                    </div>
                </div>

                <div class="flex justify-end w-full">
                    <a href="{{ route('admin.estudiantes.index') }}"><x-adminlte-button class="btn-flat mr-2"
                            label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>

                    <x-adminlte-button class="btn-flat" type="submit" label="Guardar Cambios" theme="success"
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
