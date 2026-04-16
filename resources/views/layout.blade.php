<!doctype html>
<html lang="ru">
<head>
    <title>Новостной сайт</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        html, body { height: 100%; }
        body { display: flex; flex-direction: column; }
        main { flex: 1; }
        .card-img-top { height: 200px; object-fit: cover; }
        .pagination { justify-content: center; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Новостной портал</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary text-white" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @else
                        @if(Auth::user()->isModerator())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.articles.index') }}">Управление</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.comments.pending') }}">
                                    <i class="bi bi-chat-dots"></i> Модерация комментариев
                                </a>    
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Выйти</button>
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

    <footer class="bg-light text-center text-muted py-4 mt-auto border-top">
        <div class="container">
            Мороз Артем Александрович, группа 243-323
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>