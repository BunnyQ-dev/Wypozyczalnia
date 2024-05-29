@extends('layouts.app')
@section('title', 'Wypożyczenia')

@section('content')
<head>
    <title>Lista wypożyczeń</title>
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
            <br>
            <!-- Przycisk do edycji -->
            <a href="{{ route('wypozyczenia.edit', $wypozyczenie->id) }}">Edytuj</a>
        </li>
    @endforeach
</ul>

<!-- Przycisk do dodawania nowego wypożyczenia -->
<a href="{{ route('wypozyczenia.create') }}" class="btn btn-primary">Dodaj nowe wypożyczenie</a>

@endsection
