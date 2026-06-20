<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @hasSection('vite')
        @yield('vite')
    @else
        @vite(['resources/js/frontend/public.js'])
    @endif

    <title>@yield('title', 'بنتوفولیو')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('src/img/logo.ico') }}" />
  </head>
  <body>
    @include('Frontend.partials.night-background')
    @include('Frontend.partials.mobile-menu')

    <div class="bento-container my-4" id="bento-container">
      <header class="header">
        @include('Frontend.partials.public-header')
      </header>

      @yield('content')
    </div>

    @include('Frontend.partials.public-footer')
  </body>
</html>
