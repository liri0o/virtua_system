<x-admin-layout>

    @section('title', 'Empresas')

    @section('content_header')
        <h1>{{ $empresa->name }}</h1>
    @stop


    @livewire('admin.empresas.empresa-edit', compact('empresa')) 

</x-admin-layout>