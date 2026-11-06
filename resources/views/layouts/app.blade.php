<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Emmanuel Mwangata — Software Developer')</title>
    <meta name="description" content="@yield('description', 'Full-stack software developer specializing in web applications, backend systems, and cybersecurity. Available for freelance projects.')">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('title', 'Emmanuel Mwangata — Software Developer')">
    <meta property="og:description" content="@yield('description', 'Full-stack software developer specializing in web applications, backend systems, and cybersecurity.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    {{-- Canonical --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><text y='26' font-size='28'>⬡</text></svg>">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="antialiased" x-data>

{{-- Custom cursor --}}
<div id="cursor"></div>
<div id="cursor-ring"></div>

{{-- Page transition overlay --}}
<div id="page-overlay" aria-hidden="true"></div>

{{-- Flash messages --}}
@if(session('success'))
    <div data-flash class="fixed top-6 right-6 z-50 glass rounded px-5 py-3 text-sm text-sand-100 flex items-center gap-3 shadow-glass" role="alert">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="#5EC98E" stroke-width="1.5"/><path d="M5 8l2 2 4-4" stroke="#5EC98E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div data-flash class="fixed top-6 right-6 z-50 glass rounded px-5 py-3 text-sm text-sand-100 flex items-center gap-3 shadow-glass" role="alert">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="7" stroke="#E05D5D" stroke-width="1.5"/><path d="M8 5v3M8 11v.5" stroke="#E05D5D" stroke-width="1.5" stroke-linecap="round"/></svg>
        {{ session('error') }}
    </div>
@endif

{{-- Navigation --}}
<x-navbar />

{{-- Mobile menu --}}
<x-mobile-menu />

{{-- Main content --}}
<main id="main-content">
    @yield('content')
</main>

{{-- Footer --}}
<x-footer />

@stack('scripts')
</body>
</html>
