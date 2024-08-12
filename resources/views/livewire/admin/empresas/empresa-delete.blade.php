<div>
    
    <x-adminlte-card title="¿Está seguro de eliminar esta empresa?" theme="danger">
        <div class="grid grid-cols-3 grid-rows-2 gap-4">
           
            <div class="">
                <label class="text-gray-700 text-sm font-bold mb-2 w-full text-center" for="photo">
                    Foto de la Empresa <span class="text-red-600"> </span>
                </label>
                <div class="relative mb-4 justify-center w-full">
                    <img class="block w-50 h-50 rounded-full m-auto shadow object-contain object-center border-2 border-gray-200 border-solid dark:border-gray-300"
                        src="{{ Storage::url($empresa['photo']) }}" alt="">
                </div>
            </div>       

            {{-- Forms --}}
            <div class="col-span-2 row">

                <div class="mb-2 col-md-6">
                    <label class="mb-1 block">
                        Nombre de la Empresa
                    </label>
                    <x-input-error for="empresaDelete.name" />
                    <x-input class="mt-2 block w-full" type="text"
                        placeholder="Ingrese el nombre de la empresa" disabled name="name"
                        wire:model="empresaDelete.name" />
                </div>

                <div class="mb-2 col-md-6">
                    <label class="mb-1 block">
                        Correo Electrónico de la Empresa
                    </label>
                    <x-input-error for="empresaDelete.email" />
                    <x-input class="mt-2 block w-full" type="text"
                        placeholder="Ingrese el nombre de la empresa" disabled name="email"
                        wire:model="empresaDelete.email" />
                </div>

                <div class="mb-2 col-md-6">
                    <label class="mb-1 block">
                        Número Telefónico 1
                    </label>
                    <x-input-error for="empresaDelete.tlf_1" />
                    <x-input class="mt-2 block w-full" type="tel" placeholder="Ingrese un número telefónico"
                        disabled name="tlf_1" wire:model="empresaDelete.tlf_1" />
                </div>

                <div class="mb-2 col-md-6">
                    <label class="mb-1 block">
                        Número Telefónico 2
                    </label>
                    <x-input-error for="empresaDelete.tlf_2" />
                    <x-input class="mt-2 block w-full" type="tel" placeholder="Ingrese un número telefónico"
                        disabled name="tlf_2" wire:model="empresaDelete.tlf_2" />
                </div>
                <div class="mb-2 col-md-12">
                    <label class="mb-1 block">
                        Dirección de la Empresa
                    </label>
                    <x-input-error for="empresaDelete.direccion" />
                    <x-input class="mt-2 block w-full" type="text"
                        placeholder="Ingrese el nombre de la empresa" disabled name="direccion"
                        wire:model="empresaDelete.direccion" />
                </div>
            </div>

            <div class="col-span-3 row-start-2">
                <div class="mb-2 col-md-12">
                    <label class="mb-1 block">
                        Descripción de la Empresa
                    </label>
                    <x-input-error for="empresaDelete.description" />
                    <x-textarea wire:model="empresaDelete.description" disabled class="w-full resize-none h-40"
                        placeholder="Ingrese una descripción sobre la empresa"> </x-textarea>
                </div> 


                    <div class="flex justify-end w-full mt-4">
                        <a href="{{ route('admin.empresas.index') }}"><x-adminlte-button class="btn-flat mr-2"
                                label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>

                        <x-adminlte-button class="btn-flat" onclick="confirmDelete()" label="Eliminar Empresa"
                            theme="danger" icon="fas fa-lg fa-trash" />

                        
                        <form action="{{ route('admin.empresas.destroy', $empresa) }}" method="POST" id="delete-form">
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

</div>
