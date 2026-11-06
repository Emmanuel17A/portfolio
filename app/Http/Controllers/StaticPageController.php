<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class StaticPageController extends Controller
{
    public function about()
    {
        $privateReposData = [
            [
                'name'        => 'unibridge',
                'description' => 'Final Year Project — A university student platform connecting students, resources and campus services.',
                'language'    => 'Dart',
                'stars'       => 0,
                'forks'       => 1,
                'url'         => 'https://github.com/Emmanuel17A/unibridge',
                'updated'     => 'Sep 2025',
                'featured'    => true,  // mark as final year project
            ],
            [
                'name'        => 'pixel-downloader',
                'description' => 'Media downloader tool built with Python.',
                'language'    => 'Python',
                'stars'       => 0,
                'forks'       => 0,
                'url'         => 'https://github.com/Emmanuel17A/pixel-downloader',
                'updated'     => 'Recently active',
                'featured'    => false,
            ],
            [
                'name'        => 'Church_Application',
                'description' => 'Church organisation application for the Seventh-day Adventist church, adaptable for other denominations.',
                'language'    => 'PHP',
                'stars'       => 0,
                'forks'       => 0,
                'url'         => 'https://github.com/Emmanuel17A/Church_Application',
                'updated'     => 'Mar 2025',
                'featured'    => false,
            ],
            [
                'name'        => 'Courier-and-parcel-tracking-system-',
                'description' => 'Courier and parcel tracking system. CS 361 web development assignment.',
                'language'    => 'PHP',
                'stars'       => 0,
                'forks'       => 0,
                'url'         => 'https://github.com/Emmanuel17A/Courier-and-parcel-tracking-system-',
                'updated'     => 'Aug 2025',
                'featured'    => false,
            ],
            [
                'name'        => 'COBUSO-APPLICATION',
                'description' => 'CS 301 Project Management system (forked and extended).',
                'language'    => 'JavaScript',
                'stars'       => 0,
                'forks'       => 0,
                'url'         => 'https://github.com/Emmanuel17A/COBUSO-APPLICATION',
                'updated'     => 'Jul 2025',
                'featured'    => false,
            ],
        ];

        $github = cache()->remember('github_Emmanuel17A', 3600, function () use ($privateReposData) {
            try {
                $profileResp = Http::timeout(5)
                    ->withHeaders(['User-Agent' => 'portfolio-site'])
                    ->get('https://api.github.com/users/Emmanuel17A');
                $reposResp = Http::timeout(5)
                    ->withHeaders(['User-Agent' => 'portfolio-site'])
                    ->get('https://api.github.com/users/Emmanuel17A/repos?per_page=100&sort=updated');

                if (! $profileResp->successful() || ! $reposResp->successful()) {
                    throw new \RuntimeException('GitHub API returned non-200 status');
                }

                $profile = $profileResp->json();
                $repos   = $reposResp->json();

                // Top languages
                $langs = collect($repos)->groupBy('language')
                    ->filter(fn($g, $k) => $k)
                    ->map->count()
                    ->sortDesc()
                    ->take(5)
                    ->keys()
                    ->toArray();

                return [
                    'username'           => 'Emmanuel17A',
                    'public_repos'       => $profile['public_repos'] ?? 13,
                    'followers'          => $profile['followers'] ?? 0,
                    'following'          => $profile['following'] ?? 0,
                    'top_langs'          => $langs,
                    'recent_repos'       => collect($repos)->take(6)->map(fn($r) => [
                        'name'        => $r['name'],
                        'description' => $r['description'],
                        'language'    => $r['language'],
                        'stars'       => $r['stargazers_count'],
                        'url'         => $r['html_url'],
                        'updated'     => $r['updated_at'],
                    ])->toArray(),
                    'private_repos_data' => $privateReposData,
                    'private_repos'      => 8,
                    'total_repos'        => 21,
                    'stats_line'         => '13 public · 8 private · 21 repositories total',
                    'api_ok'             => true,
                ];
            } catch (\Exception $e) {
                logger()->warning('GitHub API failed: ' . $e->getMessage());
                return [
                    'api_ok'             => false,
                    'username'           => 'Emmanuel17A',
                    'public_repos'       => 13,
                    'followers'          => 0,
                    'top_langs'          => ['PHP', 'Python', 'Dart', 'JavaScript', 'C#'],
                    'recent_repos'       => [],
                    'private_repos_data' => $privateReposData,
                    'private_repos'      => 8,
                    'total_repos'        => 21,
                    'stats_line'         => '13 public · 8 private · 21 repositories total',
                ];
            }
        });

        // Ensure keys are always present even if an older cached value was stored
        $github['private_repos_data'] = $github['private_repos_data'] ?? $privateReposData;
        $github['private_repos']      = $github['private_repos'] ?? 8;
        $github['total_repos']        = $github['total_repos'] ?? 21;
        $github['stats_line']         = $github['stats_line'] ?? '13 public · 8 private · 21 repositories total';

        return view('pages.about', compact('github'));
    }

    public function services()
    {
        return view('pages.services');
    }

    public function skills()
    {
        return view('pages.skills');
    }

    public function experience()
    {
        return view('pages.experience');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function sitemap()
    {
        $content = view('sitemap');
        return response($content, 200, ['Content-Type' => 'application/xml']);
    }

    public function resume()
    {
        $cvPath = storage_path('app/public/cv/emmanuel-mwangata-cv.pdf');

        if (file_exists($cvPath)) {
            return response()->download($cvPath, 'Emmanuel-Mwangata-CV.pdf');
        }

        // If no CV uploaded, redirect back with note
        return back()
            ->with('error', 'CV is not currently available for download. Please contact me directly.');
    }
}
