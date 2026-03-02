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