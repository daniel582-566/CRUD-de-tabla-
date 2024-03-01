@extends('layout')
@section('title','Home')
@section('content')



<div class="container">
  <div class="row">

    <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary"
                >Desarrollo Web </h1>
            <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
            <a class="btn btn-lg btn-block btn-primary"
                   href="{{ route('contact') }}"
                   >Contactame</a>
            <a class="btn btn-lg btn-block btn-outline-primary"
                   href=" {{ route('projects.index') }}"
                   >Protafolio</a>
    </div>

    <div class="col-12 col-lg-6 pt-3 ">
          <img class="img-fluid mb-4" src="\img\home.svg" alt="Desarrollo Web">
    </div>
  </div>
</div>


@endsection
