@extends('layouts.app')
@section('title', 'Dodaj nowe wypożyczenie')

@section('content')
    <style>
        /* style.css */

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
    <!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożycz Sprzęt</title>
</head>
<body>
<h1>Wypożycz Sprzęt</h1>
<form action="{{ route('admin.wypozyczenia.store') }}" method="POST">
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
