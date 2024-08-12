<x-admin-layout>

    @section('title', 'Inicio')

    @section('content_header')
        <h1>Inicio</h1>
    @stop


    <x-adminlte-card title="Consultas" theme="dark">

        <div class="card-body grid grid-cols-3 grid-rows-2 gap-4 ">
            
            <x-adminlte-small-box title="{{ $users->count() }}" text="Usuarios en el Sistema"
                icon="fas fa-user-plus text-teal" theme="primary" url="admin/users" url-text="Ver más" />

            <x-adminlte-small-box title="{{$carreras->count()}}" text="Carreras" icon="fas fa-school-flag" theme="teal" url="admin/carreras"
                url-text="Ver más" />

            <x-adminlte-small-box title="Vacantes" text="16" icon="fas fa-users-rectangle text-dark" theme="purple"
                url="#" url-text="Ver más" />

            <x-adminlte-small-box title="Expedientes" text="{{$expedientes->count()}}" icon="fas fa-tasks text-dark" theme="warning"
                icon-theme="dark" url="admin/expedientes" url-text="Ver más" />

            <x-adminlte-small-box title="{{$empresas->count()}}" text="Empresas" icon="fa-solid fa-building text-dark" theme="danger"
                url="admin/empresas" url-text="Ver más" id="sbUpdatable" />

            <x-adminlte-small-box title="Catálogo" text="de Estudiantes" icon="fa-solid fa-clipboard-list text-dark" theme="white"
                icon-theme="dark" url="#" url-text="Ver más" />

        </div>

    </x-adminlte-card>





    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads" striped with-buttons hoverable>

                <tr>
                    <td>1</td>
                    <td>Administrador</td>
                    <td>Cambio de contraseña</td>
                    <td>12-07-2024-10:20</td>
                    <td>
                        {{-- <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button> --}}
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                        <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Empresa1</td>
                    <td>Actualización de Foto</td>
                    <td>12-07-2024-10:20</td>
                    <td>
                        {{-- <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button> --}}
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                        <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Estudiante</td>
                    <td>Cambio de contraseña</td>
                    <td>12-07-2024-10:20</td>
                    <td>
                        {{-- <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button> --}}
                        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                        <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                    </td>
                </tr>

            </x-adminlte-datatable>
        </div>
    </div>


</x-admin-layout>
