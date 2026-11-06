@extends('layouts.app')
@section('title', '404 — Page Not Found')

@section('content')
<section class="min-h-screen flex items-center justify-center relative overflow-hidden">

    <div class="absolute inset-0 flex items-center justify-center pointer-events-none select-none" aria-hidden="true">
        <span class="error-code">404</span>
    </div>

    <div class="container-site text-center relative z-10 py-20">
        <div class="section-eyebrow justify-center reveal">Error 404</div>
        <h1 class="font-display text-display-lg text-sand-100 mt-4 mb-6 reveal">
            Page not<br><em class="text-sand-400">found</em>
        </h1>
        <p class="text-sand-500 mb-10 max-w-sm mx-auto reveal">
            The page you're looking for doesn't exist or has been moved. Let's get you back on track.
        </p>
        <div class="flex flex-wrap gap-4 justify-center reveal">
            <a href="{{ route('home') }}" class="btn-primary btn-magnetic">
                Back to Home
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                    <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="{{ route('contact') }}" class="btn-outline">Get in Touch</a>
        </div>

        <div class="mt-16 flex flex-wrap gap-6 justify-center reveal">
            @foreach([
                ['route' => 'projects.index', 'label' => 'View Work'],
                ['route' => 'about',          'label' => 'About Me'],
                ['route' => 'services',       'label' => 'Services'],
            ] as $link)
            <a href="{{ route($link['route']) }}" class="text-sm text-sand-600 hover:text-sand-400 transition-colors">
                {{ $link['label'] }} →
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
