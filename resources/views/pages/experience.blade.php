@extends('layouts.app')
@section('title', 'Experience — Emmanuel Mwangata')
@section('description', 'Professional experience, projects, and technical growth as a software developer.')

@section('content')

<section class="pt-32 pb-16 border-b border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">Career</div>
        <h1 class="font-display text-display-lg text-sand-100 mt-2 reveal">
            Professional<br><em class="text-sand-400">experience</em>
        </h1>
    </div>
</section>

<section class="section-pad">
    <div class="container-site">
        <div class="grid lg:grid-cols-3 gap-16">
            <div class="lg:col-span-2">
                <div class="section-eyebrow reveal">Work History</div>
                <div class="timeline mt-6 reveal">

                    <div class="timeline-item">
                        <div class="flex items-baseline justify-between gap-4 mb-1">
                            <h2 class="font-display text-2xl text-sand-100">Founder &amp; Lead Developer</h2>
                            <span class="text-xs font-mono text-sand-600 flex-shrink-0">2022 — Present</span>
                        </div>
                        <p class="text-sand-400 mb-3">Pixel &amp; Galaxy Lab</p>
                        <div class="text-sand-500 text-sm leading-relaxed space-y-2">
                            <p>Founded and operate a consumer technology business alongside active software development. Responsible for all aspects of the business including procurement, sales, customer support, and technical advisory.</p>
                            <p>Applied software development skills to build internal tools, automate inventory management, and create customer-facing systems that improved operational efficiency.</p>
                        </div>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Business operations management and strategic planning',
                                'Customer technical support and consultation',
                                'Internal tooling development with Laravel and PHP',
                                'Inventory and order management system development',
                                'Technical advisory to small business clients',
                            ] as $resp)
                            <li class="text-sand-600 text-xs flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-sand-700 flex-shrink-0"></span>
                                {{ $resp }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="timeline-item">
                        <div class="flex items-baseline justify-between gap-4 mb-1">
                            <h2 class="font-display text-2xl text-sand-100">Industrial Attachment</h2>
                            <span class="text-xs font-mono text-sand-600 flex-shrink-0">2023</span>
                        </div>
                        <p class="text-sand-400 mb-3">[Organisation — update this placeholder]</p>
                        <div class="text-sand-500 text-sm leading-relaxed space-y-2">
                            <p>Completed a structured industrial attachment as part of the BSc programme, gaining practical exposure to professional software development environments, workflows, and enterprise systems.</p>
                        </div>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Participated in professional software development workflows',
                                'Worked with enterprise-grade systems and databases',
                                'Collaborated with experienced development teams',
                                'Applied academic knowledge in a production environment',
                            ] as $resp)
                            <li class="text-sand-600 text-xs flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-sand-700 flex-shrink-0"></span>
                                {{ $resp }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="timeline-item">
                        <div class="flex items-baseline justify-between gap-4 mb-1">
                            <h2 class="font-display text-2xl text-sand-100">Freelance Developer</h2>
                            <span class="text-xs font-mono text-sand-600 flex-shrink-0">2021 — Present</span>
                        </div>
                        <p class="text-sand-400 mb-3">Independent</p>
                        <div class="text-sand-500 text-sm leading-relaxed">
                            <p>Developed web applications, management systems, and custom software solutions for individual clients and small businesses across multiple sectors.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Education sidebar --}}
            <div>
                <div class="section-eyebrow reveal">Education</div>
                <div class="timeline mt-6 reveal">
                    <div class="timeline-item">
                        <p class="text-xs font-mono text-sand-600 mb-1">2021 — Present</p>
                        <h3 class="font-display text-xl text-sand-100">BSc Computer Science / ICT</h3>
                        <p class="text-sand-500 text-sm mb-2">The Copperbelt University</p>
                        <p class="text-sand-600 text-xs leading-relaxed">School of ICT. Final year. Software engineering, networking, security, database systems.</p>
                    </div>
                    <div class="timeline-item">
                        <p class="text-xs font-mono text-sand-600 mb-1">2018 — 2020</p>
                        <h3 class="font-display text-xl text-sand-100">Secondary Education</h3>
                        <p class="text-sand-500 text-sm">[Your School Name]</p>
                    </div>
                </div>

                <div class="mt-10">
                    <div class="section-eyebrow">Certifications</div>
                    <div class="mt-6 space-y-4">
                        <div class="service-card">
                            <div class="service-card-accent"></div>
                            <h4 class="font-display text-lg text-sand-100 mb-1">[Certification Name]</h4>
                            <p class="text-sand-600 text-xs">[Issuer] · [Year]</p>
                        </div>
                        <div class="service-card">
                            <div class="service-card-accent"></div>
                            <h4 class="font-display text-lg text-sand-100 mb-1">[Certification Name]</h4>
                            <p class="text-sand-600 text-xs">[Issuer] · [Year]</p>
                        </div>
                        <p class="text-sand-700 text-xs font-mono mt-3">// Update certifications via admin panel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 border-t border-obsidian-border">
    <div class="container-site flex flex-col sm:flex-row items-center justify-between gap-6 reveal">
        <div>
            <h2 class="font-display text-2xl text-sand-100 mb-1">Want the full picture?</h2>
            <p class="text-sand-500 text-sm">Download my CV for a complete overview of experience and education.</p>
        </div>
        <a href="{{ route('resume') }}" class="btn-primary flex-shrink-0">
            Download CV
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M7 2v8M3 8l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
    </div>
</section>

@endsection
