<!DOCTYPE html>
<html>

<head>
    <title>Repo Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef2f3;
        }

        .card {
            border-radius: 20px;
        }
    </style>
</head>

<body class="p-5">

    <div class="container">

        <a href="/" class="btn btn-secondary mb-3">⬅ Back</a>

        <div class="card shadow p-4">

            <h2>{{ $repoData['name'] }}</h2>

            <p class="text-muted">
                {{ $repoData['description'] ?? 'No description available' }}
            </p>

            <hr>

            <p>⭐ Stars: {{ $repoData['stargazers_count'] }}</p>
            <p>🍴 Forks: {{ $repoData['forks_count'] }}</p>
            <p>👁 Watchers: {{ $repoData['watchers_count'] }}</p>

            <a href="{{ $repoData['html_url'] }}" target="_blank" class="btn btn-dark mt-3">View on GitHub</a>

        </div>

    </div>

</body>

</html>