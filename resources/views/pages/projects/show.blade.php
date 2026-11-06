@extends('layouts.app')
@section('title', $project->name . ' — Emmanuel Mwangata')
@section('description', Str::limit($project->description, 160))

@section('content')

{{-- Hero --}}
<section class="pt-32 pb-16 border-b border-obsidian-border">
    <div class="container-site">
        <div class="mb-5">
            <a href="{{ route('projects.index') }}" class="text-xs font-mono text-sand-600 hover:text-sand-400 transition-colors inline-flex items-center gap-2">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M9 6H3M5 4L3 6l2 2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                All projects
            </a>
        </div>

        <div class="grid lg:grid-cols-3 gap-10 items-start">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <span class="badge {{ $project->status === 'live' ? 'badge-active' : 'badge-dev' }}">{{ ucfirst($project->status) }}</span>
                    <span class="text-xs font-mono text-sand-600">{{ ucfirst($project->category) }}</span>
                </div>
                <h1 class="font-display text-display-lg text-sand-100 mb-4">{{ $project->name }}</h1>
                <p class="text-sand-400 text-lg leading-relaxed">{{ $project->description }}</p>
            </div>

            <div class="space-y-3">
                @if($project->live_url)
                <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="btn-primary w-full justify-center">
                    View Live Site ↗
                </a>
                @endif
                @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="btn-outline w-full justify-center">
                    GitHub Repository ↗
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Project image --}}
@if($project->image_path)
<div class="border-b border-obsidian-border">
    <div class="container-site py-8">
        <div class="rounded overflow-hidden aspect-video bg-obsidian-mid">
            <img src="{{ Storage::url($project->image_path) }}"
                 alt="{{ $project->name }} screenshot"
                 class="w-full h-full object-cover"
                 width="1280" height="720">
        </div>
    </div>
</div>
@endif

{{-- Detail content --}}
<section class="section-pad">
    <div class="container-site grid lg:grid-cols-3 gap-16">
        <div class="lg:col-span-2 space-y-12">

            @if($project->problem)
            <div class="reveal">
                <h2 class="font-display text-2xl text-sand-100 mb-4">The Problem</h2>
                <p class="text-sand-400 leading-relaxed">{{ $project->problem }}</p>
            </div>
            @endif

            @if($project->solution)
            <div class="reveal">
                <h2 class="font-display text-2xl text-sand-100 mb-4">The Solution</h2>
                <p class="text-sand-400 leading-relaxed">{{ $project->solution }}</p>
            </div>
            @endif

            @if($project->features && count($project->features))
            <div class="reveal">
                <h2 class="font-display text-2xl text-sand-100 mb-5">Key Features</h2>
                <ul class="space-y-3">
                    @foreach($project->features as $feature)
                    <li class="flex items-start gap-3 text-sand-400 text-sm leading-relaxed">
                        <span class="mt-1.5 w-1 h-1 rounded-full bg-sand-500 flex-shrink-0"></span>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            <div class="service-card reveal">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-4">Technologies</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->technologies ?? [] as $tech)
                    <span class="skill-tag text-xs">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            <div class="service-card reveal">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-4">Project Info</p>
                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-sand-600">Category</dt>
                        <dd class="text-sand-300">{{ ucfirst($project->category) }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sand-600">Status</dt>
                        <dd class="text-sand-300">{{ ucfirst($project->status) }}</dd>
                    </div>
                    @if($project->created_at)
                    <div class="flex justify-between">
                        <dt class="text-sand-600">Year</dt>
                        <dd class="text-sand-300">{{ $project->created_at->format('Y') }}</dd>
                    </div>
                    @endif
                </dl>
            </div>
        </div>
    </div>
</section>

{{-- Related projects --}}
@if($related->count())
<section class="section-pad border-t border-obsidian-border">
    <div class="container-site">
        <h2 class="font-display text-2xl text-sand-100 mb-8 reveal">More Projects</h2>
        <div class="grid md:grid-cols-3 gap-6 reveal-stagger">
            @foreach($related as $rel)
            <div class="project-card">
                <div class="p-5">
                    <h3 class="font-display text-xl text-sand-100 mb-2">
                        <a href="{{ route('projects.show', $rel->slug) }}" class="hover:text-sand-300 transition-colors">{{ $rel->name }}</a>
                    </h3>
                    <p class="text-sand-500 text-sm">{{ Str::limit($rel->description, 80) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
