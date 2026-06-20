<?php

/**
 * One-time script: convert Frontend HTML files to Blade layout structure.
 */

$baseDir = dirname(__DIR__) . '/resources/views/Frontend';

function assetPath(string $html): string
{
    return preg_replace_callback(
        '/(?:\.\/|\/)src\/([^"\']+)/',
        fn ($m) => "{{ asset('src/{$m[1]}') }}",
        $html
    );
}

function replaceLinks(string $html): string
{
    $map = [
        './index.html' => "{{ route('home') }}",
        '/index.html' => "{{ route('home') }}",
        './portfolios.html' => "{{ route('portfolios') }}",
        '/portfolios.html' => "{{ route('portfolios') }}",
        './posts-archive.html' => "{{ route('posts.archive') }}",
        '/posts-archive.html' => "{{ route('posts.archive') }}",
        './single-post.html' => "{{ route('posts.show', ['slug' => 'sample']) }}",
        './404.html' => "{{ route('errors.404') }}",
        './dashboard.html' => "{{ route('dashboard.index') }}",
        '/dashboard.html' => "{{ route('dashboard.index') }}",
        './dashboard-add-post.html' => "{{ route('dashboard.posts.create') }}",
        './dashboard-posts.html' => "{{ route('dashboard.posts.index') }}",
        './dashboard-categories.html' => "{{ route('dashboard.categories') }}",
        './dashboard-comments.html' => "{{ route('dashboard.comments') }}",
        './dashboard-page-settings.html' => "{{ route('dashboard.page-settings') }}",
        './dashboard-users.html' => "{{ route('dashboard.users') }}",
        './dashboard-account-settings.html' => "{{ route('dashboard.account-settings') }}",
        './dashboard-login.html' => "{{ route('dashboard.login') }}",
        'href="/"' => 'href="{{ route(\'home\') }}"',
    ];

    return str_replace(array_keys($map), array_values($map), $html);
}

function bladeify(string $html): string
{
    return replaceLinks(assetPath($html));
}

function extractBetween(string $content, string $start, string $end): string
{
    $startPos = strpos($content, $start);
    if ($startPos === false) {
        return '';
    }
    $startPos += strlen($start);
    $endPos = strpos($content, $end, $startPos);
    if ($endPos === false) {
        return '';
    }

    return trim(substr($content, $startPos, $endPos - $startPos));
}

function extractTitle(string $content): string
{
    if (preg_match('/<title>(.*?)<\/title>/s', $content, $m)) {
        return trim($m[1]);
    }

    return 'بنتوفولیو';
}

function ensureDir(string $path): void
{
    if (! is_dir($path)) {
        mkdir($path, 0755, true);
    }
}

$indexContent = file_get_contents("$baseDir/index.html");
$dashboardContent = file_get_contents("$baseDir/dashboard-template.html");

// --- Partials ---
ensureDir("$baseDir/partials");
ensureDir("$baseDir/layouts");
ensureDir("$baseDir/pages");
ensureDir("$baseDir/dashboard");

