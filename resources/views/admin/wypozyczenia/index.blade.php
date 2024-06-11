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
                <strong><a href="{{ route('admin.wypozyczenia.edit', $wypozyczenie->id) }}">{{ $wypozyczenie->towar->nazwa }} </a></strong><br>
                Użytkownik: {{ $wypozyczenie->user->username }}<br>
                Data Wypożyczenia: {{ $wypozyczenie->data_wypozyczenia }}<br>
                Data Zwrotu: {{ $wypozyczenie->data_zwrotu ?? 'Brak' }}<br>
                Status: {{ $wypozyczenie->status }}
                <br>
                <!-- Przycisk do zmiany statusu wypożyczenia -->
                @if ($wypozyczenie->status === 'zarezerwowane')
                    <form action="{{ route('admin.wypozyczenia.changeStatus', $wypozyczenie->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="in_progress"> <!-- Dodaj pole status -->
                        <button type="submit" class="btn btn-primary">Rozpocznij wypożyczenie</button>
                    </form>
                @elseif ($wypozyczenie->status === 'w_trakcie')
                    <p>Wypożyczenie w trakcie</p>
                @endif
            </li>
        @endforeach
    </ul>

    <!-- Przycisk do dodawania nowego wypożyczenia -->
    <a href="{{ route('admin.wypozyczenia.create') }}" class="btn btn-primary">Dodaj nowe wypożyczenie</a>

@endsection
