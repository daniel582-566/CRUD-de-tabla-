

@extends('../layout')
@section('title','Prueba Boot4')
@section('content')
  <div id="hola" class="container">100% wide Container only breakpoint</div>
  <div id="hola-sm" class="container-sm">100% wide until small SM breakpoint</div>
  <div id="hola-md" class="container-md">100% wide until medium MD breakpoint</div>
  <div id="hola-lg" class="container-lg">100% wide until large LG breakpoint</div>
  <div id="hola-xl" class="container-xl">100% wide until extra XL large breakpoint</div>
@endsection
