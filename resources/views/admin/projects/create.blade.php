@extends('layouts.admin')
@section('title', 'Add Project')
@section('page-title', 'Add Project')

@section('content')

<div class="max-w-3xl">
    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid sm:grid-cols-2 gap-5">
            <div class="form-field sm:col-span-2">
                <label for="name" class="form-label">Project Name *</label>
                <input type="text" id="name" name="name" class="form-input {{ $errors->has('name') ? 'error' : '' }}"
                       value="{{ old('name') }}" required>
                @error('name')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="form-field">
                <label for="category" class="form-label">Category *</label>
                <select id="category" name="category" class="form-input">
                    @foreach(['web' => 'Web Application', 'mobile' => 'Mobile', 'api' => 'API / Backend', 'enterprise' => 'Enterprise', 'other' => 'Other'] as $val => $label)
                    <option value="{{ $val }}" {{ old('category') === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-field">
                <label for="status" class="form-label">Status *</label>
                <select id="status" name="status" class="form-input">
                    @foreach(['dev' => 'In Development', 'live' => 'Live', 'archived' => 'Archived'] as $val => $label)
                    <option value="{{ $val }}" {{ old('status', 'dev') === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-field">
            <label for="description" class="form-label">Short Description *</label>
            <textarea id="description" name="description" rows="3" class="form-input {{ $errors->has('description') ? 'error' : '' }}"
                      required>{{ old('description') }}</textarea>
            @error('description')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="form-field">
            <label for="problem" class="form-label">The Problem (optional)</label>
            <textarea id="problem" name="problem" rows="3" class="form-input">{{ old('problem') }}</textarea>
        </div>

        <div class="form-field">
            <label for="solution" class="form-label">The Solution (optional)</label>
            <textarea id="solution" name="solution" rows="3" class="form-input">{{ old('solution') }}</textarea>
        </div>

        <div class="form-field">
            <label for="technologies" class="form-label">Technologies (comma-separated)</label>
            <input type="text" id="technologies" name="technologies" class="form-input"
                   value="{{ old('technologies') }}" placeholder="Laravel, PHP, MySQL, Tailwind CSS">
        </div>

        <div class="form-field">
            <label for="features" class="form-label">Key Features (one per line)</label>
            <textarea id="features" name="features" rows="4" class="form-input"
                      placeholder="Real-time stock tracking&#10;Multi-supplier management&#10;Sales reporting">{{ old('features') }}</textarea>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div class="form-field">
                <label for="live_url" class="form-label">Live URL</label>
                <input type="url" id="live_url" name="live_url" class="form-input {{ $errors->has('live_url') ? 'error' : '' }}"
                       value="{{ old('live_url') }}" placeholder="https://...">
                @error('live_url')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="form-field">
                <label for="github_url" class="form-label">GitHub URL</label>
                <input type="url" id="github_url" name="github_url" class="form-input {{ $errors->has('github_url') ? 'error' : '' }}"
                       value="{{ old('github_url') }}" placeholder="https://github.com/...">
                @error('github_url')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="form-field">
            <label for="image" class="form-label">Project Screenshot (max 4MB)</label>
            <input type="file" id="image" name="image" accept="image/*" class="form-input text-sm">
            @error('image')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
            <div class="form-field">
                <label for="sort_order" class="form-label">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" class="form-input"
                       value="{{ old('sort_order', 0) }}" min="0">
            </div>
            <div class="form-field">
                <label class="form-label">Featured on Home</label>
                <label class="flex items-center gap-2 mt-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" class="accent-sand-400"
                           {{ old('is_featured') ? 'checked' : '' }}>
                    <span class="text-sand-400 text-sm">Show on homepage</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="btn-primary">Save Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn-outline text-sm">Cancel</a>
        </div>
    </form>
</div>

@endsection
