<!DOCTYPE html>
<html>

<head>
    <title>GitHub Repositories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef2f3, #dfe9f3);
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 30px;
        }

        .header {
            background: #0d6efd;
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
        }

        .repo-card {
            border-radius: 15px;
            transition: 0.3s;
            height: 100%;
        }

        .repo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .repo-title {
            font-weight: bold;
            font-size: 18px;
        }

        .btn-sm {
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">
            <h2>📦 {{ $username }} GitHub Repositories</h2>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- ERROR MESSAGE -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- BACK BUTTON -->
        <a href="/" class="btn btn-secondary mb-3">⬅ Back</a>

        <!-- REPOS LIST -->
        <div class="row">

            @foreach($repos as $repo)
                <div class="col-md-4 mb-4">

                    <div class="card repo-card p-3 shadow-sm">

                        <div class="repo-title">
                            {{ $repo['name'] }}
                        </div>

                        <p class="text-muted">
                            {{ $repo['description'] ?? 'No description available' }}
                        </p>

                        <div class="mb-2">
                            ⭐ {{ $repo['stargazers_count'] }}
                            | 🍴 {{ $repo['forks_count'] }}
                        </div>

                        <!-- ACTION BUTTONS -->
                        <div>

                            <!-- DETAILS -->
                            <a href="/repo/{{ $repo['owner']['login'] }}/{{ $repo['name'] }}" class="btn btn-info btn-sm">
                                Details
                            </a>

                            <!-- FAVORITE -->
                            <form method="POST" action="/favorite" class="d-inline">
                                @csrf

                                <input type="hidden" name="repo_name" value="{{ $repo['name'] }}">
                                <input type="hidden" name="owner" value="{{ $repo['owner']['login'] }}">
                                <input type="hidden" name="url" value="{{ $repo['html_url'] }}">

                                <button type="submit" class="btn btn-warning btn-sm">
                                    ❤️ Favorite
                                </button>
                            </form>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

</body>

</html>