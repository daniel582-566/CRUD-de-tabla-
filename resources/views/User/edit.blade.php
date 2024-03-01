@extends('layout')
@section('title','Editar Proyecto')
@section('content')
@include('partials.list-errors-val')



<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-8 mx-auto">

      <form class="bg-white shadow rounded py-3 px-4"
        method="POST"
        action="{{route('users.update',$user)}}">
        <h1 class="display-5">Editar Usuario</h1>
        <hr>
         @method('PUT')
         @csrf

               <div class="form-group">
                     <label for='name'>Nombre Del Usuario</label>
                     <input class="form-control border-0 bg-light shadow-sm"
                        id="name"
                        type="text"
                        name="name"
                        Readonly
                        value="{{ old('name',$user->name)}}"
                     >
               </div>

               <div class="form-group">
                     <label for='email'>Email Del Usuario</label>
                     <input class="form-control border-0 bg-light shadow-sm"
                        id="email"
                        type="email"
                        name="email"
                        Readonly
                        value="{{ old('email',$user->email)}}"
                     >
               </div>

               <div class="form-group">
                     <label for='edad'>Edad Del Usuario</label>
                     <input class="form-control border-0 bg-light shadow-sm"
                        id="edad"
                        type="number"
                        name="edad"
                        Readonly
                        value="{{ old('edad',$user->edad)}}"
                     >
               </div>


              <div class="form-group">
                  <label for='roles'>Lista de Roles</label>
                     @foreach ($roles as $role)
                       <div name="roles" class="custom-control custom-checkbox">
                           <input type="checkbox" name="list-roles[]" class="custom-control-input" id="{{ $role -> id}}" value="{{ $role -> slug}}" {{ setCheked($role,$currenRoles) }}>
                           <label class="custom-control-label" for="{{ $role -> id}}">{{ $role -> name}}</label>
                           <em>({{ $role -> description ?: 'Sin Descripcion'}})</em>
                      </div>
                     @endforeach
               </div>


               <button class="btn btn-primary btn-lg btn-block">Editar</button>

               <a class="btn btn-link btn-block"
               href=" {{route('users.index')}} ">Cancelar</a>

      </form>

    </div>
  </div>
</div>

@endsection
