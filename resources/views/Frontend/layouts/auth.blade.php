<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'صفحه ورود | مدیریت')</title>

    @vite(['resources/js/frontend/auth.js'])
    @stack('vite')

    <link rel="icon" type="image/x-icon" href="{{ asset('src/img/logo.ico') }}" />
  </head>
  <body>
    @yield('content')
  </body>
</html>
