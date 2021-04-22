<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    <script src="{{ asset('js/base.js') }}"></script>
    @stack('bottomScripts')
  </body>
</html>