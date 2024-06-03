<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        nav {
            background-color: #666;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
        }
        nav a:hover{
            text-decoration: none;
            color: #9ca3af;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Nazwa Twojej Aplikacji</h1>
    </div>
</header>

<nav>
    <div class="container">
        <a href="{{ route('home') }}">Strona główna</a>
        <a href="{{ route('towar.index') }}">Towary</a>
        <a href="{{ route('wypozyczenia.index') }}">Wypożyczenia</a>
        <a href="{{ route('uzytkownicy.index') }}">Użytkownicy</a>
        <a href="{{ route('kategorie.index') }}">Kategorie</a> <!-- Dodany link -->
    </div>
</nav>

<main class="container mt-4">
    @yield('content')
</main>

<footer>
    <div class="container">
        &copy; {{ date('Y') }} Twoja Nazwa Aplikacji
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
