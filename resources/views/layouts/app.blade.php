<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LaporBanjir BPBD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('form') }}">LaporBanjir</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('form') }}">Form Pelaporan</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('laporan.index') }}">Daftar Laporan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profil Petugas</a></li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link text-white text-decoration-none">Logout ({{ Auth::user()->name }})</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container min-vh-100">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <small>&copy; 2026 BPBD Kabupaten Bandung</small>
    </footer>
</body>
</html>
