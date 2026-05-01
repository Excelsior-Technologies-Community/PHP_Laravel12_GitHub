<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\GitHub\Facades\GitHub;
use App\Models\FavoriteRepo;

class GitHubController extends Controller
{
    // Search Page
    public function index()
    {
        return view('github.search');
    }

    // Fetch repos
    public function userRepos(Request $request)
    {
        $username = $request->username;

        try {
            $repos = GitHub::connection('main')
                ->user()
                ->repositories($username);

            // SORT FEATURE
            if ($request->sort == 'stars') {
                usort($repos, fn($a, $b) => $b['stargazers_count'] <=> $a['stargazers_count']);
            }

            return view('github.repos', compact('repos', 'username'));

        } catch (\Exception $e) {
            return back()->with('error', 'User not found!');
        }
    }

    // Repo Details
    public function repoDetails($owner, $repo)
    {
        $repoData = GitHub::repo()->show($owner, $repo);

        return view('github.details', compact('repoData'));
    }

    // Save Favorite
    public function saveFavorite(Request $request)
    {
        FavoriteRepo::create([
            'repo_name' => $request->repo_name,
            'owner' => $request->owner,
            'url' => $request->url,
        ]);

        return back()->with('success', 'Saved to favorites ❤️');
    }

    // Show Favorites
    public function favorites()
    {
        $favorites = FavoriteRepo::latest()->get();

        return view('github.favorites', compact('favorites'));
    }
}