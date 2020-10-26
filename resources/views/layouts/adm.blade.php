<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/adm.css') }}">

    <title>@yield('pageTitle') - {{ env('APP_NAME') }}</title>
  </head>
  <body class="bg-light">
    @include('elements.navbaradm')
    @include('elements.sidebar')
    @include('elements.sideadm')
    <main class="main-adm">
        @include('elements/toasts')
        @yield('content')
    </main>
    <footer class="mt-5 bg-dark text-light footer">
      <span class="pl-2">© 2020 {{ env('APP_NAME') }} - Administration</span>
    </footer>
    <script src="{{ asset('/js/boot.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <script src="{{ asset('/js/base.js') }}"></script>
    <script src="{{ asset('/js/adm.js') }}"></script>
  </body>
</html>