{{--Opcion para mostrar errores en listado "mas sencillo"--}}
@if ($errors->any())
  <div class="alert alert-danger">

     <ul class="m-0">
       @foreach ($errors->all() as $error)
         <li>{{$error}}</li>
       @endforeach
     </ul>
 </div>
@endif
