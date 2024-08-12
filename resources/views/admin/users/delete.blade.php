<x-admin-layout>

    @section('title', 'Eliminar')

    @section('content_header')
        <h1>Usuario: {{ $user->name }}</h1>
    @stop

    <div class="grid grid-cols-2">

        <x-adminlte-card title="¿Está seguro de eliminar este usuario?" theme="danger">

            <div class="">

                <div class="mb-2">
                    <label class="mb-2 block">
                        Nombres
                    </label>
                    <x-input class="mt-1 block w-full" disabled type="text" name="name"
                        value="{{ old('name', $user) }}" />
                </div>
                <div class="mb-2">
                    <label class="mb-2 block">
                        Apellidos
                    </label>
                    <x-input class="mt-1 block w-full" disabled type="text" name="lastname"
                        value="{{ old('lastname', $user) }}" />
                </div>
            </div>
            <div class="mb-2">
                <label class="mb-2 block">
                    Cédula de Identidad
                </label>
                <x-input class="mt-1 block w-full" disabled type="text" name="dni"
                    value="{{ old('dni', $user) }}" />
            </div>
            <div class="mb-2">
                <label class="mb-2 block">
                    Correo electrónico
                </label>
                <x-input class="mt-1 block w-full" disabled type="email" name="email"
                    value="{{ old('email', $user) }}" />
            </div>
            <div class="flex justify-end w-full mt-4">
                <a href="{{ route('admin.users.index') }}"><x-adminlte-button class="btn-flat mr-2" label="Cancelar"
                        theme="dark" icon="fa-solid fa-angles-left" /></a>

                <x-adminlte-button class="btn-flat" onclick="confirmDelete()" label="Eliminar Usuario" theme="danger"
                    icon="fas fa-lg fa-trash" />

                {{-- </form> --}}
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" id="delete-form">
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

    </div>
</x-admin-layout>
