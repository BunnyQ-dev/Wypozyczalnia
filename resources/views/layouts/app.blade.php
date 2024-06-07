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
        nav a:hover {
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
        #admin a{
            font-size: xx-large;
            color: #ffffff;
            text-decoration: none;
        }
        #admin a:hover{
            color: #cccaca;
        }
    </style>
</head>
<body>
<header>
    <div class="container" id="admin">
        <a href="{{ route('admin.home') }}">Admin Rentify</a>
    </div>
</header>

<nav>
    <div class="container">
        <a href="{{ route('home') }}">Strona główna</a>
        <a href="{{ route('admin.towar.index') }}">Towary</a>
        <a href="{{ route('admin.wypozyczenia.index') }}">Wypożyczenia</a>
        <a href="{{ route('admin.uzytkownicy.index') }}">Użytkownicy</a>
        <a href="{{ route('admin.kategorie.index') }}">Kategorie</a>
    </div>
</nav>

<main class="container mt-4">
    @yield('content')
</main>

<footer>
    <div class="container">
        &copy; {{ date('Y') }} Rentify, Wszelkie Prawa Zastreżone
    </div>
</footer>

</body>
</html>
