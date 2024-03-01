@extends('layout')
@section('title','Role | '.$roles -> name)
@section('content')


<div class="container">
  <div class="bg-white p-5 shadow rounded">

    <h1>{{$roles -> name}}</h1>
    <p class="text-btn-secondary pl-3">Descripcion: {{ $roles-> description }}</p>
    <p class="text-btn-secondary pl-3">url - Slug: {{ $roles-> slug }}</p>
    <p class="text-btn-secondary pl-3">Permiso Especial: {{ $roles-> special ?? 'Especifico' }}</p>
    <p class="text-black-50">Creado: {{ $roles-> created_at -> diffForHumans() }}</p>
    <p class="text-black-50">Actualizado: {{ $roles-> updated_at -> diffForHumans() }}</p>

     <div class="d-flex justify-content-between align-items-center">


          <a href="{{ route('roles.index') }}">
           Regresar</a>

          <div class="btn-group btn-group-sm ">
                  @can ('roles.edit')
                       <a class="btn btn-primary rounded"
                        href="{{route('roles.edit',$roles)}}"
                        >Editar</a>
                  @endcan



                  @can ('roles.destroy')
                    <a class="btn btn-danger rounded"
                       href="#"
                       onclick="document.getElementById('delete-role').submit()"
                   >Eliminar</a>

                    <form class="d-none"
                       id="delete-role"
                       action="{{route('roles.destroy',$roles)}}"
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
