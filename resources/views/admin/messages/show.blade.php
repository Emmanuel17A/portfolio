@extends('layouts.admin')
@section('title', 'Message from ' . $message->name)
@section('page-title', 'Message Details')

@section('content')

<div class="max-w-2xl">
    <div class="mb-6">
        <a href="{{ route('admin.messages.index') }}" class="text-xs text-sand-600 hover:text-sand-400 transition-colors inline-flex items-center gap-2">
            ← All messages
        </a>
    </div>

    <div class="service-card mb-5">
        <dl class="grid sm:grid-cols-2 gap-4 text-sm">
            <div>
                <dt class="text-xs uppercase tracking-widest text-sand-600 mb-1">From</dt>
                <dd class="text-sand-200">{{ $message->name }}</dd>
            </div>
            <div>
                <dt class="text-xs uppercase tracking-widest text-sand-600 mb-1">Email</dt>
                <dd><a href="mailto:{{ $message->email }}" class="text-sand-300 hover:text-sand-100 transition-colors">{{ $message->email }}</a></dd>
            </div>
            <div>
                <dt class="text-xs uppercase tracking-widest text-sand-600 mb-1">Subject</dt>
                <dd class="text-sand-200">{{ $message->subject }}</dd>
            </div>
            <div>
                <dt class="text-xs uppercase tracking-widest text-sand-600 mb-1">Category</dt>
                <dd class="text-sand-400">{{ ucfirst(str_replace('_', ' ', $message->project_category ?? 'Not specified')) }}</dd>
            </div>
            @if($message->budget)
            <div>
                <dt class="text-xs uppercase tracking-widest text-sand-600 mb-1">Budget</dt>
                <dd class="text-sand-400">{{ ucfirst(str_replace('_', ' ', $message->budget)) }}</dd>
            </div>
            @endif
            <div>
                <dt class="text-xs uppercase tracking-widest text-sand-600 mb-1">Preferred Contact</dt>
                <dd class="text-sand-400">{{ ucfirst($message->preferred_contact) }}</dd>
            </div>
            <div>
                <dt class="text-xs uppercase tracking-widest text-sand-600 mb-1">Received</dt>
                <dd class="text-sand-500 text-xs">{{ $message->created_at->format('D, d M Y \a\t H:i') }}</dd>
            </div>
        </dl>
    </div>

    <div class="service-card mb-6">
        <p class="text-xs uppercase tracking-widest text-sand-600 mb-3">Message</p>
        <p class="text-sand-300 leading-relaxed whitespace-pre-wrap text-sm">{{ $message->message }}</p>
    </div>

    <div class="flex items-center gap-4">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}"
           class="btn-primary">
            Reply via Email
        </a>
        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}"
              onsubmit="return confirm('Delete this message permanently?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn-outline text-red-500 border-red-900/30 hover:border-red-700/50 text-sm">
                Delete
            </button>
        </form>
    </div>
</div>

@endsection
