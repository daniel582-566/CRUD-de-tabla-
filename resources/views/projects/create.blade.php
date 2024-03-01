@extends('layout')
@section('title','Crear Proyecto')
@section('content')


<div class="content">
 <div class="row">
   <div class="col-12 col-sm-10 col-lg-6 mx-auto">




    @include('partials.list-errors-val')

    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{route('projects.store')}}">
         <h1 class="display-5">Nuevo Proyecto</h1>
         <hr>
         @include('projects._form-create-edit',['btnTxt' => 'Crear'])

    </form>
    </div>
 </div>
</div>
@endsection
