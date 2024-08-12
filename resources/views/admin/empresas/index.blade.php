<x-admin-layout>

    @section('title', 'Empresas')

    @section('content_header')
        <h1>Gestión de Empresas</h1>
    @stop
<div class="w-full row mb-3 flex justify-end">
                <a href="{{ route('admin.empresas.create') }}">
                    <x-adminlte-button label="Nuevo" type="button" theme="success" icon="fa-solid fa-user-plus" />
                </a>
            </div>
    <div class="card">
        <div class="card-body">
            
            <x-adminlte-datatable id="table1" :heads="$heads" striped with-buttons hoverable>

                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{ $empresa->id }}</td>
                        <td>{{ $empresa->name }}</td>
                        <td>{{ $empresa->email }}</td>
                        {{-- <td>{{ $user->role }}</td> --}}
                        <td>{{ $empresa->created_at }}</td>

                        <td>
                            <div class="flex">
                                <a href="{{ route('admin.empresas.edit', $empresa) }}">
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">

                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                </a>

                                <a href="{{ route('admin.empresas.confirmDelete', $empresa) }}">
                                    <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow"
                                        title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                </a>

                                <a href="">
                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </x-adminlte-datatable>

        </div>
    </div>

</x-admin-layout>
