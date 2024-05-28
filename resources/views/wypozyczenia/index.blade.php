<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Wypożyczeń</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .wypozyczenie {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .wypozyczenie strong {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
<h1>Lista Wypożyczeń</h1>

@if (session('success'))
    <div class="flash-message">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach($wypozyczenia as $wypozyczenie)
        <li class="wypozyczenie">
            <strong>{{ $wypozyczenie->towar->nazwa }}</strong><br>
            Użytkownik: {{ $wypozyczenie->user->name }}<br>
            Data Wypożyczenia: {{ $wypozyczenie->data_wypozyczenia }}<br>
            Data Zwrotu: {{ $wypozyczenie->data_zwrotu ?? 'Brak' }}
        </li>
    @endforeach
</ul>
</body>
</html>
