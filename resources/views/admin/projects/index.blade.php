@extends('layouts.admin')
@section('title', 'Projects')
@section('page-title', 'Projects')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-sand-500 text-sm">{{ $projects->total() }} total</p>
    <a href="{{ route('admin.projects.create') }}" class="btn-primary text-xs py-2.5">
        + Add Project
    </a>
</div>

@if($projects->count())
<div class="bg-obsidian-light border border-obsidian-border rounded overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-obsidian-border">
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal">Name</th>
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal hidden md:table-cell">Category</th>
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal">Status</th>
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal hidden lg:table-cell">Featured</th>
                <th class="text-right px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-obsidian-border">
            @foreach($projects as $project)
            <tr class="hover:bg-obsidian-mid transition-colors">
                <td class="px-5 py-3">
                    <p class="text-sand-200 font-medium">{{ $project->name }}</p>
                    <p class="text-sand-600 text-xs truncate max-w-xs">{{ Str::limit($project->description, 60) }}</p>
                </td>
                <td class="px-5 py-3 text-sand-500 hidden md:table-cell">{{ ucfirst($project->category) }}</td>
                <td class="px-5 py-3">
                    <span class="badge {{ $project->status === 'live' ? 'badge-active' : 'badge-dev' }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </td>
                <td class="px-5 py-3 hidden lg:table-cell">
                    <span class="text-{{ $project->is_featured ? 'sand-300' : 'sand-700' }} text-xs">
                        {{ $project->is_featured ? '★ Yes' : '—' }}
                    </span>
                </td>
                <td class="px-5 py-3 text-right">
                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('projects.show', $project->slug) }}" target="_blank"
                           class="text-xs text-sand-600 hover:text-sand-400 transition-colors">View ↗</a>
                        <a href="{{ route('admin.projects.edit', $project) }}"
                           class="text-xs text-sand-500 hover:text-sand-200 transition-colors">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                              onsubmit="return confirm('Delete this project?')" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-xs text-red-600 hover:text-red-400 transition-colors">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $projects->links() }}</div>

@else
<div class="text-center py-16 text-sand-600">
    <p class="font-display text-2xl text-sand-700 mb-2">No projects yet</p>
    <a href="{{ route('admin.projects.create') }}" class="btn-primary mt-4 inline-flex">Add your first project</a>
</div>
@endif

@endsection
