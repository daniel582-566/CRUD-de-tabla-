@extends('layout')
@section('title','About')
@section('content')



  <div class="container">

    <div class="row">

      <div class="col-12 col-lg-6 ">
        <img class="img-fluid mb-4" src="\img\about.svg" alt="Quien Soy">
      </div>


      <div class="col-12 col-lg-6  ">


          <h1 class="display-5 text-primary"
          >Quienes Somos</h1>

          <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>

           <a class="btn btn-lg btn-block btn-primary"
             href="{{ route('contact') }}"
             >Contactame</a>
           <a class="btn btn-lg btn-block btn-outline-primary"
             href=" {{ route('projects.index') }}"
             >Protafolio</a>
      </div>



    </div>
  </div>

@endsection
