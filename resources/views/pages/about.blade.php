@extends('layouts.app')
@section('title', 'About — Emmanuel Mwangata')
@section('description', 'Learn about Emmanuel Mwangata — software developer, CS student, and builder of practical digital solutions.')

@section('content')

{{-- Page header --}}
<section class="pt-32 pb-16 border-b border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">About Me</div>
        <h1 class="font-display text-display-lg text-sand-100 mt-2 reveal">
            The developer<br><em class="text-sand-400">behind the work</em>
        </h1>
    </div>
</section>

{{-- Philosophy + intro --}}
<section class="section-pad">
    <div class="container-site grid lg:grid-cols-3 gap-16">
        <div class="lg:col-span-2 space-y-6 text-sand-400 leading-relaxed reveal">
            <p class="text-xl text-sand-200 font-light leading-relaxed">
                I'm Emmanuel M. Mwangata — a software developer and final-year Computer Science student who believes that the best software solves real problems cleanly.
            </p>
            <p>
                My journey into software development began with curiosity: a desire to understand how systems work, and eventually how to build them. That curiosity has since grown into a disciplined practice of crafting web applications, backend systems, and APIs that balance technical rigour with practical utility.
            </p>
            <p>
                I am equally drawn to the security dimension of software — understanding how systems can be compromised, and designing them to resist it. Cybersecurity is not just a specialisation for me; it is a mindset I apply across every project I build.
            </p>
            <p>
                Beyond software, I run Pixel &amp; Galaxy Lab, a consumer technology business in Zambia — an experience that has sharpened my understanding of what clients actually need from technology, and why execution matters as much as architecture.
            </p>
        </div>

        <div class="space-y-6 reveal">
            <div class="service-card">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-3">Philosophy</p>
                <p class="text-sand-300 text-sm leading-relaxed italic font-display text-lg">
                    "Build things that work, that last, and that people actually want to use."
                </p>
            </div>
            <div class="service-card">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-3">Location</p>
                <p class="text-sand-300 text-sm">Zambia, Africa<br>
                <span class="text-sand-600 text-xs">Working with clients globally</span></p>
            </div>
            <div class="service-card">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-3">Status</p>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse-slow"></span>
                    <p class="text-sand-300 text-sm">Available for freelance projects</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Technical interests --}}
<section class="section-pad border-t border-obsidian-border">
    <div class="container-site">
        <div class="section-eyebrow reveal">Technical Interests</div>
        <h2 class="font-display text-display-md text-sand-100 mb-10 reveal">What drives my work</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 reveal-stagger">
            @php
                $interests = [
                    ['title' => 'Full-Stack Development', 'desc' => 'Building cohesive applications from database schema to user interface.'],
                    ['title' => 'Cybersecurity', 'desc' => 'Securing systems through thoughtful design, penetration testing concepts, and secure coding.'],
                    ['title' => 'Backend Architecture', 'desc' => 'Designing scalable server-side systems that handle real-world data and traffic.'],
                    ['title' => 'Open Source', 'desc' => 'Contributing to and learning from the open-source community that makes modern development possible.'],
                ];
            @endphp
            @foreach($interests as $item)
            <div class="service-card">
                <div class="service-card-accent"></div>
                <h3 class="font-display text-lg text-sand-100 mb-2">{{ $item['title'] }}</h3>
                <p class="text-sand-500 text-sm leading-relaxed">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Education & Experience timeline --}}
<section class="section-pad border-t border-obsidian-border">
    <div class="container-site">
        <div class="grid lg:grid-cols-2 gap-16">

            {{-- Education --}}
            <div>
                <div class="section-eyebrow reveal">Education</div>
                <h2 class="font-display text-display-md text-sand-100 mb-10 reveal">Academic background</h2>
                <div class="timeline reveal">
                    <div class="timeline-item">
                        <p class="text-xs font-mono text-sand-600 mb-1">2021 — Present</p>
                        <h3 class="font-display text-xl text-sand-100">BSc Computer Science / ICT</h3>
                        <p class="text-sand-400 text-sm mb-2">The Copperbelt University</p>
                        <p class="text-sand-500 text-sm leading-relaxed">School of ICT, final year. Core areas: software engineering, networking, database systems, information security, and systems analysis.</p>
                    </div>
                    <div class="timeline-item">
                        <p class="text-xs font-mono text-sand-600 mb-1">2018 — 2020</p>
                        <h3 class="font-display text-xl text-sand-100">Secondary Education</h3>
                        <p class="text-sand-400 text-sm mb-2">[Your School Name]</p>
                        <p class="text-sand-500 text-sm">High school studies with a focus on sciences and mathematics.</p>
                    </div>
                </div>
            </div>

            {{-- Professional --}}
            <div>
                <div class="section-eyebrow reveal">Professional</div>
                <h2 class="font-display text-display-md text-sand-100 mb-10 reveal">Experience</h2>
                <div class="timeline reveal">
                    <div class="timeline-item">
                        <p class="text-xs font-mono text-sand-600 mb-1">2022 — Present</p>
                        <h3 class="font-display text-xl text-sand-100">Founder</h3>
                        <p class="text-sand-400 text-sm mb-2">Pixel &amp; Galaxy Lab</p>
                        <p class="text-sand-500 text-sm leading-relaxed">Consumer technology business managing sales, procurement, customer support, and technical advisory services alongside active software development.</p>
                    </div>
                    <div class="timeline-item">
                        <p class="text-xs font-mono text-sand-600 mb-1">2023</p>
                        <h3 class="font-display text-xl text-sand-100">Industrial Attachment</h3>
                        <p class="text-sand-400 text-sm mb-2">[Organisation Name]</p>
                        <p class="text-sand-500 text-sm leading-relaxed">Practical exposure to enterprise systems, software development workflows, and professional IT environments.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Career objectives --}}
<section class="section-pad border-t border-obsidian-border">
    <div class="container-site">
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2">
                <div class="section-eyebrow reveal">Career Direction</div>
                <h2 class="font-display text-display-md text-sand-100 mb-6 reveal">What I'm building towards</h2>
                <div class="text-sand-400 leading-relaxed space-y-4 reveal">
                    <p>My goal is to establish myself as a trusted software partner for businesses that need practical, well-engineered digital solutions — not just code, but solutions that map to real outcomes.</p>
                    <p>In the near term, I'm focused on deepening my expertise in backend architecture, API design, and application security. Longer term, I'm interested in founding a software product that addresses specific challenges in the African technology market.</p>
                </div>
            </div>
            <div class="reveal">
                <p class="text-xs uppercase tracking-widest text-sand-600 mb-4">Professional Values</p>
                <ul class="space-y-3">
                    @foreach(['Quality over quantity', 'Honest communication', 'Continuous learning', 'User-centred thinking', 'Security by design'] as $value)
                    <li class="flex items-center gap-3 text-sand-400 text-sm">
                        <span class="w-1 h-1 rounded-full bg-sand-600 flex-shrink-0"></span>
                        {{ $value }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection
