<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
    darkMode: $persist(
        window.matchMedia('(prefers-color-scheme: dark)').matches,
    ),
}"
    x-bind:class="{ 'dark': darkMode === true }">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @php
        $seoTitle = SEOMeta::getTitle();
        $defaultSeoTitle = config('seotools.meta.defaults.title');
    @endphp

    @if($seoTitle === $defaultSeoTitle || empty($seoTitle))
        <title>{{  $title  }}</title>
    @else
   <title>Documentação - Laravel Lusophone</title>
    @endif

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.webp') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.webp') }}">
    <link rel="manifest" href="{{ asset('https://laravel.com//img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon.webp') }}" color="#ff2d20">
    <link rel="shortcut icon" href="{{ asset('favicon.webp') }}">

    <link rel="stylesheet" href="{{ asset('build/assets/app-2497e6ec.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-69b48c12.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/docsearch-71d1b690.css') }}">
     <script src="{{ asset('build/assets/app-bc9a2dac.js') }}"></script>

    <meta name="msapplication-TileColor" content="#ff2d20">
    <meta name="msapplication-config" content="https://laravel.com//img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://laravel.com/">
    <meta property="og:title" content="Laravel - The PHP Framework For Web Artisans">
    <meta property="og:description"
        content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">
    <meta property="og:image" content="https://laravel.com/images/og/laravel-home.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://laravel.com/">
    <meta property="twitter:title" content="Laravel - The PHP Framework For Web Artisans">
    <meta property="twitter:description"
        content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">

    <!-- Fathom - beautiful, simple website analytics -->
    <script src="https://cdn.usefathom.com/script.js" data-site="HALHTNZU" defer></script>
    <!-- / Fathom -->

    {{-- Styles --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body x-cloak x-data="{
    showMobileMenu: false,
    showDocsMenu: false,
    scrolled: window.scrollY > 50,
    width: window.innerWidth,
    get showPlatformSwitcherHeader() {
        return !this.scrolled && this.width >= 1024
    },
}"
    x-resize="
            width = $width
            if (width >= 1024) {
                showMobileMenu = false
                showDocsMenu = false
            }
        "
    x-init="window.addEventListener('scroll', () => {
        scrolled = window.scrollY > 50
    })"
    class="font-poppins min-h-screen overflow-x-clip antialiased selection:bg-black selection:text-[#b4a9ff] dark:bg-[#050714] dark:text-white">
    <x-navigation-bar />
    {{ $slot }}
    <x-footer />
    @livewireScriptConfig
    @vite('resources/js/app.js')
    @vite('resources/css/docsearch.css')
</body>

</html>
