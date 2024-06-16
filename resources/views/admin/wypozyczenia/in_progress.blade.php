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
                white-space: nowrap; /* Запобігає переносу слів */
            }
            .wypozyczenie strong {
                font-size: 1.2em;
            }

            .backbtn {
                height: 20vh;
            }
        </style>
    </head>

    <div class="container-fluid pb-5">
        <h1>Wypożyczenia w trakcie</h1>

        @if (session('success'))
            <div class="flash-message">
                {{ session('success') }}
            </div>
        @endif

        @if($wypozyczenia->isEmpty())
            <p class="fs-5">Brak wypożyczeń w trakcie.</p>
        @else
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
        @endif

        <div class="backbtn">
            <a href="{{ route('admin.wypozyczenia.index') }}" class="btn btn-info">Powrót do menu</a>
        </div>
    </div>
@endsection
