@extends('layout')
@section('title','Editar Proyecto')
@section('content')
@include('partials.list-errors-val')



<div class="container">
  <div class="row">
    <div class="col-12 col-sm-10 col-lg-8 mx-auto">

      <form class="bg-white shadow rounded py-3 px-4"
        method="POST"
        action="{{route('projects.update',$project)}}">
        <h1 class="display-5">Editar Proyecto</h1>
        <hr>
         @method('PUT')
         @include('projects._form-create-edit',['btnTxt' => 'Actualizar'])
      </form>

    </div>
  </div>
</div>

@endsection
