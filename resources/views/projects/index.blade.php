@extends('layout')
@section('title','Proyectos')
@section('content')



<div class="container">
  <div class="col-12 col-lg-10 mx-auto">
  <div class="d-flex justify-content-between align-items-center mb-3">

     <h1 class="display-4 mb-0">Listado de Proyectos</h1>
      @can ('projects.create')
         <a class="btn btn-primary" href="{{route('projects.create')}}">Crear Proyecto</a>
      @endcan

</div>

  <p class="lead text-secondary">Lista de proyectos realizados de ejemplo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

      <ul class="list-group">
      	@forelse($projects as $projectsItem)
          <li class="list-group-item border-1 mb-3 shadow-sm rounded">
            <a class="text-secondary d-flex justify-content-between align-items-center"
                href="{{route('projects.show',$projectsItem)}}">
                <span class="font-weight-bold">{{$projectsItem->title}}      </span>
                <span >{{$projectsItem->description}}</span>
            </a>
          </li>

      	  @empty
        	  <li>no hay proyectos para mostrar</li>
      	  @endforelse
            {{ $projects->links() }}
      </ul>
 </div>
</div>
@endsection
