@extends('layouts.app')
@section('title', 'Work — Emmanuel Mwangata')
@section('description', 'A curated selection of web applications, APIs, and software systems built by Emmanuel Mwangata.')

@section('content')

{{-- Header --}}
<section class="pt-32 pb-16 border-b border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">Portfolio</div>
        <div class="flex items-end justify-between gap-6">
            <h1 class="font-display text-display-lg text-sand-100 mt-2 reveal">
                Selected<br><em class="text-sand-400">work</em>
            </h1>
            <p class="text-sand-500 text-sm max-w-xs text-right reveal hidden md:block">
                Each project represents a specific problem solved with thoughtful technical execution.
            </p>
        </div>
    </div>
</section>

{{-- Filters --}}
<div class="border-b border-obsidian-border sticky top-16 z-10 bg-obsidian/90 backdrop-blur-sm"
     x-data="projectFilter('all')"
     id="project-filters">
    <div class="container-site py-4">
        <div class="flex flex-wrap items-center gap-2">
            @php
                $categories = [
                    'all' => 'All Work',
                    'web' => 'Web Apps',
                    'mobile' => 'Mobile',
                    'api' => 'APIs & Backend',
                    'enterprise' => 'Enterprise',
                    'other' => 'Other',
                ];
            @endphp
            @foreach($categories as $key => $label)
            <button
                class="filter-btn"
                :class="{ 'active': active === '{{ $key }}' }"
                @click="filter('{{ $key }}')"
                aria-pressed="{{ $key === 'all' ? 'true' : 'false' }}"
                :aria-pressed="(active === '{{ $key }}').toString()">
                {{ $label }}
            </button>
            @endforeach
        </div>
    </div>
</div>

{{-- Projects grid --}}
<section class="section-pad">
    <div class="container-site">
        @if($projects->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
            <article class="project-card-wrap" data-category="{{ $project->category }}">
                <div class="project-card">
                    <div class="project-card-img">
                        @if($project->image_path)
                            <img src="{{ Storage::url($project->image_path) }}"
                                 alt="{{ $project->name }}"
                                 loading="lazy" width="800" height="450">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="font-display text-6xl text-sand-800 select-none">{{ substr($project->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="project-card-overlay">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('projects.show', $project->slug) }}" class="btn-primary text-xs py-2 px-4">
                                    Details
                                </a>
                                @if($project->live_url)
                                <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="btn-outline text-xs py-2 px-4">
                                    Live ↗
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-3 mb-2">
                            <h2 class="font-display text-xl text-sand-100 leading-tight">
                                <a href="{{ route('projects.show', $project->slug) }}" class="hover:text-sand-300 transition-colors">
                                    {{ $project->name }}
                                </a>
                            </h2>
                            <span class="badge {{ $project->status === 'live' ? 'badge-active' : 'badge-dev' }} flex-shrink-0 mt-0.5">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                        <p class="text-sand-500 text-sm leading-relaxed mb-4">{{ Str::limit($project->description, 110) }}</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach(array_slice($project->technologies ?? [], 0, 5) as $tech)
                            <span class="skill-tag text-xs py-1 px-2">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($projects->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $projects->links() }}
        </div>
        @endif

        @else
        <div class="text-center py-24">
            <p class="font-display text-3xl text-sand-700 mb-3">No projects yet</p>
            <p class="text-sand-600 text-sm">Projects added from the admin dashboard will appear here.</p>
        </div>
        @endif
    </div>
</section>

@endsection
