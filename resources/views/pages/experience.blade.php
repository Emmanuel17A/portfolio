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

                    {{-- 1. CovianHive Technologies --}}
                    <div class="timeline-item">
                        <div class="flex flex-wrap items-baseline justify-between gap-4 mb-1">
                            <div class="flex items-center gap-3">
                                <h2 class="font-display text-2xl text-sand-100">Software Developer (Part-time / Ongoing)</h2>
                                <span class="badge badge-active">Current</span>
                            </div>
                            <span class="text-xs font-mono text-sand-600 flex-shrink-0">June 2026 – Present</span>
                        </div>
                        <p class="text-sand-400 mb-3">CovianHive Technologies</p>
                        <div class="text-sand-500 text-sm leading-relaxed space-y-2">
                            <p>Contributing to software development projects at CovianHive Technologies, applying full-stack development skills in a professional product environment.</p>
                        </div>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Contributing to active software development projects in a professional product environment',
                                'Applying full-stack development skills across backend and frontend components',
                                'Collaborating within product development workflows to deliver reliable features',
                            ] as $resp)
                            <li class="text-sand-600 text-xs flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-sand-700 flex-shrink-0"></span>
                                {{ $resp }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- 2. DICT — Software Developer Intern → Part-time Developer --}}
                    <div class="timeline-item">
                        <div class="flex flex-wrap items-baseline justify-between gap-4 mb-1">
                            <h2 class="font-display text-2xl text-sand-100">Software Developer Intern &rarr; Part-time Developer</h2>
                            <span class="text-xs font-mono text-sand-600 flex-shrink-0">October 26, 2025 – June 2026</span>
                        </div>
                        <p class="text-sand-400 mb-3">Directorate of Information and Communication Technology (DICT)</p>
                        <div class="text-sand-500 text-sm leading-relaxed space-y-2">
                            <p>Joined DICT as a software developer intern from October 2025 to March 2026, then continued part-time through June 2026. Worked on internal government software systems, contributed to development workflows, and gained deep exposure to enterprise-grade ICT infrastructure.</p>
                        </div>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Developed and maintained internal government software systems',
                                'Contributed to professional software development workflows across internship and part-time phases',
                                'Gained hands-on exposure to enterprise-grade ICT infrastructure and operations',
                            ] as $resp)
                            <li class="text-sand-600 text-xs flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-sand-700 flex-shrink-0"></span>
                                {{ $resp }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- 3. DICT — End User / IT Support --}}
                    <div class="timeline-item">
                        <div class="flex flex-wrap items-baseline justify-between gap-4 mb-1">
                            <h2 class="font-display text-2xl text-sand-100">End User / IT Support</h2>
                            <span class="text-xs font-mono text-sand-600 flex-shrink-0">September 2025 – October 2025 (1 month)</span>
                        </div>
                        <p class="text-sand-400 mb-3">Directorate of Information and Communication Technology (DICT)</p>
                        <div class="text-sand-500 text-sm leading-relaxed space-y-2">
                            <p>Served as an end user at DICT, gaining firsthand understanding of ICT systems and workflows from an operational perspective before transitioning to the developer role.</p>
                        </div>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Operated internal ICT systems from an end-user and support perspective',
                                'Built firsthand understanding of organizational workflows and user needs',
                                'Established operational context prior to transitioning into software development at DICT',
                            ] as $resp)
                            <li class="text-sand-600 text-xs flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-sand-700 flex-shrink-0"></span>
                                {{ $resp }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- 4. Pixel & Galaxy Lab — Founder & Lead Developer --}}
                    <div class="timeline-item">
                        <div class="flex flex-wrap items-baseline justify-between gap-4 mb-1">
                            <h2 class="font-display text-2xl text-sand-100">Founder &amp; Lead Developer</h2>
                            <span class="text-xs font-mono text-sand-600 flex-shrink-0">2022 – Present</span>
                        </div>
                        <p class="text-sand-400 mb-3">Pixel &amp; Galaxy Lab</p>
                        <div class="text-sand-500 text-sm leading-relaxed space-y-2">
                            <p>Founded and operate a consumer technology business alongside active software development. Responsible for all aspects including procurement, sales, customer support, and technical advisory services. Built internal tooling and customer-facing systems using Laravel and PHP.</p>
                        </div>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Manage procurement, sales, customer support, and daily business operations',
                                'Provide technical advisory services to customers and clients',
                                'Built internal business tooling using Laravel and PHP',
                                'Developed customer-facing systems to streamline operations',
                            ] as $resp)
                            <li class="text-sand-600 text-xs flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-sand-700 flex-shrink-0"></span>
                                {{ $resp }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- 5. Freelance Software Developer --}}
                    <div class="timeline-item">
                        <div class="flex flex-wrap items-baseline justify-between gap-4 mb-1">
                            <h2 class="font-display text-2xl text-sand-100">Freelance Software Developer</h2>
                            <span class="text-xs font-mono text-sand-600 flex-shrink-0">2021 – Present</span>
                        </div>
                        <p class="text-sand-400 mb-3">Independent</p>
                        <div class="text-sand-500 text-sm leading-relaxed space-y-2">
                            <p>Developed web applications, management systems, and custom software for individual clients and small businesses across multiple sectors in Zambia.</p>
                        </div>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Designed and developed custom web applications for individual clients and small businesses',
                                'Built tailored management systems across multiple sectors in Zambia',
                                'Delivered end-to-end custom software solutions from requirements to deployment',
                            ] as $resp)
                            <li class="text-sand-600 text-xs flex items-center gap-2">
                                <span class="w-1 h-1 rounded-full bg-sand-700 flex-shrink-0"></span>
                                {{ $resp }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

            {{-- Education & Certifications sidebar --}}
            <div>
                <div class="section-eyebrow reveal">Education</div>
                <div class="timeline mt-6 reveal">
                    <div class="timeline-item">
                        <p class="text-xs font-mono text-sand-600 mb-1">2021 – Present</p>
                        <h3 class="font-display text-xl text-sand-100">BSc Computer Science / ICT</h3>
                        <p class="text-sand-500 text-sm mb-2">The Copperbelt University</p>
                        <p class="text-sand-600 text-xs leading-relaxed">School of ICT (final year). Software engineering, networking, security, database systems.</p>
                    </div>
                </div>

                <div class="mt-10">
                    <div class="section-eyebrow">Certifications</div>
                    <div class="grid sm:grid-cols-2 gap-4 mt-6">
                        <div class="service-card">
                            <div class="service-card-accent"></div>
                            <h4 class="font-display text-lg text-sand-100 mb-1">CCNA 1: Introduction to Networks</h4>
                            <p class="text-sand-500 text-xs">Cisco Networking Academy</p>
                            <p class="font-mono text-sand-700 text-xs mt-1">2024</p>
                        </div>
                        <div class="service-card">
                            <div class="service-card-accent"></div>
                            <h4 class="font-display text-lg text-sand-100 mb-1">CCNA 2: Switching, Routing &amp; Wireless Essentials</h4>
                            <p class="text-sand-500 text-xs">Cisco Networking Academy</p>
                            <p class="font-mono text-sand-700 text-xs mt-1">2024</p>
                        </div>
                        <div class="service-card">
                            <div class="service-card-accent"></div>
                            <h4 class="font-display text-lg text-sand-100 mb-1">Introduction to Cybersecurity</h4>
                            <p class="text-sand-500 text-xs">Cisco Networking Academy</p>
                            <p class="font-mono text-sand-700 text-xs mt-1">2024</p>
                        </div>
                        <div class="service-card">
                            <div class="service-card-accent"></div>
                            <h4 class="font-display text-lg text-sand-100 mb-1">Web Developer Certificate</h4>
                            <p class="text-sand-500 text-xs">Codeva Technologies</p>
                            <p class="font-mono text-sand-700 text-xs mt-1">2023</p>
                        </div>
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
