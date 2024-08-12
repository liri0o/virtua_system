<x-admin-layout>


    @section('title', 'Usuarios')

    @section('content_header')
        <h1>Gestión de Usuarios</h1>
    @stop

    <div class="w-full mb-3 flex justify-end">
        <a href="{{ route('admin.users.create') }}">
            <x-adminlte-button label="Nuevo" type="button" theme="success" icon="fa-solid fa-user-plus" />
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads" striped with-buttons hoverable>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>                        
                        <td>{{ $user->created_at }}</td>

                        <td>
                            <div class="flex">
                                <a href="{{ route('admin.users.edit', $user) }}">
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">

                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                </a>
                                
                                    <a href="{{route('admin.users.confirmDelete', $user)}}">
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
