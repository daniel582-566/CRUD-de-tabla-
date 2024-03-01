@extends('layout')
@section('title','Proyecto | '.$project -> title)
@section('content')


<div class="container">
  <div class="bg-white p-5 shadow rounded">

    <h1>{{$project -> title}}</h1>
    <p class="text-btn-secondary pl-3">{{ $project-> description }}</p>
    <p class="text-black-50">Creado: {{ $project-> created_at -> diffForHumans() }}</p>
    <p class="text-black-50">Actualizado: {{ $project-> updated_at -> diffForHumans() }}</p>

     <div class="d-flex justify-content-between align-items-center">


          <a href="{{ route('projects.index') }}">
           Regresar</a>

          <div class="btn-group btn-group-sm ">
                  @can ('projects.edit')
                       <a class="btn btn-primary rounded"
                        href="{{route('projects.edit',$project)}}"
                        >Editar</a>
                  @endcan

                  @can ('projects.destroy')
                    <a class="btn btn-danger rounded"
                       href="#"
                       onclick="document.getElementById('delete-project').submit()"
                   >Eliminar</a>

                    <form class="d-none"
                       id="delete-project"
                       action="{{route('projects.destroy',$project)}}"
                       method="post">
                       @csrf
                       @method('DELETE')
                    </form>
                  @endcan
          </div>
   </div>
  </div>
</div>

@endsection
