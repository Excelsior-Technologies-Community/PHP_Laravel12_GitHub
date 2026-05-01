<!DOCTYPE html>
<html>

<head>
    <title>Favorite Repositories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #eef2f3, #dfe9f3);
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 30px;
            max-width: 900px;
        }

        .header {
            background: linear-gradient(135deg, #ff4b2b, #ff416c);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .fav-card {
            border: none;
            border-radius: 15px;
            transition: 0.3s;
            background: white;
        }

        .fav-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .repo-name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .owner {
            font-size: 14px;
            color: #777;
        }

        .btn-view {
            background: #0d6efd;
            color: white;
            border-radius: 8px;
        }

        .btn-view:hover {
            background: #084298;
            color: white;
        }

        .empty-box {
            text-align: center;
            padding: 50px;
            background: white;
            border-radius: 12px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">
            <h2>❤️ Favorite Repositories</h2>
            <p class="mb-0">Your saved GitHub repositories</p>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- BACK BUTTON -->
        <a href="/" class="btn btn-dark mb-3">⬅ Back</a>

        <!-- EMPTY STATE -->
        @if($favorites->isEmpty())
            <div class="empty-box">
                <h4>No Favorites Yet 😢</h4>
                <p>Save repositories from GitHub search</p>
            </div>
        @else

            <!-- FAVORITES LIST -->
            @foreach($favorites as $fav)
                <div class="card fav-card p-3 mb-3 shadow-sm">

                    <div class="repo-name">
                        ⭐ {{ $fav->repo_name }}
                    </div>

                    <div class="owner mb-2">
                        👤 {{ $fav->owner }}
                    </div>

                    <a href="{{ $fav->url }}" target="_blank" class="btn btn-view btn-sm">
                        🔗 View Repository
                    </a>

                </div>
            @endforeach

        @endif

    </div>

</body>

</html>