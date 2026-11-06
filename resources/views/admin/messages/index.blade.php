@extends('layouts.admin')
@section('title', 'Messages')
@section('page-title', 'Contact Messages')

@section('content')

<div class="flex items-center justify-between mb-6">
    <p class="text-sand-500 text-sm">{{ $messages->total() }} total</p>
</div>

@if($messages->count())
<div class="bg-obsidian-light border border-obsidian-border rounded overflow-hidden">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-obsidian-border">
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal w-4"></th>
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal">From</th>
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal hidden md:table-cell">Subject</th>
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal hidden lg:table-cell">Category</th>
                <th class="text-left px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal hidden lg:table-cell">Received</th>
                <th class="text-right px-5 py-3 text-xs uppercase tracking-widest text-sand-600 font-normal">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-obsidian-border">
            @foreach($messages as $msg)
            <tr class="hover:bg-obsidian-mid transition-colors {{ !$msg->is_read ? 'bg-obsidian-mid/50' : '' }}">
                <td class="px-5 py-3">
                    @if(!$msg->is_read)
                        <span class="w-1.5 h-1.5 rounded-full bg-sand-400 inline-block" title="Unread"></span>
                    @endif
                </td>
                <td class="px-5 py-3">
                    <p class="text-sand-200 font-medium">{{ $msg->name }}</p>
                    <p class="text-sand-600 text-xs">{{ $msg->email }}</p>
                </td>
                <td class="px-5 py-3 text-sand-400 hidden md:table-cell">{{ Str::limit($msg->subject, 50) }}</td>
                <td class="px-5 py-3 text-sand-600 text-xs hidden lg:table-cell">{{ ucfirst(str_replace('_', ' ', $msg->project_category ?? '—')) }}</td>
                <td class="px-5 py-3 text-sand-700 text-xs hidden lg:table-cell">{{ $msg->created_at->format('d M Y') }}</td>
                <td class="px-5 py-3 text-right">
                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.messages.show', $msg) }}"
                           class="text-xs text-sand-500 hover:text-sand-200 transition-colors">View</a>
                        <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}"
                              onsubmit="return confirm('Delete this message?')" class="inline">
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
<div class="mt-6">{{ $messages->links() }}</div>
@else
<div class="text-center py-16 text-sand-600">
    <p class="font-display text-2xl text-sand-700 mb-2">No messages yet</p>
    <p class="text-sm">Messages submitted through the contact form will appear here.</p>
</div>
@endif

@endsection
