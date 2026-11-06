@extends('layouts.app')

@section('title', 'Emmanuel Mwangata — Software Developer')
@section('description', 'Full-stack software developer building practical, modern web applications. Based in Zambia. Available for freelance projects.')

@section('content')

{{-- ============================================================
     HERO
     ============================================================ --}}
<section class="hero-section" aria-label="Introduction">
    <div class="hero-mesh" aria-hidden="true"></div>

    {{-- Horizontal rule accents --}}
    <span class="hero-line" style="top: 30%" aria-hidden="true"></span>
    <span class="hero-line" style="top: 70%" aria-hidden="true"></span>

    <div class="container-site w-full">
        <div class="grid lg:grid-cols-5 gap-8 items-start">

            {{-- Left column --}}
            <div class="lg:col-span-3">

                {{-- Eyebrow --}}
                <div class="section-eyebrow hero-meta">
                    <span class="font-mono text-xs text-sand-500">Software Developer</span>
                    <span class="inline-flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse-slow"></span>
                        <span class="text-xs text-sand-600">Available for work</span>
                    </span>
                </div>

                {{-- Hero title --}}
                <h1 class="hero-title font-display text-display-xl text-sand-100 mb-6 leading-none" aria-label="I build software that works. I design systems that last.">
                    <span class="word">
                        <span class="word-inner">I&nbsp;build</span>
                    </span>
                    <span class="word">
                        <span class="word-inner italic text-sand-400">&nbsp;software</span>
                    </span>
                    <br>
                    <span class="word">
                        <span class="word-inner">that&nbsp;</span>
                    </span>
                    <span class="word">
                        <span class="word-inner text-sand-400">works.</span>
                    </span>
                </h1>

                {{-- Subtitle --}}
                <p class="hero-sub text-sand-400 text-lg leading-relaxed mb-10 max-w-lg">
                    Emmanuel Mwangata — full-stack developer, system architect, and cybersecurity enthusiast building practical digital solutions from Zambia.
                </p>

                {{-- CTAs --}}
                <div class="hero-cta flex flex-wrap gap-4">
                    <a href="{{ route('projects.index') }}" class="btn-primary btn-magnetic">
                        View My Work
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                            <path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                    <a href="{{ route('contact') }}" class="btn-outline btn-magnetic">
                        Let's Work Together
                    </a>
                </div>

                {{-- Stats --}}
                <div class="hero-meta mt-14 flex flex-wrap gap-10">
                    <div>
                        <p class="stat-number">
                            <span data-counter data-target="4" data-suffix="+">4+</span>
                        </p>
                        <p class="text-xs text-sand-600 uppercase tracking-wider mt-1">Years Building</p>
                    </div>
                    <div>
                        <p class="stat-number">
                            <span data-counter data-target="20" data-suffix="+">20+</span>
                        </p>
                        <p class="text-xs text-sand-600 uppercase tracking-wider mt-1">Projects Shipped</p>
                    </div>
                    <div>
                        <p class="stat-number">
                            <span data-counter data-target="8" data-suffix="+">8+</span>
                        </p>
                        <p class="text-xs text-sand-600 uppercase tracking-wider mt-1">Technologies</p>
                    </div>
                </div>
            </div>

            {{-- Right column — code terminal --}}
            <div class="lg:col-span-2 hero-meta hidden lg:block">
                <div class="code-terminal">
                    <div class="terminal-bar" aria-hidden="true">
                        <span class="terminal-dot" style="background:#E05D5D"></span>
                        <span class="terminal-dot" style="background:#E0A050"></span>
                        <span class="terminal-dot" style="background:#5EC98E"></span>
                        <span class="ml-3 text-sand-600 text-xs">developer.php</span>
                    </div>
                    <div class="terminal-content" aria-label="Code illustration">
