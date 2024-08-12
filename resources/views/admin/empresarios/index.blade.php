<x-admin-layout>

    @section('title', 'Empresarios')

    @section('content_header')
        <h1>Gestión de Empresarios</h1>
    @stop

    <div class="w-full row mb-3 flex justify-end">
        <a href=" {{ route('admin.empresarios.create') }}">
            <x-adminlte-button label="Nuevo" type="button" theme="success" icon="fa-solid fa-user-plus" />
        </a>
    </div>
    <div class="card">
        <div class="card-body">

            <x-adminlte-datatable id="table1" :heads="$heads" striped with-buttons hoverable>

                @foreach ($empresarios as $empresario)
                    <tr>
                        <td>{{ $empresario->id }}</td>
                        <td>{{ $empresario->user->dni }}</td>
                        <td>{{ $empresario->user->name }}</td>
                        <td>{{ $empresario->empresa->name }}</td>
                        <td>{{ $empresario->cargo }}</td>

                        <td>
                            <div class="flex">
                                <a href="{{ route('admin.empresarios.edit', $empresario) }}">
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">

                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                </a>

                                <a href=" {{ route('admin.empresarios.confirmDelete', $empresario) }} ">
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
