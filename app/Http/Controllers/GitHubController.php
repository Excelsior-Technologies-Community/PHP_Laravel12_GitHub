<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GrahamCampbell\GitHub\Facades\GitHub;

class GitHubController extends Controller
{
    public function userRepos($username)
    {
        try {
            $repos = GitHub::connection('main')
                ->user()
                ->repositories($username);

            return view('github.repos', compact('repos'));

        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}