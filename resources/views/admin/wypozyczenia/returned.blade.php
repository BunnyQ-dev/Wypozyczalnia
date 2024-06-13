@extends('layouts.app')
@section('title', 'Zwrocone Wypożyczenia')

@section('content')
    <head>
        <title>Zwrocone Wypożyczenia</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                height: 100vh;
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

    <h1>Zwrocone Wypożyczenia</h1>

    @if (session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach($wypozyczenia as $wypozyczenie)
            <li class="wypozyczenie">
                <strong>{{ $wypozyczenie->towar->nazwa }}</strong><br>
                Użytkownik: <a href="{{ route('klient.uzytkownicy.show', $wypozyczenie->user->id) }}">{{ $wypozyczenie->user->username }}</a> <br>
                Data Wypożyczenia: {{ $wypozyczenie->data_wypozyczenia }}<br>
                Data Zwrotu: {{ $wypozyczenie->data_zwrotu }}<br>
                Status: {{ $wypozyczenie->status }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('admin.wypozyczenia.index') }}" class="btn btn-info">Powrót do menu</a>
@endsection
