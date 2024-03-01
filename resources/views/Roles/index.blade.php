@extends('layout')
@section('title','Roles')
@section('content')



<div class="container">
  <div class="col-12 col-lg-10 mx-auto">
  <div class="d-flex justify-content-between align-items-center mb-3">

     <h1 class="display-4 mb-0">Listado de Roles</h1>
     <a class="btn btn-primary" href="{{route('roles.create')}}">Crear Rol</a>
</div>

  <p class="lead text-secondary">Lista de Roles realizados de ejemplo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

      <ul class="list-group">
        @forelse($roles as $roleItem)
          <li class="list-group-item border-1 mb-3 shadow-sm rounded">
            <a class="text-secondary d-flex justify-content-between align-items-center"
                href="{{route('roles.show',$roleItem)}}">
                <span class="font-weight-bold">{{$roleItem->name}}      </span>
                <span class="text-black-50">{{$roleItem->description}}</span>
                <span class="text-black-50">{{$roleItem->special ?? 'Especifico'}}</span>
            </a>
          </li>

          @empty
            <li>no hay Roles para mostrar</li>
          @endforelse
            {{ $roles->links() }}
      </ul>
</div>
</div>
@endsection
