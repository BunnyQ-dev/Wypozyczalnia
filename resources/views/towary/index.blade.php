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
        .flash-message {
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<h1>Lista Towarów</h1>

@if (session('success'))
    <div class="flash-message">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach($towary as $towar)
        <li class="towar">
            <strong>{{ $towar->nazwa }}</strong><br>
            <span class="kategoria">Kategoria: {{ $towar->kategoria->nazwa }}</span><br>
            {{ $towar->opis }}<br>
            Cena: {{ $towar->cena }} zł<br>
            <form action="{{ route('towary.destroy', $towar->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Usuń</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
