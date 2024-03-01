@extends('layout')
@section('title','Crear Rol')
@section('content')


<div class="content">
 <div class="row">
   <div class="col-12 col-sm-10 col-lg-6 mx-auto">




    @include('partials.list-errors-val')

    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{route('roles.store')}}">
         <h1 class="display-5">Crear Rol</h1>
         <hr>

         @csrf
         <div class="form-group">
               <label for='name'>Nombre Del Rol</label>
               <input class="form-control border-0 bg-light shadow-sm"
                  id="name"
                  type="text"
                  name="name"
                  value="{{ old('name',$roles->name)}}"
               >
         </div>

         <div class="form-group">
               <label for='slug'>url - Slug</label>
               <input class="form-control border-0 bg-light shadow-sm"
                  id="slug"
                  type="text"
                  name="slug"
                  value="{{ old('slug',$roles->slug)}}"
               >
         </div>

         <div class="form-group">
               <label for='description'>Descripcion</label>
               <input class="form-control border-0 bg-light shadow-sm"
                  id="description"
                  type="text"
                  name="description"
                  value="{{ old('description',$roles->description)}}"
               >
         </div>

         <div class="form-group">
             <label for='radios'>Permiso Especial</label>
                   <div class="custom-control custom-radio" id="radios">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="all-access">
                    <label class="custom-control-label" for="customRadio1">Acceso Total</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="no-access">
                    <label class="custom-control-label" for="customRadio2">Ningun Acceso</label>
                  </div>
        </div>

        <div class="form-group">
            <label for='permisos'>Lista de Roles</label>
               @foreach ($permisos as $permisosItem)
                 <div name="permisos" class="custom-control custom-checkbox">
                     <input type="checkbox" name="list-permisos[]" class="custom-control-input" id="{{ $permisosItem -> id}}" value="{{ $permisosItem -> slug}}">
                     <label class="custom-control-label" for="{{ $permisosItem -> id}}">{{ $permisosItem -> name}}</label>
                     <em>({{ $permisosItem -> description ?: 'Sin Descripcion'}})</em>
                     <em>({{ $permisosItem -> slug ?: 'Sin slug'}})</em>
                </div>
               @endforeach
         </div>

         <button class="btn btn-primary btn-lg btn-block">Crear</button>

         <a class="btn btn-link btn-block"
         href=" {{route('roles.index')}} ">Cancelar</a>

    </form>
    </div>
 </div>
</div>
@endsection
