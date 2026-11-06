<footer class="border-t border-obsidian-border mt-auto" role="contentinfo">
    <div class="container-site py-14">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-10">
            {{-- Brand --}}
            <div class="md:col-span-2">
                <a href="{{ route('home') }}" class="font-display text-2xl text-sand-200 hover:text-sand-100 transition-colors">
                    Emmanuel<span class="text-sand-500">.</span>
                </a>
                <p class="mt-3 text-sand-600 text-sm leading-relaxed max-w-xs">
                    Software developer building practical, modern solutions. Available for freelance engagements.
                </p>
                <div class="mt-5 flex items-center gap-4">
                    <a href="https://github.com/YOUR_GITHUB" target="_blank" rel="noopener" class="text-sand-700 hover:text-sand-400 transition-colors" aria-label="GitHub profile">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.58 2 12.21c0 4.5 2.87 8.32 6.84 9.67.5.09.68-.22.68-.49 0-.24-.01-.88-.01-1.72-2.78.62-3.37-1.37-3.37-1.37-.45-1.17-1.11-1.48-1.11-1.48-.91-.63.07-.62.07-.62 1 .07 1.53 1.05 1.53 1.05.89 1.56 2.34 1.11 2.91.85.09-.66.35-1.11.63-1.37-2.22-.26-4.56-1.13-4.56-5.03 0-1.11.39-2.02 1.03-2.73-.1-.26-.45-1.3.1-2.7 0 0 .84-.27 2.75 1.05a9.4 9.4 0 012.5-.34c.85 0 1.71.11 2.5.34 1.91-1.32 2.75-1.05 2.75-1.05.55 1.4.2 2.44.1 2.7.64.71 1.03 1.62 1.03 2.73 0 3.91-2.34 4.77-4.57 5.02.36.32.68.94.68 1.9 0 1.37-.01 2.47-.01 2.81 0 .27.18.59.69.49A10.21 10.21 0 0022 12.21C22 6.58 17.52 2 12 2z"/></svg>
                    </a>
                    <a href="https://linkedin.com/in/YOUR_LINKEDIN" target="_blank" rel="noopener" class="text-sand-700 hover:text-sand-400 transition-colors" aria-label="LinkedIn profile">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.59 0 4.26 2.37 4.26 5.44v6.3zM5.34 7.43a2.07 2.07 0 110-4.14 2.07 2.07 0 010 4.14zM3.56 20.45h3.56V9H3.56v11.45zM22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46C23.21 24 24 23.23 24 22.28V1.72C24 .77 23.21 0 22.23 0z"/></svg>
                    </a>
                    <a href="mailto:futurist@example.com" class="text-sand-700 hover:text-sand-400 transition-colors" aria-label="Email">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
                    </a>
                </div>
            </div>

            {{-- Navigation --}}
            <div>
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-4">Navigation</p>
                <ul class="space-y-2.5">
                    @foreach([
                        ['route' => 'home',            'label' => 'Home'],
                        ['route' => 'about',           'label' => 'About'],
                        ['route' => 'projects.index',  'label' => 'Work'],
                        ['route' => 'services',        'label' => 'Services'],
                        ['route' => 'skills',          'label' => 'Skills'],
                        ['route' => 'experience',      'label' => 'Experience'],
                        ['route' => 'contact',         'label' => 'Contact'],
                    ] as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" class="footer-link hover:text-sand-300">
                            {{ $item['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-4">Get in Touch</p>
                <div class="space-y-2.5 text-sm text-sand-600">
                    <p>futurist@example.com</p>
                    <p>Zambia, Africa</p>
                    <p class="text-sand-700 text-xs font-mono">Available for projects</p>
                </div>
                <a href="{{ route('contact') }}" class="btn-outline mt-5 inline-flex text-xs py-2.5">
                    Start a project
                </a>
            </div>
        </div>

        <div class="divider"></div>

        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-sand-700">
                &copy; {{ date('Y') }} Emmanuel M. Mwangata. All rights reserved.
            </p>
            <div class="flex items-center gap-5">
                <a href="{{ route('privacy') }}" class="footer-link text-xs hover:text-sand-400">Privacy Policy</a>
                <a href="{{ route('resume') }}"  class="footer-link text-xs hover:text-sand-400">Résumé</a>
            </div>
        </div>
    </div>
</footer>
