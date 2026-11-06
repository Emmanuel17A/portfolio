@extends('layouts.app')
@section('title', 'Privacy Policy — Emmanuel Mwangata')

@section('content')
<section class="pt-32 pb-16 border-b border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">Legal</div>
        <h1 class="font-display text-display-md text-sand-100 mt-2 reveal">Privacy Policy</h1>
        <p class="text-sand-600 text-sm mt-3 reveal">Last updated: {{ date('d F Y') }}</p>
    </div>
</section>

<section class="section-pad">
    <div class="container-site max-w-3xl">
        <div class="prose prose-invert prose-sand max-w-none space-y-8 text-sand-400 leading-relaxed reveal">

            <div>
                <h2 class="font-display text-2xl text-sand-100 mb-3">Information I Collect</h2>
                <p>When you use the contact form on this website, I collect the information you voluntarily provide: your name, email address, subject, project description, and any optional fields you choose to complete.</p>
                <p class="mt-3">I also collect your IP address for security purposes, specifically to enforce rate limiting and prevent spam submissions.</p>
            </div>

            <div>
                <h2 class="font-display text-2xl text-sand-100 mb-3">How I Use Your Information</h2>
                <p>Information submitted through the contact form is used solely to:</p>
                <ul class="mt-3 space-y-2">
                    @foreach([
                        'Respond to your enquiry',
                        'Discuss potential project collaboration',
                        'Follow up on conversations you initiate',
                    ] as $item)
                    <li class="flex items-start gap-2">
                        <span class="mt-2 w-1 h-1 rounded-full bg-sand-600 flex-shrink-0"></span>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
                <p class="mt-3">I do not sell, rent, or share your personal information with third parties for marketing purposes.</p>
            </div>

            <div>
                <h2 class="font-display text-2xl text-sand-100 mb-3">Data Retention</h2>
                <p>Contact messages are retained for a reasonable period to allow for follow-up correspondence. You may request deletion of your data at any time by contacting me directly.</p>
            </div>

            <div>
                <h2 class="font-display text-2xl text-sand-100 mb-3">Cookies</h2>
                <p>This website uses only essential session cookies required for security (CSRF protection) and to display flash messages. No tracking or advertising cookies are used.</p>
            </div>

            <div>
                <h2 class="font-display text-2xl text-sand-100 mb-3">Contact</h2>
                <p>For any privacy-related questions or data deletion requests, contact me at <a href="mailto:futurist@example.com" class="text-sand-300 hover:text-sand-100 transition-colors">futurist@example.com</a>.</p>
            </div>
        </div>
    </div>
</section>
@endsection
