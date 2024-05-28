<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Towarów</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .towar {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .towar strong {
            font-size: 1.2em;
        }
        .towar .kategoria {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Lista Towarów</h1>
    <ul>
        @foreach($towary as $towar)
            <li class="towar">
                <strong>{{ $towar->nazwa }}</strong><br>
                <span class="kategoria">Kategoria: {{ $towar->kategoria->nazwa }}</span><br>
                {{ $towar->opis }}<br>
                Cena: {{ $towar->cena }} zł
            </li>
        @endforeach
    </ul>
</body>
</html>
