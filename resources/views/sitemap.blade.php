<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $static = [
            ['url' => route('home'),            'priority' => '1.0', 'freq' => 'monthly'],
            ['url' => route('about'),           'priority' => '0.8', 'freq' => 'monthly'],
            ['url' => route('projects.index'),  'priority' => '0.9', 'freq' => 'weekly'],
            ['url' => route('services'),        'priority' => '0.8', 'freq' => 'monthly'],
            ['url' => route('skills'),          'priority' => '0.7', 'freq' => 'monthly'],
            ['url' => route('experience'),      'priority' => '0.7', 'freq' => 'monthly'],
            ['url' => route('contact'),         'priority' => '0.8', 'freq' => 'monthly'],
        ];
        $projects = \App\Models\Project::all();
    @endphp

    @foreach($static as $page)
    <url>
        <loc>{{ $page['url'] }}</loc>
        <changefreq>{{ $page['freq'] }}</changefreq>
        <priority>{{ $page['priority'] }}</priority>
    </url>
    @endforeach

    @foreach($projects as $project)
    <url>
        <loc>{{ route('projects.show', $project->slug) }}</loc>
        <lastmod>{{ $project->updated_at->toAtomString() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach
</urlset>
