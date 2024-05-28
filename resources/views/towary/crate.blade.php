<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Nowy Towar</title>
</head>
<body>
<h1>Dodaj Nowy Towar</h1>
<form action="{{ route('towary.store') }}" method="POST">
    @csrf
    <label for="nazwa">Nazwa:</label>
    <input type="text" id="nazwa" name="nazwa" required><br>

    <label for="opis">Opis:</label>
    <textarea id="opis" name="opis"></textarea><br>

    <label for="cena">Cena:</label>
    <input type="text" id="cena" name="cena" required><br>

    <label for="kategoria_id">Kategoria:</label>
    <select id="kategoria_id" name="kategoria_id" required>
        @foreach($kategorie as $kategoria)
            <option value="{{ $kategoria->id }}">{{ $kategoria->nazwa }}</option>
        @endforeach
    </select><br>

    <button type="submit">Dodaj Towar</button>
</form>
</body>
</html>
