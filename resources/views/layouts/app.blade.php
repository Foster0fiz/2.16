<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Passport Tizimi</a>
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link">Chiqish</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
