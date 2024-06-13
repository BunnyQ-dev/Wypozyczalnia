@extends('layouts.app')
@section('title', 'Wypożyczenia w trakcie')

@section('content')
    <head>
        <title>Wypożyczenia w trakcie</title>
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

    <h1>Wypożyczenia w trakcie</h1>

    @if (session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach($wypozyczenia as $wypozyczenie)
            <li class="wypozyczenie">
                <strong>{{ $wypozyczenie->towar->nazwa }}</strong><br>
                Użytkownik: {{ $wypozyczenie->user->username }}<br>
                Data Wypożyczenia: {{ $wypozyczenie->data_wypozyczenia }}<br>
                Data Zwrotu: {{ $wypozyczenie->data_zwrotu }}<br>
                Status: {{ $wypozyczenie->status }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('admin.wypozyczenia.index') }}" class="btn btn-info">Powrót do menu</a>
@endsection
