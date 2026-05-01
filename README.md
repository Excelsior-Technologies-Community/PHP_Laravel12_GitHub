# PHP_Laravel12_GitHub

## Introduction

PHP_Laravel12_GitHub is a Laravel 12 based web application that demonstrates how to integrate the GitHub REST API into a modern Laravel application using the GrahamCampbell Laravel-GitHub package.

The project provides a practical implementation of API authentication using Personal Access Tokens and showcases how to retrieve and display dynamic GitHub repository data within a Laravel MVC architecture.

This project is designed for academic and professional learning purposes to understand third-party API integration, secure environment configuration, and structured Laravel development.

---

## Project Overview

This project demonstrates a complete and professional implementation of GitHub API integration in Laravel 12.

The application performs the following:

- Creates a Laravel 12 application using Composer
- Installs and configures the GrahamCampbell Laravel-GitHub package
- Implements secure API authentication using GitHub Personal Access Tokens
- Uses Laravel’s MVC architecture to fetch and display GitHub repositories
- Implements structured routing and controller logic
- Displays repository information using a responsive Bootstrap 5 UI
- Handles API errors using try-catch blocks
- Follows professional project structure standards
- Demonstrates real-world third-party API consumption in Laravel

This project reflects modern Laravel development practices and clean code organization.

---

## Requirements

Before you begin, make sure you have the following installed:

- PHP ≥ 8.1
- Composer
- Git
- VS Code / any editor
- Optional: Node.js + NPM for frontend tooling

---

##  Step 1: Create Laravel 12 Project

Open your terminal and run:

```bash
composer create-project laravel/laravel PHP_Laravel12_GitHub "12.*"
cd PHP_Laravel12_GitHub
```

---

##  Step 2: Install Laravel-GitHub Package

Install the GitHub API package:

```bash
composer require graham-campbell/github:^13.0
```

This package provides an easy bridge to GitHub API from Laravel.

---

## Step 3: Publish Package Config

```bash
php artisan vendor:publish --provider="GrahamCampbell\GitHub\GitHubServiceProvider"
```

This will generate:

config/github.php

---

## Step 4: Configure .env

Add GitHub connection credentials:

```.env
GITHUB_TOKEN=your_github_personal_access_token
```

Replace your_github_personal_access_token with a token created in your GitHub Developer settings.

---

## Step 5: Configure config/github.php

Open the file and confirm the connection:

```bash
'default' => 'main',

'connections' => [
    'main' => [
        'token' => env('GITHUB_TOKEN'),
    ],
],
```

This tells Laravel the default GitHub connection uses your token.

---

## Step 6: Create Controller

Create a controller to interact with GitHub:

```bash
php artisan make:controller GitHubController
```

Open app/Http/Controllers/GitHubController.php and add:

```php
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
```
---

## Step 7: Define Routes

Edit routes/web.php:

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitHubController;

Route::get('/github/{username}', [GitHubController::class, 'userRepos']);

Route::get('/', function () {
    return view('welcome');
});
```

---

## Step 8: Create View

Create view file at:

resources/views/github/repos.blade.php

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GitHub Repositories</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: 'Inter', sans-serif;
        }

        .hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            padding: 40px 20px;
            border-radius: 12px;
            margin-bottom: 40px;
        }

        .repo-card {
            border: none;
            border-radius: 16px;
            transition: 0.3s ease;
        }

        .repo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .repo-title {
            font-weight: 600;
            font-size: 18px;
        }

        .repo-stats {
            font-size: 14px;
            color: #6c757d;
        }

        .badge-lang {
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 50px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <!-- Hero Section -->
    <div class="hero text-center">
        <h1 class="fw-bold">GitHub Repository Explorer</h1>
        <p class="mb-0">Explore public repositories dynamically using GitHub API</p>
    </div>

    @if(count($repos) > 0)
        <div class="row">
            @foreach($repos as $repo)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card repo-card shadow-sm p-3 h-100">
                        <div class="card-body d-flex flex-column">

                            <div class="mb-2">
                                <span class="repo-title">
                                    {{ $repo['name'] }}
                                </span>
                            </div>

                            <p class="text-muted flex-grow-1">
                                {{ $repo['description'] ?? 'No description available' }}
                            </p>

                            @if($repo['language'])
                                <div class="mb-2">
                                    <span class="badge bg-dark badge-lang">
                                        {{ $repo['language'] }}
                                    </span>
                                </div>
                            @endif

                            <div class="repo-stats mb-3">
                                ⭐ {{ $repo['stargazers_count'] }}
                                &nbsp;&nbsp;
                                🍴 {{ $repo['forks_count'] }}
                                &nbsp;&nbsp;
                                👁 {{ $repo['watchers_count'] }}
                            </div>

                            <a href="{{ $repo['html_url'] }}"
                               target="_blank"
                               class="btn btn-outline-primary btn-sm mt-auto">
                                View on GitHub →
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center">
            No repositories found.
        </div>
    @endif

</div>

</body>
</html>
```

---

## Step 9: Run the Project

Start Laravel server:

```bash
php artisan serve
```

Visit:

```bash
http://localhost:8000/github/<github_username>
```

Replace <github_username> with any GitHub account to see repos.

---

## Output

<img width="1894" height="1032" alt="Screenshot 2026-03-02 142212" src="https://github.com/user-attachments/assets/402f4d06-bc21-4b76-aab8-5cafe80ee056" />

---

## Project  Structure

```
PHP_Laravel12_GitHub
├── app/
│   └── Http/
│       └── Controllers/
│           └── GitHubController.php
├── bootstrap/
├── config/
│   └── github.php
├── database/
├── public/
├── resources/
│   └── views/
│       └── github/
│           └── repos.blade.php
├── routes/
│   └── web.php
├── vendor/
├── .env
├── composer.json
└── README.md
```

---

Your PHP_Laravel12_GitHub Project is now ready!
<<<<<<< HEAD
=======

>>>>>>> development
