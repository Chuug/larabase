<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    @stack('styles')

    <!-- Scripts Header -->
    @stack('headScripts')

    <!-- Title -->
    <title>{{ (isset($pageTitle))?$pageTitle:'No title' }} - {{ env('APP_NAME') }}</title>
  </head>
  <body class="bg-light">

    <!-- Navigation -->
    @include('elements.navbar')
    @include('elements.sidebar')

    <!-- Main -->
    <main class="mt-4">
        @include('elements/toasts')
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="mt-5 bg-dark text-light footer text-center">
      <span class="pl-2">© 2020 Larabase - Made with <a href="https://www.laravel.com" class="text-light" target="_blank">Laravel.com</a> and <a href="https://getbootstrap.com/" class="text-light" target="_blank">Getbootstrap.com</a></span>
    </footer>

    <!-- Scripts Bottom -->
    <script src="{{ asset('js/boot.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <script src="{{ asset('js/base.js') }}"></script>
    @stack('bottomScripts')
  </body>
</html>