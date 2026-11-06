<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class StaticPageController extends Controller
{
    public function about()
    {
        $github = cache()->remember('github_Emmanuel17A', 3600, function () {
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
                    'username'    => 'Emmanuel17A',
                    'public_repos'=> $profile['public_repos'] ?? 0,
                    'followers'   => $profile['followers'] ?? 0,
                    'following'   => $profile['following'] ?? 0,
                    'top_langs'   => $langs,
                    'recent_repos'=> collect($repos)->take(6)->map(fn($r) => [
                        'name'        => $r['name'],
                        'description' => $r['description'],
                        'language'    => $r['language'],
                        'stars'       => $r['stargazers_count'],
                        'url'         => $r['html_url'],
                        'updated'     => $r['updated_at'],
                    ])->toArray(),
                    'api_ok'      => true,
                ];
            } catch (\Exception $e) {
                logger()->warning('GitHub API failed: ' . $e->getMessage());
                return ['api_ok' => false, 'username' => 'Emmanuel17A', 'public_repos' => 0,
                        'followers' => 0, 'top_langs' => [], 'recent_repos' => []];
            }
        });
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
