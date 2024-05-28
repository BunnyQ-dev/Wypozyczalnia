<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj towar</title>
</head>
<body>
<h1>Dodaj nowy towar</h1>
<form action="{{ route('towary.store') }}" method="POST">
    @csrf
    @if(auth()->user()->role === 'admin') <!-- Sprawdzenie czy zalogowany użytkownik jest administratorem -->
    <label for="user_id">Użytkownik:</label><br>
    <select id="user_id" name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select><br><br>
    @endif
    <label for="nazwa">Nazwa:</label><br>
    <input type="text" id="nazwa" name="nazwa"><br>

    <label for="opis">Opis:</label><br>
    <textarea id="opis" name="opis"></textarea><br>

    <label for="cena">Cena:</label><br>
    <input type="number" id="cena" name="cena"><br>

    <label for="kategoria_id">Kategoria:</label><br>
    <select id="kategoria_id" name="kategoria_id">
        @foreach($kategorie as $kategoria)
            <option value="{{ $kategoria->id }}">{{ $kategoria->nazwa }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Dodaj towar</button>
</form>
</body>
</html>
