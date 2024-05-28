@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożycz Sprzęt</title>
</head>
<body>
<h1>Wypożycz Sprzęt</h1>
<form action="{{ route('wypozyczenia.store') }}" method="POST">
    @csrf
    <label for="user_id">Użytkownik:</label>
    <select id="user_id" name="user_id" required>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select><br>

    <label for="towar_id">Towar:</label>
    <select id="towar_id" name="towar_id" required>
        @foreach($towary as $towar)
            <option value="{{ $towar->id }}">{{ $towar->nazwa }}</option>
        @endforeach
    </select><br>

    <label for="data_wypozyczenia">Data Wypożyczenia:</label>
    <input type="date" id="data_wypozyczenia" name="data_wypozyczenia" required><br>

    <label for="data_zwrotu">Data Zwrotu:</label>
    <input type="date" id="data_zwrotu" name="data_zwrotu"><br>

    <button type="submit">Wypożycz</button>
</form>
</body>
</html>
@endsection
