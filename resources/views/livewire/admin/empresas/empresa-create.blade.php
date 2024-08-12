<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="card">
        <div class="card-body">

            <form wire:submit.prevent="store">
                @csrf
                <div class="grid grid-cols-3 grid-rows-2 gap-4">
                    {{-- img --}}
                    <div class="">
                        <label class="text-gray-700 text-sm font-bold mb-2 w-full text-center" for="photo">
                            Foto de la Empresa <span class="text-red-600"> </span>
                        </label>
                        <div class="relative mb-4 justify-center w-full">
                            
                            <img class="block w-50 h-50 rounded-full m-auto shadow object-contain object-center border-2 border-gray-200 border-solid dark:border-gray-300"
                                src="{{ $photo ? $photo->temporaryUrl() : asset('vendor/adminlte/dist/img/seguridad-red.png') }}"
                                alt="">
                        </div>
                        <label
                            class="cursor-pointer flex justify-center items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3">
                            <i class="fas fa-camera mr-2"></i>
                            Seleccionar Nueva Foto
                            <input type="file" accept="image/*" class="hidden" wire:model="photo">
                        </label>
                        <x-input-error for="photo" />

                    </div>

                    {{-- Forms --}}
                    <div class="col-span-2 row">

                        <div class="mb-2 col-md-6">
                            <label class="mb-1 block">
                                Nombre de la Empresa
                            </label>
                            <x-input-error for="empresa.name" />
                            <x-input class="mt-2 block w-full" type="text"
                                placeholder="Ingrese el nombre de la empresa" name="name"
                                wire:model="empresa.name" />
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="mb-1 block">
                                Correo Electrónico de la Empresa
                            </label>
                            <x-input-error for="empresa.email" />
                            <x-input class="mt-2 block w-full" type="text"
                                placeholder="Ingrese el nombre de la empresa" name="email"
                                wire:model="empresa.email" />
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="mb-1 block">
                                Número Telefónico 1
                            </label>
                            <x-input-error for="empresa.tlf_1" />
                            <x-input class="mt-2 block w-full" type="tel" placeholder="Ingrese un número telefónico"
                                name="tlf_1" wire:model="empresa.tlf_1" />
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="mb-1 block">
                                Número Telefónico 2
                            </label>
                            <x-input-error for="empresa.tlf_2" />
                            <x-input class="mt-2 block w-full" type="tel" placeholder="Ingrese un número telefónico"
                                name="tlf_2" wire:model="empresa.tlf_2" />
                        </div>
                        <div class="mb-2 col-md-12">
                            <label class="mb-1 block">
                                Dirección de la Empresa
                            </label>
                            <x-input-error for="empresa.direccion" />
                            <x-input class="mt-2 block w-full" type="text"
                                placeholder="Ingrese el nombre de la empresa" name="direccion"
                                wire:model="empresa.direccion" />
                        </div>
                    </div>

                    <div class="col-span-3 row-start-2">
                        <div class="mb-2 col-md-12">
                            <label class="mb-1 block">
                                Descripción de la Empresa
                            </label>
                            <x-input-error for="empresa.description" />
                            <x-textarea wire:model="empresa.description" class="w-full resize-none h-40"
                                placeholder="Ingrese una descripción sobre la empresa"> </x-textarea>
                        </div> 
                        <div class=" flex justify-end w-full">
                            <a href="{{ route('admin.empresas.index') }}"><x-adminlte-button class="btn-flat mr-2"
                                label="Cancelar" theme="dark" icon="fa-solid fa-angles-left" /></a>
                            <x-adminlte-button class="btn-flat mr-2" type="submit" label="Crear Empresa" theme="success"
                                icon="fas fa-lg fa-save" />
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
    </div>
</div>
