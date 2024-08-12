<x-admin-layout>

    @section('title', 'Carreras')

    @section('content_header')
        <h1>Nueva</h1>
    @stop

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.carreras.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class=" col-md-6">
                        <label class="mb-1 block">
                            Nombre de la Carrera
                        </label>
                        @error('name')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese el nombre de la carrera"
                            name="name" value="{{ old('name') }}" />
                    </div>

                    <div class=" mb-4 col-md-6">
                        <label class="mb-1 block">
                            Código de la Carrera
                        </label>
                        @error('code')
                            <p class="text-red-600 text-sm"> *{{ $message }}</p>
                        @enderror
                        <x-input class="mt-2 block w-full" type="text" placeholder="Ingrese el código de la carrera"
                            name="code" value="{{ old('code') }}" />
                    </div>

                    <div class="flex justify-end w-full">
                        <a href="{{ route('admin.carreras.index') }}"><x-adminlte-button class="btn-flat mr-2"
                                label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>

                        <x-adminlte-button class="btn-flat" type="submit" label="Crear Carrera" theme="success"
                            icon="fas fa-lg fa-save" />
                    </div>

                </div>

            </form>


        </div>
    </div>

</x-admin-layout>
