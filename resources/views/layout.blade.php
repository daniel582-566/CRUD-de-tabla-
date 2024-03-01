<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- este CSRF Token lo utiliza axiox -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title','Sistema Web')</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
<!-- Styles -->
<link rel="stylesheet" href="{{mix('/css/app.css')}}">
<!-- Scripts -->
<script src="{{mix('/js/app.js')}}" defer> </script>

</head>
<body>

<!-- #app lo utiliza vuejs-->
  <div id='app' class="d-flex flex-column h-screen justify-content-between">
<!-- El justify-content-between: me centra el main si no es tan grande  -->
      <header>
            @include('partials.nav')
            @include('partials.sesion-status')
      </header>

      <main class="py-4">
            @yield('content')
      </main>

      <footer class="bg-while text-center text-black-50 py-3 shadow">
           {{ config('app.name') }} | Copyright @ {{ date('Y') }}
      </footer>

  </div>

</body>
</html>
