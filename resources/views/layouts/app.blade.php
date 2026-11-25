
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Bookmark Manager')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        .sidebar {
            min-height: 100vh;
            background: #172554;
            padding: 28px 20px;
        }

        .brand {
            color: white;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 40px;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #334a85;
            color: white;
        }

        .main-content {
            padding: 35px;
        }

        .content-card,
        .stat-card {
            background: white;
            border: none;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        }

        .btn-primary {
            background: #3659c9;
            border-color: #3659c9;
        }

        .btn-primary:hover {
            background: #2746a8;
            border-color: #2746a8;
        }

        .form-control,
        .form-select {
            padding: 11px 14px;
            border-radius: 10px;
        }

        .logout-btn {
            width: 100%;
            border: 1px solid #64748b;
            background: transparent;
            color: white;
            padding: 10px;
            border-radius: 10px;
        }

        .logout-btn:hover {
            background: #334a85;
        }

        @media (max-width: 767px) {
            .sidebar {
                min-height: auto;
            }

            .main-content {
                padding: 22px 16px;
            }
        }
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }

        * {
            box-sizing: border-box;
        }

        .main-content {
            min-width: 0;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-3 col-lg-2 sidebar">
                <div class="brand">🔖 Bookmark Manager</div>

                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    🏠 Dashboard
                </a>

                <a href="{{ route('bookmarks.index') }}"
                   class="{{ request()->routeIs('bookmarks.*') && !request()->routeIs('bookmarks.favorites') ? 'active' : '' }}">
                    🔗 Bookmarks
                </a>

                <a href="{{ route('bookmarks.favorites') }}"
                   class="{{ request()->routeIs('bookmarks.favorites') ? 'active' : '' }}">
                    ⭐ Favorites
                </a>

                <a href="{{ route('categories.index') }}"
                   class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    📁 Categories
                </a>

                <form action="{{ route('logout') }}" method="POST" class="mt-5">
                    @csrf
                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>
            </aside>

            <main class="col-md-9 col-lg-10 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
