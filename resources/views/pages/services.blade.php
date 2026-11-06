@extends('layouts.app')
@section('title', 'Services — Emmanuel Mwangata')
@section('description', 'Software development services including web applications, APIs, database design, and technical consultation.')

@section('content')

{{-- Header --}}
<section class="pt-32 pb-16 border-b border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">What I Offer</div>
        <h1 class="font-display text-display-lg text-sand-100 mt-2 reveal">
            Services designed<br><em class="text-sand-400">for real outcomes</em>
        </h1>
        <p class="mt-6 text-sand-500 max-w-xl reveal">
            I work with businesses and individuals who need reliable software solutions. Every engagement starts with understanding your problem before writing a single line of code.
        </p>
    </div>
</section>

{{-- Services list --}}
<section class="section-pad">
    <div class="container-site">
        @php
            $services = [
                [
                    'num' => '01',
                    'title' => 'Custom Software Development',
                    'summary' => 'Bespoke applications designed around your specific business requirements.',
                    'details' => 'Generic software solutions often require companies to change how they work. I build the opposite — software shaped around your existing processes, designed to solve the specific problems you face. The result is a system your team will actually adopt.',
                    'deliverables' => ['Requirements analysis', 'System architecture design', 'Full-stack development', 'Testing and QA', 'Deployment and documentation'],
                    'technologies' => ['Laravel', 'PHP', 'React', 'MySQL', 'Linux'],
                ],
                [
                    'num' => '02',
                    'title' => 'Web Application Development',
                    'summary' => 'Modern, responsive web applications built to scale.',
                    'details' => 'From single-page applications to complex multi-tenant systems, I develop web applications that work reliably across devices, perform well under load, and are maintainable over time. User experience is built into the architecture, not bolted on at the end.',
                    'deliverables' => ['UI/UX implementation', 'Frontend development', 'Backend integration', 'Database design', 'Performance optimisation'],
                    'technologies' => ['Laravel', 'Tailwind CSS', 'Alpine.js', 'Vite', 'JavaScript'],
                ],
                [
                    'num' => '03',
                    'title' => 'Backend Development & API Integration',
                    'summary' => 'Robust server-side systems and RESTful APIs that power your applications.',
                    'details' => 'The backend is where reliability is determined. I build server-side systems and APIs that handle real data loads, integrate with third-party services cleanly, and provide the foundation your frontend applications need to function correctly.',
                    'deliverables' => ['RESTful API design', 'Third-party integrations', 'Authentication systems', 'Background job processing', 'API documentation'],
                    'technologies' => ['Laravel', 'PHP', 'Node.js', 'MySQL', 'PostgreSQL', 'REST'],
                ],
                [
                    'num' => '04',
                    'title' => 'Database Design & Management',
                    'summary' => 'Efficient database schemas that scale with your data requirements.',
                    'details' => 'Poor database design is one of the most common causes of application performance problems and data inconsistencies. I design relational database schemas that accurately model your business domain, perform efficiently at scale, and are maintainable as requirements evolve.',
                    'deliverables' => ['Schema design and normalisation', 'Migration strategies', 'Query optimisation', 'Indexing strategies', 'Backup and recovery planning'],
                    'technologies' => ['MySQL', 'PostgreSQL', 'SQLite', 'Redis', 'Laravel Eloquent'],
                ],
                [
                    'num' => '05',
                    'title' => 'Business Process Automation',
                    'summary' => 'Eliminate manual, repetitive work through targeted automation.',
                    'details' => 'Repetitive manual processes are costly, error-prone, and demoralising for the people who perform them. I identify automation opportunities and build solutions that handle routine tasks reliably — freeing your team to focus on work that actually requires human judgement.',
                    'deliverables' => ['Process analysis and mapping', 'Automation development', 'Workflow integration', 'Reporting and monitoring', 'Training and handover'],
                    'technologies' => ['Laravel Queue', 'Scheduled Tasks', 'Email Automation', 'Webhook Integration'],
                ],
                [
                    'num' => '06',
                    'title' => 'Software Consultation',
                    'summary' => 'Technical guidance for teams navigating architecture and technology decisions.',
                    'details' => 'Sometimes you need a technical perspective that is not tied to selling you a specific solution. I offer honest consultation on architecture decisions, technology selection, codebase assessment, and system design — drawing on practical experience with real production systems.',
                    'deliverables' => ['Technical assessment', 'Architecture review', 'Technology recommendations', 'Implementation roadmap', 'Documentation'],
                    'technologies' => ['System Design', 'Code Review', 'Security Audit', 'Performance Analysis'],
                ],
            ];
        @endphp

        <div class="space-y-0">
            @foreach($services as $service)
            <div class="py-12 border-b border-obsidian-border reveal"
                 x-data="{ open: false }">
                <div class="grid lg:grid-cols-3 gap-8 items-start">
                    <div class="lg:col-span-2">
                        <div class="flex items-baseline gap-4 mb-4">
                            <span class="font-mono text-xs text-sand-700">{{ $service['num'] }}</span>
                            <h2 class="font-display text-2xl text-sand-100">{{ $service['title'] }}</h2>
                        </div>
                        <p class="text-sand-400 text-lg mb-4">{{ $service['summary'] }}</p>
                        <div x-show="open" x-collapse class="text-sand-500 leading-relaxed mb-5">
                            {{ $service['details'] }}
                        </div>
                        <button @click="open = !open"
                                class="text-xs font-mono text-sand-600 hover:text-sand-400 transition-colors inline-flex items-center gap-2"
                                :aria-expanded="open.toString()">
                            <span x-text="open ? '— Show less' : '+ Learn more'">+ Learn more</span>
                        </button>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-sand-600 mb-2">Deliverables</p>
                            <ul class="space-y-1.5">
                                @foreach($service['deliverables'] as $d)
                                <li class="text-sand-500 text-sm flex items-center gap-2">
                                    <span class="w-1 h-1 rounded-full bg-sand-600 flex-shrink-0"></span>
                                    {{ $d }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-widest text-sand-600 mb-2">Technologies</p>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($service['technologies'] as $tech)
                                <span class="skill-tag text-xs py-1 px-2">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 border-t border-obsidian-border">
    <div class="container-site grid lg:grid-cols-2 gap-10 items-center">
        <div class="reveal">
            <h2 class="font-display text-display-md text-sand-100 mb-4">Not sure which service fits?</h2>
            <p class="text-sand-500 leading-relaxed">Send me a brief description of what you're trying to accomplish. I'll review it and suggest the best approach — with no obligation on your part.</p>
        </div>
        <div class="reveal">
            <a href="{{ route('contact') }}" class="btn-primary btn-magnetic inline-flex">
                Discuss Your Project
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M2 7h10M8 3l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
