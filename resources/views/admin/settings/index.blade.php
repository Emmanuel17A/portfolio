@extends('layouts.admin')
@section('title', 'Settings')
@section('page-title', 'Site Settings')

@section('content')

<div class="max-w-2xl">
    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
        @csrf

        <div class="service-card space-y-6">
            <div class="form-field">
                <label for="availability" class="form-label">Availability Status</label>
                <select id="availability" name="availability" class="form-input">
                    @foreach([
                        'available'   => 'Available for work',
                        'busy'        => 'Currently busy (limited availability)',
                        'unavailable' => 'Unavailable for new projects',
                    ] as $val => $label)
                    <option value="{{ $val }}" {{ old('availability', $settings['availability'] ?? 'available') === $val ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @error('availability')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid sm:grid-cols-3 gap-5">
                <div class="form-field">
                    <label for="stat_years" class="form-label">Years of Experience</label>
                    <input type="number" id="stat_years" name="stat_years" class="form-input"
                           value="{{ old('stat_years', $settings['stat_years'] ?? 4) }}" min="0" required>
                    @error('stat_years')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="form-field">
                    <label for="stat_projects" class="form-label">Projects Shipped</label>
                    <input type="number" id="stat_projects" name="stat_projects" class="form-input"
                           value="{{ old('stat_projects', $settings['stat_projects'] ?? 20) }}" min="0" required>
                    @error('stat_projects')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="form-field">
                    <label for="stat_technologies" class="form-label">Technologies</label>
                    <input type="number" id="stat_technologies" name="stat_technologies" class="form-input"
                           value="{{ old('stat_technologies', $settings['stat_technologies'] ?? 8) }}" min="0" required>
                    @error('stat_technologies')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-field">
                <label for="tagline" class="form-label">Hero Tagline</label>
                <input type="text" id="tagline" name="tagline" class="form-input"
                       value="{{ old('tagline', $settings['tagline'] ?? 'I build software that works.') }}" required>
                @error('tagline')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="form-field">
                <label for="meta_description" class="form-label">Site Meta Description</label>
                <textarea id="meta_description" name="meta_description" rows="3" class="form-input">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                @error('meta_description')<p class="text-xs text-red-400 mt-1">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="pt-2">
            <button type="submit" class="btn-primary">Save Settings</button>
        </div>
    </form>
</div>

@endsection

