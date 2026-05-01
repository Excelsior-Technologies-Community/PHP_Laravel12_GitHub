<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GitHub Explorer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 20px;
            padding: 40px;
        }
    </style>
</head>
<body>

<div class="card shadow-lg text-center">
    <h2 class="mb-4">🔍 GitHub Explorer</h2>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="/github">
        @csrf

        <input type="text" name="username" class="form-control mb-3" placeholder="Enter GitHub Username" required>

        <select name="sort" class="form-select mb-3">
            <option value="">Sort By</option>
            <option value="stars">Top Stars ⭐</option>
        </select>

        <button class="btn btn-dark w-100">Search</button>
    </form>

    <a href="/favorites" class="btn btn-outline-light mt-3">❤️ View Favorites</a>
</div>

</body>
</html>