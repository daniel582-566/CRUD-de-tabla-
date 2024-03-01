
@extends('layout')
@section('title','Contacto')
@section('content')



@include('partials.list-errors-val')

<div class="container">
  <div class="row">

    <div class="col-12 col-sm-10 col-lg-8 mx-auto">



           <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{route('messege.store')}}">
           @csrf
          <h1 class="display-5">Contactame</h1>
          <hr>
           <div class="form-group">
             <label for="name">Nombre</label>
             <input id="name" class="form-control bg-light shadow @error ('name') is-invalid @else border-0 @enderror" name="name" placeholder="ingrese su nombre" value="{{old('name')}}">
             @error ('name')
               <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
             @enderror
           </div>

           <div class="form-group">
            <label for="email">Email</label>
           <input id="email" class="form-control bg-light shadow @error ('email') is-invalid @else border-0 @enderror" name="email" placeholder="ingrese su nombre" value="{{old('email')}}">
            @error ('email')
              <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
            @enderror
           </div>

           <div class="form-group">
           <label for="subject">Asunto</label>
           <input id="subject" class="form-control bg-light shadow border-0" name="subject" placeholder="ingrese El Asunto" value="{{old('subject')}}">
           </div>

           <div class="form-group">
           <label for="mensaje">Mensaje</label>
           <textarea id="mensaje" class="form-control bg-light shadow border-0" name="mensaje" placeholder="ingrese La descripcion"> {{old('mensaje')}} </textarea>
           </div>

              <button class="btn btn-primary btn-lg btn-block">Enviar</button>
           </form>

    </div>
  </div>



</div>
@endsection
