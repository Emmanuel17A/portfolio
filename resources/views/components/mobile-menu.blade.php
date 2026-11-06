<div
    id="mobile-menu"
    x-data="mobileMenu()"
    :class="{ 'open': open }"
    class="mobile-menu md:hidden"
    :aria-hidden="(!open).toString()"
    role="dialog"
    aria-label="Mobile navigation">

    <nav class="space-y-0">
        <a href="{{ route('home') }}"          @click="close()" class="mobile-nav-link">Home</a>
        <a href="{{ route('about') }}"         @click="close()" class="mobile-nav-link">About</a>
        <a href="{{ route('projects.index') }}" @click="close()" class="mobile-nav-link">Work</a>
        <a href="{{ route('services') }}"      @click="close()" class="mobile-nav-link">Services</a>
        <a href="{{ route('skills') }}"        @click="close()" class="mobile-nav-link">Skills</a>
        <a href="{{ route('experience') }}"    @click="close()" class="mobile-nav-link">Experience</a>
        <a href="{{ route('contact') }}"       @click="close()" class="mobile-nav-link">Contact</a>
    </nav>

    <div class="mt-10 flex items-center gap-4">
        <a href="https://github.com/Emmanuel17A" target="_blank" rel="noopener" class="text-sand-600 hover:text-sand-300 transition-colors" aria-label="GitHub">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.58 2 12.21c0 4.5 2.87 8.32 6.84 9.67.5.09.68-.22.68-.49 0-.24-.01-.88-.01-1.72-2.78.62-3.37-1.37-3.37-1.37-.45-1.17-1.11-1.48-1.11-1.48-.91-.63.07-.62.07-.62 1 .07 1.53 1.05 1.53 1.05.89 1.56 2.34 1.11 2.91.85.09-.66.35-1.11.63-1.37-2.22-.26-4.56-1.13-4.56-5.03 0-1.11.39-2.02 1.03-2.73-.1-.26-.45-1.3.1-2.7 0 0 .84-.27 2.75 1.05a9.4 9.4 0 012.5-.34c.85 0 1.71.11 2.5.34 1.91-1.32 2.75-1.05 2.75-1.05.55 1.4.2 2.44.1 2.7.64.71 1.03 1.62 1.03 2.73 0 3.91-2.34 4.77-4.57 5.02.36.32.68.94.68 1.9 0 1.37-.01 2.47-.01 2.81 0 .27.18.59.69.49A10.21 10.21 0 0022 12.21C22 6.58 17.52 2 12 2z"/></svg>
        </a>
        <a href="https://www.linkedin.com/in/emmanuel-mwaba-mwangata-5690181a5" target="_blank" rel="noopener" class="text-sand-600 hover:text-sand-300 transition-colors" aria-label="LinkedIn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.41v1.56h.05c.47-.9 1.63-1.85 3.36-1.85 3.59 0 4.26 2.37 4.26 5.44v6.3zM5.34 7.43a2.07 2.07 0 110-4.14 2.07 2.07 0 010 4.14zM3.56 20.45h3.56V9H3.56v11.45zM22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46C23.21 24 24 23.23 24 22.28V1.72C24 .77 23.21 0 22.23 0z"/></svg>
        </a>
        <a href="mailto:emmanuelmwangata26@gmail.com" class="text-sand-600 hover:text-sand-300 transition-colors" aria-label="Email">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 7 10-7"/></svg>
        </a>
        <a href="https://wa.me/260767429351" target="_blank" rel="noopener" class="text-sand-600 hover:text-sand-300 transition-colors" aria-label="WhatsApp">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20.52 3.48A11.86 11.86 0 0012.06 0C5.5 0 .16 5.34.16 11.9a11.8 11.8 0 001.58 5.94L0 24l6.33-1.66a11.9 11.9 0 005.73 1.46h.01c6.56 0 11.9-5.34 11.9-11.9a11.85 11.85 0 00-3.45-8.42zM12.07 21.8h-.01a9.87 9.87 0 01-5.03-1.38l-.36-.21-3.76.98 1-3.66-.24-.38a9.86 9.86 0 01-1.51-5.25c0-5.45 4.44-9.89 9.9-9.89a9.83 9.83 0 017 2.9 9.83 9.83 0 012.9 7c0 5.45-4.44 9.89-9.89 9.89zm5.42-7.41c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.26-.46-2.4-1.48-.89-.79-1.48-1.77-1.66-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.21 3.07.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.41.25-.7.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35z"/></svg>
        </a>
    </div>
</div>
