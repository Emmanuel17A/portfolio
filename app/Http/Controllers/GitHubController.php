<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GitHubController extends Controller
{
    public function fetchProfile(): array
    {
        return Cache::remember('github_profile', 3600, function () {
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

                $langs = collect($repos)->groupBy('language')
                    ->filter(fn ($g, $k) => $k)
                    ->map->count()
                    ->sortDesc()
                    ->take(3)
                    ->keys()
                    ->toArray();

                return [
                    'username'     => 'Emmanuel17A',
                    'public_repos' => $profile['public_repos'] ?? 0,
                    'followers'    => $profile['followers'] ?? 0,
                    'following'    => $profile['following'] ?? 0,
                    'top_langs'    => $langs,
                    'recent_repos' => collect($repos)->take(6)->map(fn ($r) => [
                        'name'        => $r['name'] ?? '',
                        'description' => $r['description'] ?? null,
                        'language'    => $r['language'] ?? null,
                        'stars'       => $r['stargazers_count'] ?? 0,
                        'url'         => $r['html_url'] ?? 'https://github.com/Emmanuel17A',
                        'updated'     => $r['updated_at'] ?? null,
                    ])->toArray(),
                    'api_ok'       => true,
                ];
            } catch (\Exception $e) {
                logger()->warning('GitHub API failed: ' . $e->getMessage());

                return [
                    'api_ok'       => false,
                    'username'     => 'Emmanuel17A',
                    'public_repos' => 0,
                    'followers'    => 0,
                    'following'    => 0,
                    'top_langs'    => [],
                    'recent_repos' => [],
                ];
            }
        });
    }
}