<div class="code-line"><span class="code-comment">// Emmanuel M. Mwangata</span></div>
<div class="code-line"><span class="code-keyword">class</span> <span class="code-fn">Developer</span> {</div>
<div class="code-line">    <span class="code-keyword">private</span> <span class="code-var">$name</span> = <span class="code-string">'Futurist'</span>;</div>
<div class="code-line">    <span class="code-keyword">private</span> <span class="code-var">$stack</span> = [</div>
<div class="code-line">        <span class="code-string">'Laravel'</span>, <span class="code-string">'React'</span>,</div>
<div class="code-line">        <span class="code-string">'MySQL'</span>, <span class="code-string">'Linux'</span>,</div>
<div class="code-line">    ];</div>
<div class="code-line"></div>
<div class="code-line">    <span class="code-keyword">public function</span> <span class="code-fn">build</span>(): <span class="code-var">Solution</span></div>
<div class="code-line">    {</div>
<div class="code-line">        <span class="code-keyword">return new</span> <span class="code-fn">Solution</span>(</div>
<div class="code-line">            clean: <span class="code-string">true</span>,</div>
<div class="code-line">            scalable: <span class="code-string">true</span>,</div>
<div class="code-line">            delivered: <span class="code-string">true</span>,</div>
<div class="code-line">        );</div>
<div class="code-line">    }</div>
<div class="code-line">}</div>
                    </div>
                </div>
                <p class="text-xs text-sand-700 font-mono mt-3 text-center">// Building from Zambia for the world</p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     TECHNOLOGY TICKER
     ============================================================ --}}
<div class="border-y border-obsidian-border overflow-hidden py-4" aria-label="Technologies">
    <div class="ticker-track" aria-hidden="true">
        @php
            $techs = ['Laravel', 'PHP', 'React', 'JavaScript', 'MySQL', 'Linux', 'Docker', 'Tailwind CSS', 'Node.js', 'Git', 'REST APIs', 'Cybersecurity', 'Python', 'PostgreSQL'];
            $repeated = array_merge($techs, $techs);
        @endphp
        @foreach($repeated as $tech)
            <div class="ticker-item">{{ $tech }}</div>
        @endforeach
    </div>
</div>

{{-- ============================================================
     SELECTED PROJECTS
     ============================================================ --}}
