@extends('layout')
@section('title','Usuario | '.$user -> name)
@section('content')

<div class="container">
  <div class="bg-white p-5 shadow rounded">

    <h1>{{$user -> name}}</h1>

    <div class="d-flex flex-row bd-highlight">
        <div class="p-2 bd-highlight">
            <p class="text-btn-secondary ">Email: {{ $user-> email }} </p>
        </div>
        <div class="p-2 bd-highlight">
          <div class="badge badge-primary text-wrap" style="width: 6rem;">
            {{ EmailVerificado($user-> email_verified_at)}}
          </div>
        </div>
      </div>

    <p class="text-btn-secondary ml-2">Edad: {{ $user-> edad }}</p>

    @foreach ($currenRoles as $currenRolesItem)
  <p class="ml-2 ">  <span >Roles:  <a  href="{{route('roles.show',$currenRolesItem)}}">
          {{ $currenRolesItem->name  }}
      </a> </span></p>
    @endforeach



    <p class="text-black-50 ">Creado: {{ $user-> created_at -> diffForHumans() }}</p>
    <p class="text-black-50">Actualizado: {{ $user-> updated_at -> diffForHumans() }}</p>


     <div class="d-flex justify-content-between align-items-center">


          <a href="{{ route('users.index') }}">
           Regresar</a>

          <div class="btn-group btn-group-sm ">
                  @can ('users.edit')
                       <a class="btn btn-primary rounded"
                        href="{{route('users.edit',$user)}}"
                        >Editar</a>
                  @endcan



                  @can ('users.destroy')
                    <a class="btn btn-danger rounded"
                       href="#"
                       onclick="document.getElementById('delete-user').submit()"
                   >Eliminar</a>

                    <form class="d-none"
                       id="delete-user"
                       action="{{route('users.destroy',$user)}}"
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
