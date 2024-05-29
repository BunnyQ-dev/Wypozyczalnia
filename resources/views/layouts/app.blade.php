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
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav {
            background-color: #666;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav a{
            text-decoration: none;
            color: #fff ;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        a, a:hover{
            text-decoration: none;
            color: #bbb6b6;
        }
    </style>
</head>
<body>
<header>
    <h1>Wypożyczalnia</h1>
</header>

<nav>
    <a href="#">Strona główna</a> |
    <a href="../towar">Towary</a> |
    <a href="../wypozyczenia">Wypożyczenia</a> |
    <a href="#">Użytkownicy</a>
</nav>

<main>
    @yield('content')
</main>

<footer>
    &copy; {{ date('Y') }} Test
</footer>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
