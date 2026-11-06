@extends('layouts.app')
@section('title', 'Contact — Emmanuel Mwangata')
@section('description', 'Get in touch to discuss your project. I work with businesses and individuals who need reliable software development.')

@section('content')

{{-- Header --}}
<section class="pt-32 pb-16 border-b border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">Get in Touch</div>
        <h1 class="font-display text-display-lg text-sand-100 mt-2 reveal">
            Let's build<br><em class="text-sand-400">something together</em>
        </h1>
        <p class="mt-6 text-sand-500 max-w-lg reveal">
            Whether you have a detailed brief or just an early idea, I'm happy to have an honest conversation about what you need and whether I can help.
        </p>
    </div>
</section>

<section class="section-pad">
    <div class="container-site grid lg:grid-cols-3 gap-16">

        {{-- Form --}}
        <div class="lg:col-span-2">
            <form
                action="{{ route('contact.send') }}"
                method="POST"
                class="space-y-6 reveal"
                novalidate>
                @csrf

                <div class="grid sm:grid-cols-2 gap-5">
                    <div class="form-field">
                        <label for="name" class="form-label">Full Name <span aria-hidden="true">*</span></label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input {{ $errors->has('name') ? 'error' : '' }}"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            aria-required="true"
                            aria-describedby="{{ $errors->has('name') ? 'name-error' : '' }}">
                        @error('name')
                            <p id="name-error" class="text-xs text-red-400 mt-1" role="alert">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-field">
                        <label for="email" class="form-label">Email Address <span aria-hidden="true">*</span></label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input {{ $errors->has('email') ? 'error' : '' }}"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            aria-required="true"
                            aria-describedby="{{ $errors->has('email') ? 'email-error' : '' }}">
                        @error('email')
                            <p id="email-error" class="text-xs text-red-400 mt-1" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-field">
                    <label for="subject" class="form-label">Subject <span aria-hidden="true">*</span></label>
                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        class="form-input {{ $errors->has('subject') ? 'error' : '' }}"
                        value="{{ old('subject') }}"
                        required
                        aria-required="true">
                    @error('subject')
                        <p class="text-xs text-red-400 mt-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-5">
                    <div class="form-field">
                        <label for="project_category" class="form-label">Project Category</label>
                        <select id="project_category" name="project_category" class="form-input">
                            <option value="">— Select one —</option>
                            <option value="web_app" {{ old('project_category') === 'web_app' ? 'selected' : '' }}>Web Application</option>
                            <option value="api_backend" {{ old('project_category') === 'api_backend' ? 'selected' : '' }}>API / Backend</option>
                            <option value="automation" {{ old('project_category') === 'automation' ? 'selected' : '' }}>Business Automation</option>
                            <option value="consultation" {{ old('project_category') === 'consultation' ? 'selected' : '' }}>Consultation</option>
                            <option value="maintenance" {{ old('project_category') === 'maintenance' ? 'selected' : '' }}>Maintenance / Support</option>
                            <option value="other" {{ old('project_category') === 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="form-field">
                        <label for="budget" class="form-label">Estimated Budget (optional)</label>
                        <select id="budget" name="budget" class="form-input">
                            <option value="">— Prefer not to say —</option>
                            <option value="under_500" {{ old('budget') === 'under_500' ? 'selected' : '' }}>Under $500</option>
                            <option value="500_2000" {{ old('budget') === '500_2000' ? 'selected' : '' }}>$500 — $2,000</option>
                            <option value="2000_5000" {{ old('budget') === '2000_5000' ? 'selected' : '' }}>$2,000 — $5,000</option>
                            <option value="over_5000" {{ old('budget') === 'over_5000' ? 'selected' : '' }}>Over $5,000</option>
                        </select>
                    </div>
                </div>

                <div class="form-field">
                    <label for="message" class="form-label">Project Description <span aria-hidden="true">*</span></label>
                    <textarea
                        id="message"
                        name="message"
                        rows="6"
                        class="form-input {{ $errors->has('message') ? 'error' : '' }}"
                        required
                        aria-required="true"
                        placeholder="Describe what you're building, what problem it solves, and any technical requirements you're aware of.">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-xs text-red-400 mt-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-field">
                    <label class="form-label">Preferred Contact Method</label>
                    <div class="flex flex-wrap gap-4 mt-1">
                        @foreach(['email' => 'Email', 'whatsapp' => 'WhatsApp'] as $val => $label)
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="preferred_contact" value="{{ $val }}"
                                   {{ old('preferred_contact', 'email') === $val ? 'checked' : '' }}
                                   class="accent-sand-400">
                            <span class="text-sand-400 text-sm">{{ $label }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="btn-primary btn-magnetic w-full sm:w-auto">
                        Send Message
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                            <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6 reveal">
            <div class="service-card">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-4">Direct Contact</p>
                <div class="space-y-3">
                    <a href="mailto:futurist@example.com" class="flex items-center gap-3 text-sand-400 hover:text-sand-200 transition-colors text-sm">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
                        futurist@example.com
                    </a>
                </div>
            </div>

            <div class="service-card">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-4">Social & Professional</p>
                <div class="space-y-3">
                    <a href="https://github.com/YOUR_GITHUB" target="_blank" rel="noopener" class="flex items-center gap-3 text-sand-400 hover:text-sand-200 transition-colors text-sm">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.58 2 12.21c0 4.5 2.87 8.32 6.84 9.67.5.09.68-.22.68-.49 0-.24-.01-.88-.01-1.72-2.78.62-3.37-1.37-3.37-1.37-.45-1.17-1.11-1.48-1.11-1.48-.91-.63.07-.62.07-.62 1 .07 1.53 1.05 1.53 1.05.89 1.56 2.34 1.11 2.91.85.09-.66.35-1.11.63-1.37-2.22-.26-4.56-1.13-4.56-5.03 0-1.11.39-2.02 1.03-2.73-.1-.26-.45-1.3.1-2.7 0 0 .84-.27 2.75 1.05a9.4 9.4 0 012.5-.34c.85 0 1.71.11 2.5.34 1.91-1.32 2.75-1.05 2.75-1.05.55 1.4.2 2.44.1 2.7.64.71 1.03 1.62 1.03 2.73 0 3.91-2.34 4.77-4.57 5.02.36.32.68.94.68 1.9 0 1.37-.01 2.47-.01 2.81 0 .27.18.59.69.49A10.21 10.21 0 0022 12.21C22 6.58 17.52 2 12 2z"/></svg>
                        GitHub
                    </a>
                    <a href="https://linkedin.com/in/YOUR_LINKEDIN" target="_blank" rel="noopener" class="flex items-center gap-3 text-sand-400 hover:text-sand-200 transition-colors text-sm">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.59 0 4.26 2.37 4.26 5.44v6.3zM5.34 7.43a2.07 2.07 0 110-4.14 2.07 2.07 0 010 4.14zM3.56 20.45h3.56V9H3.56v11.45zM22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46C23.21 24 24 23.23 24 22.28V1.72C24 .77 23.21 0 22.23 0z"/></svg>
                        LinkedIn
                    </a>
                </div>
            </div>

            <div class="service-card">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-3">Response Time</p>
                <p class="text-sand-400 text-sm">I aim to respond to all enquiries within 24–48 hours.</p>
            </div>
        </div>
    </div>
</section>

@endsection
