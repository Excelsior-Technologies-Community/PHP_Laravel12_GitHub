<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;

Route::get('/github/{username}', [GitHubController::class, 'userRepos']);

Route::get('/', function () {
    return view('welcome');
});

