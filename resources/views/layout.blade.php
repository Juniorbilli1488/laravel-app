<!doctype html>
<html lang="ru">
  <head>
    <title>Новостной сайт</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .pagination {
            justify-content: center;
        }
        .table-actions {
            white-space: nowrap;
        }
        .btn-action {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            margin: 0 2px;
        }
        .navbar-nav .nav-link {
            padding: 0.5rem 1rem;
        }
        .dropdown-menu {
            min-width: 150px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Новостной портал</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Левое меню -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="bi bi-house"></i> Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><i class="bi bi-info-circle"></i> О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact"><i class="bi bi-envelope"></i> Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index') }}"><i class="bi bi-newspaper"></i> Новости</a>
                    </li>
                </ul>

                <!-- Правое меню (зависит от авторизации) -->
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Вход
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i> Регистрация
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/articles">
                                <i class="bi bi-gear"></i> Управление
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Выйти
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <main class="flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-4 mt-auto border-top">
        <div class="container">
            Мороз Артем Александрович, группа 243-323
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>