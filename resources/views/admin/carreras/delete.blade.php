<x-admin-layout>

    @section('title', 'Carreras')

    @section('content_header')
        <h1>Editar Carrera: {{ $carrera->name }}</h1>
    @stop

    <x-adminlte-card title="¿Está seguro de eliminar esta carrera?" theme="danger">

        <div class="row">

            <div class=" col-md-6">
                <label class="mb-1 block">
                    Nombre de la Carrera
                </label>
                <x-input class="mt-2 block w-full" type="text" name="name" disabled
                    value="{{ old('name', $carrera) }}" />
            </div>

            <div class=" mb-4 col-md-6">
                <label class="mb-1 block">
                    Código de la Carrera
                </label>
                <x-input class="mt-2 block w-full" type="text" name="code" disabled
                    value="{{ old('code', $carrera) }}" />
            </div>

        </div>
        <div class="row">
            <div class=" col-md-6">
                <label class="mb-1 block">
                    Fecha de creación
                </label>
                <x-input class="mt-2 block w-full" type="text" name="name" disabled
                    value="{{ $carrera->created_at }}" />
            </div>
            <div class=" col-md-6 mb-4">
                <label class="mb-1 block">
                    Última modificación
                </label>
                <x-input class="mt-2 block w-full" type="text" name="name" disabled
                    value="{{ $carrera->updated_at }}" />
            </div>
            <div class="flex justify-end w-full">
                <a href="{{ route('admin.carreras.index') }}"><x-adminlte-button class="btn-flat mr-2" label="Cancelar"
                        theme="dark" icon="fa-solid fa-angles-left" /></a>
    
                <x-adminlte-button class="btn-flat" onclick="confirmDelete()" label="Eliminar Carrera" theme="danger"
                    icon="fas fa-lg fa-trash" />
    
                <form action="{{ route('admin.carreras.destroy', $carrera) }}" method="POST" id="delete-form">
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

    </x-adminlte-card>




</x-admin-layout>
