@extends('layouts.app')
@section('title', 'Skills & Technologies — Emmanuel Mwangata')
@section('description', 'Technical skills and technologies — from Laravel and PHP to React, MySQL, Linux, and cybersecurity.')

@section('content')

{{-- Header --}}
<section class="pt-32 pb-16 border-b border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">Technical Profile</div>
        <h1 class="font-display text-display-lg text-sand-100 mt-2 reveal">
            Skills &amp;<br><em class="text-sand-400">Technologies</em>
        </h1>
        <p class="mt-6 text-sand-500 max-w-lg reveal">
            A working technical inventory — the languages, frameworks, tools, and practices I use to build production software.
        </p>
    </div>
</section>

{{-- Skills --}}
<section class="section-pad">
    <div class="container-site">
        @php
            $skillCategories = [
                [
                    'name' => 'Programming Languages',
                    'skills' => [
                        ['name' => 'PHP', 'notes' => 'Primary backend language. OOP, design patterns, Laravel ecosystem.'],
                        ['name' => 'JavaScript', 'notes' => 'Frontend & Node.js. ES2020+, async/await, DOM manipulation.'],
                        ['name' => 'Python', 'notes' => 'Scripting, automation, data processing.'],
                        ['name' => 'SQL', 'notes' => 'Complex queries, stored procedures, optimisation.'],
                        ['name' => 'Bash', 'notes' => 'Shell scripting, automation, system administration.'],
                        ['name' => 'HTML / CSS', 'notes' => 'Semantic HTML5, modern CSS, accessibility standards.'],
                    ],
                ],
                [
                    'name' => 'Frameworks & Libraries',
                    'skills' => [
                        ['name' => 'Laravel', 'notes' => 'Primary framework. MVC, Eloquent ORM, Blade, Queues, Events, Mail.'],
                        ['name' => 'React', 'notes' => 'Component architecture, hooks, state management, JSX.'],
                        ['name' => 'Tailwind CSS', 'notes' => 'Utility-first styling, responsive design systems.'],
                        ['name' => 'Alpine.js', 'notes' => 'Lightweight interactivity without heavy framework overhead.'],
                        ['name' => 'Node.js', 'notes' => 'Server-side JavaScript, Express, REST API development.'],
                        ['name' => 'GSAP', 'notes' => 'Animation library for performant web animations.'],
                    ],
                ],
                [
                    'name' => 'Databases',
                    'skills' => [
                        ['name' => 'MySQL', 'notes' => 'Primary RDBMS. Schema design, indexing, query optimisation.'],
                        ['name' => 'PostgreSQL', 'notes' => 'Advanced SQL features, JSON support, full-text search.'],
                        ['name' => 'SQLite', 'notes' => 'Lightweight storage for applications and testing.'],
                        ['name' => 'Redis', 'notes' => 'Caching, session storage, queue backing.'],
                    ],
                ],
                [
                    'name' => 'Development Tools',
                    'skills' => [
                        ['name' => 'Git', 'notes' => 'Version control, branching strategies, collaborative workflows.'],
                        ['name' => 'Docker', 'notes' => 'Containerisation, development environments, deployment.'],
                        ['name' => 'Vite', 'notes' => 'Fast frontend build tooling, HMR, asset bundling.'],
                        ['name' => 'Composer', 'notes' => 'PHP dependency management and autoloading.'],
                        ['name' => 'npm / yarn', 'notes' => 'JavaScript package management and build scripts.'],
                        ['name' => 'Postman', 'notes' => 'API testing, documentation, automated test suites.'],
                    ],
                ],
                [
                    'name' => 'Networking & Systems',
                    'skills' => [
                        ['name' => 'Linux', 'notes' => 'Server administration, CLI tools, permissions, cron, networking.'],
                        ['name' => 'HTTP / HTTPS', 'notes' => 'Protocol fundamentals, headers, caching, TLS.'],
                        ['name' => 'REST API Design', 'notes' => 'Resource design, versioning, authentication, documentation.'],
                        ['name' => 'Nginx / Apache', 'notes' => 'Web server configuration, virtual hosts, proxying.'],
                    ],
                ],
                [
                    'name' => 'Security',
                    'skills' => [
                        ['name' => 'Web App Security', 'notes' => 'OWASP Top 10, injection prevention, XSS, CSRF.'],
                        ['name' => 'Authentication Systems', 'notes' => 'OAuth2, JWT, session management, 2FA.'],
                        ['name' => 'Secure Coding', 'notes' => 'Input validation, output encoding, principle of least privilege.'],
                        ['name' => 'Network Security', 'notes' => 'Firewalls, SSL/TLS, secure configurations.'],
                    ],
                ],
            ];
        @endphp

        <div class="space-y-14">
            @foreach($skillCategories as $category)
            <div class="reveal">
                <h2 class="font-display text-2xl text-sand-100 mb-6 pb-4 border-b border-obsidian-border">
                    {{ $category['name'] }}
                </h2>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($category['skills'] as $skill)
                    <div class="service-card group cursor-default" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <div class="service-card-accent"></div>
                        <div class="flex items-start justify-between gap-2">
                            <h3 class="font-mono text-sm text-sand-200 font-medium">{{ $skill['name'] }}</h3>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="flex-shrink-0 mt-0.5 text-sand-700 group-hover:text-sand-500 transition-colors">
                                <path d="M6 1v10M1 6h10" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div x-show="open" x-collapse class="mt-2">
                            <p class="text-sand-600 text-xs leading-relaxed">{{ $skill['notes'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Certifications / Learning --}}
<section class="section-pad border-t border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">Currently Learning</div>
        <h2 class="font-display text-display-md text-sand-100 mb-8 reveal">
            Always growing
        </h2>
        <div class="grid sm:grid-cols-3 gap-5 reveal-stagger">
            @foreach([
                ['topic' => 'Advanced Security & Penetration Testing', 'detail' => 'CEH concepts, vulnerability assessment methodologies.'],
                ['topic' => 'Cloud Infrastructure', 'detail' => 'AWS / GCP fundamentals, serverless architecture patterns.'],
                ['topic' => 'Software Architecture', 'detail' => 'Domain-driven design, CQRS, event sourcing patterns.'],
            ] as $item)
            <div class="service-card">
                <div class="service-card-accent"></div>
                <h3 class="font-display text-xl text-sand-100 mb-2">{{ $item['topic'] }}</h3>
                <p class="text-sand-500 text-sm">{{ $item['detail'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
