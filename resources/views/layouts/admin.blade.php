<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Portfolio Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased" x-data>

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-64 bg-obsidian-light border-r border-obsidian-border flex flex-col flex-shrink-0">
        <div class="p-6 border-b border-obsidian-border">
            <a href="{{ route('home') }}" class="font-display text-xl text-sand-200 hover:text-sand-100 transition-colors">
                EM<span class="text-sand-500">.</span>
            </a>
            <p class="text-xs text-sand-600 mt-1 font-mono">Admin Panel</p>
        </div>

        <nav class="p-4 flex-1 space-y-1" aria-label="Admin navigation">
            @php
                $navItems = [
                    ['route' => 'admin.dashboard', 'icon' => '⊞', 'label' => 'Dashboard'],
                    ['route' => 'admin.projects.index', 'icon' => '◻', 'label' => 'Projects'],
                    ['route' => 'admin.skills.index', 'icon' => '◈', 'label' => 'Skills'],
                    ['route' => 'admin.services.index', 'icon' => '◎', 'label' => 'Services'],
                    ['route' => 'admin.experiences.index', 'icon' => '◷', 'label' => 'Experience'],
                    ['route' => 'admin.messages.index', 'icon' => '◉', 'label' => 'Messages'],
                ];
            @endphp

            @foreach($navItems as $item)
            <a href="{{ route($item['route']) }}"
               class="admin-sidebar-link {{ request()->routeIs($item['route'] . '*') ? 'active' : '' }}">
                <span aria-hidden="true" class="font-mono text-xs opacity-70">{{ $item['icon'] }}</span>
                {{ $item['label'] }}
            </a>
            @endforeach
        </nav>

        <div class="p-4 border-t border-obsidian-border">
            <a href="{{ route('home') }}" class="admin-sidebar-link text-sand-600">
                <span aria-hidden="true" class="font-mono text-xs">←</span>
                View Site
            </a>
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-1">
                @csrf
                <button type="submit" class="admin-sidebar-link w-full text-left text-sand-600">
                    <span aria-hidden="true" class="font-mono text-xs">⏻</span>
                    Log Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Content --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-obsidian-light border-b border-obsidian-border px-8 py-4 flex items-center justify-between">
            <h1 class="text-sand-200 font-medium">@yield('page-title', 'Dashboard')</h1>
            <span class="text-xs text-sand-600 font-mono">{{ now()->format('D, d M Y') }}</span>
        </header>

        <main class="flex-1 overflow-auto p-8">
            @if(session('success'))
                <div class="mb-6 px-4 py-3 rounded bg-green-900/20 border border-green-800/30 text-green-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 px-4 py-3 rounded bg-red-900/20 border border-red-800/30 text-red-400 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