$nightBg = extractBetween($indexContent, '<div class="night-wrapper">', '</div>

    <!-- Mobile Menu Overlay -->');
file_put_contents("$baseDir/partials/night-background.blade.php", bladeify('<div class="night-wrapper">'.$nightBg.'</div>'));

$mobileMenu = extractBetween($indexContent, '<!-- Mobile Menu Overlay -->', '</div>

    <div class="bento-container');
file_put_contents("$baseDir/partials/mobile-menu.blade.php", bladeify($mobileMenu));

$header = extractBetween($indexContent, '<header class="header">', '</header>');
file_put_contents("$baseDir/partials/public-header.blade.php", bladeify($header));

$footer = extractBetween($indexContent, '<footer', '</footer>');
file_put_contents("$baseDir/partials/public-footer.blade.php", bladeify('<footer'.$footer.'</footer>'));

$dashboardNav = extractBetween($dashboardContent, '<nav class="menu flex flex-col gap-2">', '</nav>');
file_put_contents("$baseDir/partials/dashboard-nav.blade.php", bladeify($dashboardNav));

$dashboardLogo = extractBetween($dashboardContent, '<div class="logo-container">', '</div>
        <nav');
file_put_contents("$baseDir/partials/dashboard-logo.blade.php", bladeify('<div class="logo-container">'.$dashboardLogo.'</div>'));

$dashboardTopbar = extractBetween($dashboardContent, '<div class="top-bar flex flex-row items-center justify-between">', '</div>
        </div>
        <div class="dashboard-content-container');
file_put_contents("$baseDir/partials/dashboard-topbar.blade.php", bladeify('<div class="top-bar flex flex-row items-center justify-between">'.$dashboardTopbar.'</div>'));

$dashboardOverlays = extractBetween($dashboardContent, '<div id="search-overlay"', '<!-- Sidebar overlay -->');
$dashboardMobileSidebar = extractBetween($dashboardContent, '<!-- Sidebar container -->', '<!-- Sidebar overlay -->');
$dashboardSidebarOverlay = extractBetween($dashboardContent, '<!-- Sidebar overlay -->', '<script');
file_put_contents("$baseDir/partials/dashboard-overlays.blade.php", bladeify(
    '<div id="search-overlay"'.$dashboardOverlays.$dashboardMobileSidebar.$dashboardSidebarOverlay
));

// --- Layouts ---
file_put_contents("$baseDir/layouts/app.blade.php", <<<'BLADE'
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ asset('src/css/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('src/css/stars.css') }}" />
    @stack('styles')

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="{{ asset('src/libraries/fontawesome/css/all.min.css') }}" />
    <script src="{{ asset('src/libraries/fontawesome/js/all.min.js') }}"></script>
    @stack('head-scripts')

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

    <script src="{{ asset('src/js/index.js') }}"></script>
    @stack('scripts')
  </body>
</html>
BLADE);

file_put_contents("$baseDir/layouts/dashboard.blade.php", <<<'BLADE'
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'داشبورد | مدیریت')</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="{{ asset('src/libraries/fontawesome/css/all.min.css') }}" />
    <script src="{{ asset('src/libraries/fontawesome/js/all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('src/css/dashboard-global.css') }}" />
    @stack('styles')
    <link rel="icon" type="image/x-icon" href="{{ asset('src/img/logo.ico') }}" />

    @stack('head-scripts')
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

    <script src="{{ asset('src/js/overlay.js') }}"></script>
    @stack('scripts')
  </body>
</html>
BLADE);

file_put_contents("$baseDir/layouts/auth.blade.php", <<<'BLADE'
<!DOCTYPE html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'صفحه ورود | مدیریت')</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="{{ asset('src/libraries/fontawesome/css/all.min.css') }}" />
    <script src="{{ asset('src/libraries/fontawesome/js/all.min.js') }}"></script>
    @stack('styles')
    <link rel="icon" type="image/x-icon" href="{{ asset('src/img/logo.ico') }}" />
  </head>
  <body>
    @yield('content')
    @stack('scripts')
  </body>
</html>
BLADE);

// --- Public pages ---
$publicPages = [
    'index' => ['dir' => 'pages', 'view' => 'home', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/home.css') }}\" />", "<link rel=\"stylesheet\" href=\"{{ asset('src/libraries/swiper/swiper-bundle.min.css') }}\" />"], 'extraScripts' => ["<script src=\"{{ asset('src/libraries/swiper/swiper-bundle.min.js') }}\"></script>", "<script type=\"module\" src=\"{{ asset('src/js/swiperInit.js') }}\"></script>"]],
    'portfolios' => ['dir' => 'pages', 'view' => 'portfolios', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/portfolio.css') }}\" />"], 'extraScripts' => ["<script src=\"{{ asset('src/libraries/lightbox/fslightbox.js') }}\"></script>"]],
    'posts-archive' => ['dir' => 'pages', 'view' => 'posts-archive', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/posts-archive.css') }}\" />"]],
    'single-post' => ['dir' => 'pages', 'view' => 'single-post', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/single-post.css') }}\" />", "<link rel=\"stylesheet\" href=\"{{ asset('src/libraries/Code Highlight/styles/dark.min.css') }}\" />"], 'extraScripts' => ["<script src=\"{{ asset('src/libraries/Code Highlight/highlight.min.js') }}\"></script>"]],
    '404' => ['dir' => 'pages', 'view' => '404', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/404.css') }}\" />"]],
];

foreach ($publicPages as $file => $config) {
    $content = file_get_contents("$baseDir/$file.html");
    $title = extractTitle($content);
    $pageContent = extractBetween($content, '</header>', '<footer');
    $pageContent = bladeify($pageContent);

    $styles = implode("\n    ", $config['extraStyles'] ?? []);
    $scripts = isset($config['extraScripts']) ? implode("\n\n", array_map(fn ($s) => "@push('scripts')\n    $s\n@endpush", $config['extraScripts'])) : '';

    $blade = "@extends('Frontend.layouts.app')\n\n@section('title', '$title')\n\n@push('styles')\n    $styles\n@endpush\n\n$scripts\n@section('content')\n$pageContent\n@endsection\n";

    file_put_contents("$baseDir/{$config['dir']}/{$config['view']}.blade.php", $blade);
}

// --- Dashboard pages ---
$dashboardPages = [
    'dashboard' => ['view' => 'index', 'extraHead' => ["<script src=\"https://cdn.jsdelivr.net/npm/apexcharts\"></script>"], 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/dashboard.css') }}\" />"], 'extraScripts' => ["<script src=\"{{ asset('src/js/charts.js') }}\"></script>"]],
    'dashboard-add-post' => ['view' => 'add-post', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/dashboard-add-post.css') }}\" />"]],
    'dashboard-posts' => ['view' => 'posts', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/dashboard-posts.css') }}\" />"]],
    'dashboard-categories' => ['view' => 'categories', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/dashboard-categories.css') }}\" />"]],
    'dashboard-comments' => ['view' => 'comments', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/dashboard-comments.css') }}\" />"]],
    'dashboard-page-settings' => ['view' => 'page-settings', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/dashboard-page-settings.css') }}\" />"]],
    'dashboard-users' => ['view' => 'users', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/dashboard-users.css') }}\" />"]],
    'dashboard-account-settings' => ['view' => 'account-settings', 'extraStyles' => ["<link rel=\"stylesheet\" href=\"{{ asset('src/css/dashboard-account-settings.css') }}\" />"]],
];

foreach ($dashboardPages as $file => $config) {
    $content = file_get_contents("$baseDir/$file.html");
    $title = extractTitle($content);
    $pageContent = extractBetween($content, '<div class="dashboard-content-container w-full">', '</div>
      </div>
    </div>
    <div id="search-overlay"');
    $pageContent = preg_replace('/<!--\s*main content here\s*-->\s*/', '', $pageContent);
    $pageContent = bladeify(trim($pageContent));

    $styles = implode("\n    ", $config['extraStyles'] ?? []);
    $headScripts = isset($config['extraHead']) ? implode("\n    ", $config['extraHead']) : '';
    $scripts = isset($config['extraScripts']) ? implode("\n\n", array_map(fn ($s) => "@push('scripts')\n    $s\n@endpush", $config['extraScripts'])) : '';

    $headPush = $headScripts ? "@push('head-scripts')\n    $headScripts\n@endpush\n\n" : '';

    $blade = "@extends('Frontend.layouts.dashboard')\n\n@section('title', '$title')\n\n@push('styles')\n    $styles\n@endpush\n\n{$headPush}$scripts\n@section('content')\n$pageContent\n@endsection\n";

    file_put_contents("$baseDir/dashboard/{$config['view']}.blade.php", $blade);
}

// --- Auth page ---
$loginContent = file_get_contents("$baseDir/dashboard-login.html");
$loginTitle = extractTitle($loginContent);
$loginBody = extractBetween($loginContent, '<body>', '</body>');
$loginBody = bladeify(trim($loginBody));

file_put_contents("$baseDir/dashboard/login.blade.php", <<<BLADE
@extends('Frontend.layouts.auth')

@section('title', '$loginTitle')

@push('styles')
    <link rel="stylesheet" href="{{ asset('src/css/dashboard-login.css') }}">
@endpush

@section('content')
$loginBody
@endsection
BLADE);

echo "Conversion complete.\n";
echo "- layouts: app, dashboard, auth\n";
echo "- partials: night-background, mobile-menu, public-header, public-footer, dashboard-*\n";
echo "- pages: home, portfolios, posts-archive, single-post, 404\n";
echo "- dashboard: index, add-post, posts, categories, comments, page-settings, users, account-settings, login\n";
