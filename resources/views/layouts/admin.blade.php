@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')

@stop


{{-- Rename section content to content_body --}}

@section('content')
    {{ $slot }}
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version del Sistema: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'Alirio Hernández') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
    <script src="https://kit.fontawesome.com/af4ea00356.js" crossorigin="anonymous"></script>    
@endpush

{{-- Add common CSS customizations --}}

@push('css')
@endpush
@section('css') 
     
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @livewireStyles
@stop

@section('js')

@vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireScripts
    @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

    <script>
        Livewire.on('swal', data => {
            Swal.fire(data[0]);
        });
    </script>

@stop







{{-- @stack('js') --}}
{{-- @vite(['resources/js/app.js'])
<script src="https://kit.fontawesome.com/af4ea00356.js" crossorigin="anonymous"></script>
@livewireScripts 
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  --}}




{{--  @stack('js') --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
{{-- @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

    <script>
        Livewire.on('swal', data => {
            Swal.fire(data[0]);
        });
    </script>  --}}
