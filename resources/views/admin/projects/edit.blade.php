@extends('layouts.admin')
@section('title', 'Edit — ' . $project->name)
@section('page-title', 'Edit Project')

@section('content')

<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')

        <div class="grid sm:grid-cols-2 gap-5">
            <div class="form-field sm:col-span-2">
                <label for="name" class="form-label">Project Name *</label>
                <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'error' : '' }}"
                       value="{{ old('name', $project->name) }}" required>
                @error('name')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="form-field">
                <label for="category" class="form-label">Category *</label>
                <select id="category" name="category" class="form-input">
                    @foreach(['web' => 'Web Application', 'mobile' => 'Mobile', 'api' => 'API / Backend', 'enterprise' => 'Enterprise', 'other' => 'Other'] as $val => $label)
                    <option value="{{ $val }}" {{ old('category', $project->category) === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field">
                <label for="status" class="form-label">Status *</label>
                <select id="status" name="status" class="form-input">
                    @foreach(['dev' => 'In Development', 'live' => 'Live', 'archived' => 'Archived'] as $val => $label)
                    <option value="{{ $val }}" {{ old('status', $project->status) === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-field">
            <label for="description" class="form-label">Short Description *</label>
            <textarea id="description" name="description" rows="3" class="form-input" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-field">
            <label for="problem" class="form-label">The Problem</label>
            <textarea id="problem" name="problem" rows="3" class="form-input">{{ old('problem', $project->problem) }}</textarea>
        </div>

        <div class="form-field">
            <label for="solution" class="form-label">The Solution</label>
            <textarea id="solution" name="solution" rows="3" class="form-input">{{ old('solution', $project->solution) }}</textarea>
        </div>

        <div class="form-field">
            <label for="technologies" class="form-label">Technologies (comma-separated)</label>
            <input type="text" id="technologies" name="technologies" class="form-input"
                   value="{{ old('technologies', implode(', ', $project->technologies ?? [])) }}">
        </div>

        <div class="form-field">
            <label for="features" class="form-label">Key Features (one per line)</label>
            <textarea id="features" name="features" rows="4" class="form-input">{{ old('features', implode("\n", $project->features ?? [])) }}</textarea>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div class="form-field">
                <label for="live_url" class="form-label">Live URL</label>
                <input type="url" id="live_url" name="live_url" class="form-input"
                       value="{{ old('live_url', $project->live_url) }}">
            </div>
            <div class="form-field">
                <label for="github_url" class="form-label">GitHub URL</label>
                <input type="url" id="github_url" name="github_url" class="form-input"
                       value="{{ old('github_url', $project->github_url) }}">
            </div>
        </div>

        <div class="form-field">
            <label for="image" class="form-label">Replace Screenshot</label>
            @if($project->image_path)
            <div class="mb-3">
                <img src="{{ Storage::url($project->image_path) }}" alt="Current" class="h-24 rounded border border-obsidian-border object-cover">
                <p class="text-xs text-sand-700 mt-1">Current image. Upload a new one to replace it.</p>
            </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*" class="form-input text-sm">
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div class="form-field">
                <label for="sort_order" class="form-label">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" class="form-input"
                       value="{{ old('sort_order', $project->sort_order) }}" min="0">
            </div>
            <div class="form-field">
                <label class="form-label">Featured on Home</label>
                <label class="flex items-center gap-2 mt-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" class="accent-sand-400"
                           {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                    <span class="text-sand-400 text-sm">Show on homepage</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="btn-primary">Update Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn-outline text-sm">Cancel</a>
        </div>
    </form>
</div>

@endsection
