<x-admin-layout>

    @section('title', 'Expedientes')

    @section('content_header')
        <h1>Expedientes</h1>
    @stop


    <div>
        <div class="w-full row mb-3 flex justify-end">
            <a href="{{ route('admin.expedientes.create') }}">
                <x-adminlte-button label="Nuevo" type="button" theme="success" icon="fa-solid fa-folder-plus" />
            </a>

        </div>

        <div class="card">
            <div class="card-body">

                <div class="row">

                    @foreach ($expedientes as $expediente)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">

                                    <a href="{{route('admin.expedientes.show', $expediente)}}">
                                        <div class="inline">
                                            <label class="card-title cursor-pointer"><i
                                                    class="fa-regular fa-folder-open mr-2"></i>{{ $expediente->estudiante->user->name }}</label>
                                        </div>
                                    </a>

                                    <div class="card-tools">
                                        <div class="dropdown cursor-pointer">
                                            
                                                <x-dropdown>
                                                    <x-slot name="trigger">
                                                        <i class="fa-solid fa-ellipsis-vertical">
                                                        </i>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                                            Expediente
                                                        </div>
                                                        <x-dropdown-link href="{{ route('profile.show') }}">
                                                            Editar
                                                        </x-dropdown-link>
                                                        <x-dropdown-link href="{{ route('admin.expedientes.show', $expediente) }}">
                                                            Ver
                                                        </x-dropdown-link>
                                                    </x-slot>
                                                </x-dropdown>
                                            
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('admin.expedientes.show', $expediente)}}">
                                <div class="card-body">                                                                        
                                    <h6 class="text-sm">{{ $expediente->carrera->name }}</h6>
                                    <span class="text-sm">{{ $expediente->periodo }}</span>
                                </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- <span class="relative mb-4 mr-4">
        <x-dropdown>
            <x-slot name="trigger">
                <i class="fa-solid fa-ellipsis-vertical">
                </i>
            </x-slot>
            <x-slot name="content">
                <div class="block px-4 py-2 text-xs text-gray-400">
                    Expediente
                </div>
                <x-dropdown-link href="{{ route('profile.show') }}">
                    Editar
                </x-dropdown-link>
                <x-dropdown-link href="{{ route('profile.show') }}">
                    Ver
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>
    </span> --}}
    {{-- Dropdown
         <span class="">
            <x-dropdown>
                <x-slot name="trigger">
                    <i  class="fa-solid fa-ellipsis-vertical">
                    </i>
                </x-slot>
                <x-slot name="content">
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        Expediente
                    </div>
                    <x-dropdown-link href="{{ route('profile.show') }}">
                        Editar
                    </x-dropdown-link>
                    <x-dropdown-link href="{{ route('profile.show') }}">
                        Ver
                    </x-dropdown-link>
                </x-slot>                       
            </x-dropdown>
        </span>
         --}}




    {{-- folder original
    
    <div class="col-md-3">

                            <a href="{{ route('admin.expedientes.show', $expediente) }}">
                                <div class="info-box">
                                    <span class="info-box-icon bg-secondary"><i class="fa-solid fa-folder"></i></span>
                                    <div class="info-box-content">
                                        <span class="bold">{{ $expediente->estudiante->user->name }}</span>
                                        <h6 class="text-sm">{{ $expediente->carrera->name }}</h6>
                                        <span class="text-sm">{{ $expediente->periodo }}</span>
                                    </div>
                                </div>
                            </a>

                            {{--  <span>
                                        <i class="fa-solid fa-ellipsis-vertical">
                                        </i>
                                    </span> 

    </div>
    --}}
</x-admin-layout>
