<header class="navbar py-5" role="banner">
    <div class="container-site flex items-center justify-between gap-8">

        {{-- Logo / wordmark --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 group" aria-label="Emmanuel Mwangata — Home">
            <span class="font-display text-2xl text-sand-200 leading-none group-hover:text-sand-100 transition-colors">
                EM<span class="text-sand-500">.</span>
            </span>
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden md:flex items-center gap-8" aria-label="Primary navigation">
            <a href="{{ route('home') }}"          class="nav-link">Home</a>
            <a href="{{ route('about') }}"         class="nav-link">About</a>
            <a href="{{ route('projects.index') }}" class="nav-link">Work</a>
            <a href="{{ route('services') }}"      class="nav-link">Services</a>
            <a href="{{ route('skills') }}"        class="nav-link">Skills</a>
            <a href="{{ route('experience') }}"    class="nav-link">Experience</a>
        </nav>

        {{-- CTA + mobile toggle --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('contact') }}" class="btn-primary btn-magnetic hidden md:inline-flex">
                Let's Talk
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                    <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            {{-- Mobile hamburger --}}
            <button
                x-data="mobileMenu()"
                @click="toggle()"
                class="md:hidden p-2 text-sand-400 hover:text-sand-100 transition-colors"
                :aria-expanded="open.toString()"
                aria-controls="mobile-menu"
                aria-label="Toggle navigation">
                <svg x-show="!open" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M3 6h16M3 11h16M3 16h16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                <svg x-show="open" x-cloak width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path d="M5 5l12 12M17 5L5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

    </div>
</header>
