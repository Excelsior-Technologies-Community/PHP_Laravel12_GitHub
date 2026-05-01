<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;

Route::get('/', [GitHubController::class, 'index']);
Route::post('/github', [GitHubController::class, 'userRepos']);
Route::get('/repo/{owner}/{repo}', [GitHubController::class, 'repoDetails']);


Route::post('/favorite', [GitHubController::class, 'saveFavorite']);
Route::get('/favorites', [GitHubController::class, 'favorites']);