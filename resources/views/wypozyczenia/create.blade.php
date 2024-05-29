@extends('layouts.app')
@section('title', 'Dodaj nowe wypożyczenie')

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
            <option value="{{ $user->id }}">{{ $user->username }}</option>
        @endforeach
    </select>
    @error('user_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>

    <label for="towar_id">Towar:</label>
    <select id="towar_id" name="towar_id" required>
        @foreach($towary as $towar)
            <option value="{{ $towar->id }}">{{ $towar->nazwa }}</option>
        @endforeach
    </select>
    @error('towar_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>

    <label for="data_wypozyczenia">Data Wypożyczenia:</label>
    <input type="date" id="data_wypozyczenia" name="data_wypozyczenia" required>
    @error('data_wypozyczenia')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>

    <label for="data_zwrotu">Data Zwrotu:</label>
    <input type="date" id="data_zwrotu" name="data_zwrotu">
    @error('data_zwrotu')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>

    <button type="submit" class="btn btn-primary">Wypożycz</button>
</form>
</body>
</html>
@endsection