<section class="section-pad" aria-labelledby="projects-heading">
    <div class="container-site">
        <div class="flex items-end justify-between mb-12">
            <div>
                <div class="section-eyebrow reveal">Selected Work</div>
                <h2 id="projects-heading" class="font-display text-display-md text-sand-100 reveal">
                    Projects that<br><em class="text-sand-400">speak for themselves</em>
                </h2>
            </div>
            <a href="{{ route('projects.index') }}" class="btn-outline hidden md:inline-flex reveal">
                All projects
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>

        @if($projects->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 reveal-stagger">
            @foreach($projects as $project)
            <article class="project-card-wrap" data-category="{{ $project->category }}">
                <div class="project-card">
                    <div class="project-card-img">
                        @if($project->image_path)
                            <img src="{{ Storage::url($project->image_path) }}"
                                 alt="{{ $project->name }} screenshot"
                                 loading="lazy" width="800" height="450">
                        @else
                            {{-- Placeholder illustration --}}
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="font-display text-5xl text-sand-800 select-none">{{ substr($project->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="project-card-overlay">
                            <a href="{{ route('projects.show', $project->slug) }}" class="btn-primary text-xs py-2 px-4">
                                View Details
                            </a>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-3 mb-2">
                            <h3 class="font-display text-xl text-sand-100 leading-tight">
                                <a href="{{ route('projects.show', $project->slug) }}" class="hover:text-sand-300 transition-colors">
                                    {{ $project->name }}
                                </a>
                            </h3>
                            <span class="badge {{ $project->status === 'live' ? 'badge-active' : 'badge-dev' }} flex-shrink-0 mt-1">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                        <p class="text-sand-500 text-sm leading-relaxed mb-4">{{ Str::limit($project->description, 100) }}</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach(array_slice($project->technologies ?? [], 0, 4) as $tech)
                            <span class="skill-tag text-xs py-1 px-2">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-sand-600">
            <p class="font-display text-2xl text-sand-700 mb-2">Projects coming soon</p>
            <p class="text-sm">Add projects through the admin panel.</p>
        </div>
        @endif

        <div class="mt-8 text-center md:hidden">
            <a href="{{ route('projects.index') }}" class="btn-outline">View all work</a>
        </div>
    </div>
</section>

{{-- ============================================================
     ABOUT INTRO
     ============================================================ --}}
<section class="section-pad border-t border-obsidian-border" aria-labelledby="about-intro-heading">
    <div class="container-site">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="section-eyebrow reveal">Who I Am</div>
                <h2 id="about-intro-heading" class="font-display text-display-md text-sand-100 mb-6 reveal">
                    Developer, builder,<br><em class="text-sand-400">problem solver.</em>
                </h2>
                <div class="space-y-4 text-sand-400 leading-relaxed reveal">
                    <p>
                        I'm Emmanuel Mwangata, a final-year Computer Science student at The Copperbelt University and a practising software developer. I build full-stack web applications, backend systems, and APIs — with a keen interest in cybersecurity.
                    </p>
                    <p>
                        Through my consumer technology business, Pixel &amp; Galaxy Lab, I bridge the gap between technical capability and practical business value.
                    </p>
                </div>
                <div class="mt-8 flex gap-4 reveal">
                    <a href="{{ route('about') }}" class="btn-primary">Read More</a>
                    <a href="{{ route('resume') }}" class="btn-outline">Download CV</a>
                </div>
            </div>

            {{-- Skills preview --}}
            <div class="reveal-stagger">
                @php
                    $skillGroups = [
                        'Backend'  => ['Laravel', 'PHP', 'Node.js', 'Python', 'REST APIs'],
                        'Frontend' => ['React', 'Tailwind CSS', 'Alpine.js', 'JavaScript'],
                        'Systems'  => ['MySQL', 'Linux', 'Docker', 'Git', 'Cybersecurity'],
                    ];
                @endphp
                @foreach($skillGroups as $group => $items)
                <div class="mb-6">
                    <p class="text-xs uppercase tracking-widest text-sand-600 mb-3">{{ $group }}</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($items as $skill)
                        <span class="skill-tag">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================================
     SERVICES PREVIEW
     ============================================================ --}}
<section class="section-pad border-t border-obsidian-border" aria-labelledby="services-heading">
    <div class="container-site">
        <div class="section-eyebrow reveal">What I Do</div>
        <h2 id="services-heading" class="font-display text-display-md text-sand-100 mb-12 reveal">
            Services that<br><em class="text-sand-400">move businesses forward</em>
        </h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 reveal-stagger">
            @php
                $services = [
                    ['icon' => '⬡', 'title' => 'Web Application Development', 'desc' => 'Custom, scalable web applications built with modern frameworks. From concept to deployment.'],
                    ['icon' => '⬡', 'title' => 'Backend & API Development', 'desc' => 'Robust server-side systems, RESTful APIs, and database architecture for complex requirements.'],
                    ['icon' => '⬡', 'title' => 'Business Process Automation', 'desc' => 'Eliminate repetitive work with intelligent automation systems tailored to your workflow.'],
                    ['icon' => '⬡', 'title' => 'Database Design', 'desc' => 'Efficient, well-structured databases that scale with your data and query requirements.'],
                    ['icon' => '⬡', 'title' => 'System Maintenance', 'desc' => 'Ongoing technical support, performance optimisation, and system health monitoring.'],
                    ['icon' => '⬡', 'title' => 'Software Consultation', 'desc' => 'Technical guidance to help you make the right architectural and technology decisions.'],
                ];
            @endphp

            @foreach($services as $service)
            <div class="service-card">
                <div class="service-card-accent" aria-hidden="true"></div>
                <div class="font-mono text-sand-600 text-xs mb-4">{{ sprintf('%02d', $loop->iteration) }}</div>
                <h3 class="font-display text-xl text-sand-100 mb-2">{{ $service['title'] }}</h3>
                <p class="text-sand-500 text-sm leading-relaxed">{{ $service['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="mt-10 reveal">
            <a href="{{ route('services') }}" class="btn-outline">Explore All Services</a>
        </div>
    </div>
</section>

{{-- ============================================================
     CTA BAND
     ============================================================ --}}
<section class="py-20 border-t border-obsidian-border" aria-labelledby="cta-heading">
    <div class="container-site text-center">
        <div class="reveal">
            <p class="text-xs font-mono text-sand-600 uppercase tracking-widest mb-4">Ready to build something?</p>
            <h2 id="cta-heading" class="font-display text-display-lg text-sand-100 mb-6">
                Let's create your<br><em class="text-sand-400">next great project</em>
            </h2>
            <p class="text-sand-500 mb-10 max-w-md mx-auto">
                Whether you have a detailed brief or just an idea, I'd love to hear about it and explore what we can build together.
            </p>
            <a href="{{ route('contact') }}" class="btn-primary btn-magnetic inline-flex">
                Start a Conversation
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
