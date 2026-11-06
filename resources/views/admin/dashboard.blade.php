@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Stat cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
    @php
        $statCards = [
            ['label' => 'Total Projects',   'value' => $stats['projects'],        'sub' => $stats['live_projects'] . ' live'],
            ['label' => 'Total Messages',   'value' => $stats['messages'],        'sub' => $stats['unread_messages'] . ' unread'],
        ];
    @endphp
    @foreach($statCards as $card)
    <div class="service-card">
        <p class="text-xs uppercase tracking-widest text-sand-600 mb-2">{{ $card['label'] }}</p>
        <p class="font-display text-4xl text-sand-100">{{ $card['value'] }}</p>
        <p class="text-xs text-sand-600 mt-1">{{ $card['sub'] }}</p>
    </div>
    @endforeach

    <div class="service-card">
        <p class="text-xs uppercase tracking-widest text-sand-600 mb-2">Unread Messages</p>
        <p class="font-display text-4xl {{ $stats['unread_messages'] > 0 ? 'text-sand-300' : 'text-sand-700' }}">
            {{ $stats['unread_messages'] }}
        </p>
        <a href="{{ route('admin.messages.index') }}" class="text-xs text-sand-600 hover:text-sand-400 mt-1 inline-block">View all →</a>
    </div>

    <div class="service-card">
        <p class="text-xs uppercase tracking-widest text-sand-600 mb-3">Quick Actions</p>
        <div class="space-y-2">
            <a href="{{ route('admin.projects.create') }}" class="btn-primary text-xs py-2 w-full justify-center inline-flex">+ Add Project</a>
        </div>
    </div>
</div>

<div class="grid lg:grid-cols-2 gap-8">
    {{-- Recent messages --}}
    <div>
        <h2 class="font-display text-xl text-sand-200 mb-4">Recent Messages</h2>
        @if($recentMessages->count())
        <div class="space-y-2">
            @foreach($recentMessages as $msg)
            <a href="{{ route('admin.messages.show', $msg) }}"
               class="flex items-start justify-between p-4 bg-obsidian-light border border-obsidian-border rounded hover:border-sand-700 transition-colors gap-3">
                <div class="min-w-0">
                    <p class="text-sand-200 text-sm font-medium truncate">{{ $msg->name }}</p>
                    <p class="text-sand-600 text-xs truncate">{{ $msg->subject }}</p>
                </div>
                <div class="flex items-center gap-2 flex-shrink-0">
                    @if(!$msg->is_read)
                        <span class="w-1.5 h-1.5 rounded-full bg-sand-400 flex-shrink-0"></span>
                    @endif
                    <span class="text-xs text-sand-700">{{ $msg->created_at->diffForHumans() }}</span>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <p class="text-sand-600 text-sm">No messages yet.</p>
        @endif
    </div>

    {{-- Recent projects --}}
    <div>
        <h2 class="font-display text-xl text-sand-200 mb-4">Projects</h2>
        @if($recentProjects->count())
        <div class="space-y-2">
            @foreach($recentProjects as $project)
            <a href="{{ route('admin.projects.edit', $project) }}"
               class="flex items-center justify-between p-4 bg-obsidian-light border border-obsidian-border rounded hover:border-sand-700 transition-colors gap-3">
                <div class="min-w-0">
                    <p class="text-sand-200 text-sm font-medium truncate">{{ $project->name }}</p>
                    <p class="text-sand-600 text-xs">{{ ucfirst($project->category) }}</p>
                </div>
                <span class="badge {{ $project->status === 'live' ? 'badge-active' : 'badge-dev' }} flex-shrink-0">
                    {{ ucfirst($project->status) }}
                </span>
            </a>
            @endforeach
        </div>
        @else
        <p class="text-sand-600 text-sm">No projects yet. <a href="{{ route('admin.projects.create') }}" class="text-sand-400 underline">Add one</a>.</p>
        @endif
    </div>
</div>

{{-- CV Upload --}}
<div class="mt-10 service-card max-w-md">
    <p class="text-xs uppercase tracking-widest text-sand-600 mb-4">CV / Résumé Upload</p>
    <form action="{{ route('admin.cv.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <div class="form-field">
            <label for="cv" class="form-label">PDF file (max 10MB)</label>
            <input type="file" id="cv" name="cv" accept=".pdf" class="form-input text-sm">
        </div>
        <button type="submit" class="btn-outline text-xs py-2">Upload CV</button>
    </form>
</div>

@endsection
