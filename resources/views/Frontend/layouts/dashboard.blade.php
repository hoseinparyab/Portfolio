<!DOCTYPE html>
<html lang="fa" dir="rtl" class="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'داشبورد | مدیریت')</title>

    @hasSection('vite')
        @yield('vite')
    @else
        @vite(['resources/js/frontend/dashboard.js'])
    @endif

    <link rel="icon" type="image/x-icon" href="{{ asset('src/img/logo.ico') }}" />
  </head>
  <body>
    <div class="dashboard-container flex flex-row w-[100vw]">
      <div class="navigation hidden xl:flex-2 xl:block">
        @include('Frontend.partials.dashboard-logo')
        <nav class="menu flex flex-col gap-2">
          @include('Frontend.partials.dashboard-nav')
        </nav>
      </div>
      <div class="dashboard flex-10">
        @include('Frontend.partials.dashboard-topbar')
        <div class="dashboard-content-container w-full">
          @yield('content')
        </div>
      </div>
    </div>

    @include('Frontend.partials.dashboard-overlays')
  </body>
</html>
