@extends('layout')
@section('title','Usuarios')
@section('content')



<div class="container">
<div class="col-12 col-lg-10 mx-auto">
  <div class="d-flex justify-content-between align-items-center mb-3">

     <h1 class="display-4 mb-0">Listado de Usuarios</h1>

</div>

  <p class="lead text-secondary">Lista de Usuarios realizados de ejemplo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

      <ul class="list-group">
      	@forelse($users as $usersItem)
          <li class="list-group-item border-1 mb-3 shadow-sm rounded">
            <a class="text-secondary d-flex justify-content-between align-items-center"
                href="{{route('users.show',$usersItem)}}">
                <span class="font-weight-bold">{{$usersItem->name}}  </span>
                <span class="text-black-50">{{$usersItem->email}}</span>
                <span class="text-black-50">{{$usersItem->updated_at->format('h:i:s')}}</span>
            </a>
          </li>

      	  @empty
        	  <li>no hay Usuarios para mostrar</li>
      	  @endforelse
            {{ $users->links() }}
      </ul>
</div>
</div>
@endsection
