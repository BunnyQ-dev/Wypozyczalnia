@extends('layouts.app')
@section('title', 'Wypożyczenia')

@section('content')
    <head>
        <title>Lista wypożyczeń</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                height: 100vh;
            }
            .linki {
                border: 1px solid #ccc;
                padding: 10px;
                margin-bottom: 10px;
            }
            .linki strong {
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

    <div class="linki">
        <strong><a href="{{ route('admin.wypozyczenia.reserved') }}">Zarezerwowane Wypożyczenia</a></strong><br>
        <strong><a href="{{ route('admin.wypozyczenia.in_progress') }}">Wypożyczenia w Trakcie</a></strong><br>
        <strong><a href="{{ route('admin.wypozyczenia.returned') }}">Zwrócone Wypożyczenia</a></strong><br>
        <strong><a href="{{ route('admin.wypozyczenia.overdue') }}">Przekroczone Wypożyczenia</a></strong><br>
    </div>

    <a href="{{ route('admin.wypozyczenia.create') }}" class="btn btn-primary">Dodaj nowe wypożyczenie</a>

@endsection
