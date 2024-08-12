 <x-admin-layout>

     @section('title', 'Expedientes')

     @section('content_header')
         <h1>{{ $expediente->carrera->name }}</h1>
     @stop
     
     <div class="card">
         <div class="card-body bg-gray-50">

             <div class="grid grid-cols-3 grid-rows-2 gap-4">

                 <div class="grid grid-cols-1 grid-rows-1">
                     <div class="">
                         <label class="mb-2"> Estudiante</label>
                         <div class=" mb-4 card relative w-full grid items-center grid-cols-4">
                             <div class="w-full flex justify-end">
                                 <img src="{{ $expediente->estudiante->user->profile_photo_url }}"
                                     alt="{{ $expediente->estudiante->user->name }}"
                                     class="rounded-full h-20 w-20  object-cover">
                             </div>
                             <div class="  col-span-3 w-full">
                                 <div class="card-body">
                                     <h1 class=" text-gray-900"> <span class="font-bold">Nombre:</span>
                                         <a href="{{ route('admin.estudiantes.show', $expediente->estudiante->id) }}">
                                             {{ $expediente->estudiante->user->name }}</a>
                                     </h1>
                                     <h1 class="text-gray-700"><span class="font-bold">Carrera:</span>
                                         {{ $expediente->estudiante->carrera->name }}</h1>
                                     <h1 class="text-gray-700"><span class="font-bold">Periodo Académico:</span>
                                         {{ $expediente->periodo }}</h1>
                                     <h1 class="text-gray-700"><span class="font-bold">Tipo de Práctica:</span>
                                         {{ $expediente->tipo }}</h1>
                                     <h1 class="text-gray-700"><span class="font-bold">Semestre/Trimestre:</span>
                                         {{ $expediente->sem_tri }}</h1>
                                 </div>

                             </div>
                         </div>

                         <label class="mb-2">Tutor</label>
                         <div class=" mb-4 card relative w-full grid items-center grid-cols-4">
                             <div class="w-full flex justify-end">
                                 <img src="{{ $expediente->tutor->user->profile_photo_url }}"
                                     alt="{{ $expediente->tutor->user->name }}"
                                     class="rounded-full h-20 w-20  object-cover">
                             </div>

                             <div class="  col-span-3 w-full">
                                 <div class="card-body">
                                     <h1 class=" text-gray-900"> <span class="font-bold">Nombre:</span>
                                         {{ $expediente->tutor->user->name }}</h1>
                                     <h1 class="text-gray-700"><span class="font-bold">Carrera:</span>
                                         {{ $expediente->tutor->carrera->name }}</h1>
                                     <h1 class="text-gray-700"><span class="font-bold">Profesion:</span>
                                         {{ $expediente->tutor->profesion }}</h1>
                                 </div>

                             </div>
                         </div>

                         <label class="mb-2">Empresa</label>
                         <div class="  card relative w-full grid items-center grid-cols-4">
                             <div class="w-full  py-2 flex justify-end">
                                 <img src="{{ Storage::url($expediente->empresa['photo']) }}"
                                     alt="{{ $expediente->empresa->phpto }}"
                                     class="rounded-full h-20 w-20  object-cover">
                             </div>

                             <div class="  col-span-3 w-full">
                                 <div class="card-body">
                                     <h1 class=" text-gray-900"> <span class="font-bold">Nombre:</span>
                                         {{ $expediente->empresa->name }}</h1>
                                     <h1 class=" text-gray-900"> <span class="font-bold">Email:</span>
                                         {{ $expediente->empresa->email }}</h1>
                                     <h1 class="text-gray-700"><span class="font-bold">Encargado:</span>
                                         {{ $expediente->empresa->empresario->user->name }}</h1>
                                     <h1 class="text-gray-700"><span class="font-bold">Cargo:</span>
                                         {{ $expediente->empresa->empresario->cargo }}</h1>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-span-2 ">

                     <div class="">

                         <div class="flex justify-center">

                             <label class="mb-2 ">Archivos</label>
                         </div>

                         <div class="card">
                             <div class="card-body ">

                                 <div class="row flex justify-end mb-2">
                                     <button type="button" data-toggle="modal" data-target="#exampleModal"
                                         class="btn btn-secondary">
                                         <i class="fa-solid fa-file-arrow-up mr-2"></i>Añadir Archivo</button>
                                 </div>

                                 <div class="card bg-slate-200">
                                     <div class="card-body">

                                         {{-- mapeo de los archivos  --}}

                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                     {{--  modal upload  --}}
                     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <form action="{{route('admin.empresas.store')}}" method="POST"class="dropzone" enctype="multipart/form-data" id="myDropzone">
                                         @csrf
                                         <div class="fallback">
                                             <input class="file" type="file" id="file" name="file">
                                         </div>
                                         
                                     </form>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary"
                                         data-dismiss="modal">Cancelar</button>
                                     <button type="button" class="btn btn-primary">Subir</button>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>

                 <div class="col-span-3 row-start-2">
                     <div class="flex justify-center">
                         <label class="mb-2 text-lg">Avances</label>
                     </div>
                     <div class="card">
                         <div class="card-body">
                             <x-adminlte-datatable id="table1" :heads="$heads" striped with-buttons hoverable>

                             </x-adminlte-datatable>
                         </div>
                     </div>


                 </div>
             </div>

         </div>
     </div>

     {{-- @push('js')

     <script>
        document.addEventListener("DOMContentLoaded", function() {
    var myDropzone = new Dropzone("#myDropzone", {
        
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        acceptedFiles: ".pdf"
    });
});
     </script>
         
     @endpush --}}

 </x-admin-layout>
