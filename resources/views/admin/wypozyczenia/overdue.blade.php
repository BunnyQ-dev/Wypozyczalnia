@extends('layouts.app')
@section('title', 'Przekroczone Wypożyczenia')

@section('content')
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
            .no-wypozyczenia {
                text-align: center;
                margin-top: 20px;
                font-size: 1.2em;
                color: #666;
            }
            .backbtn{
                height: 20vh;
            }
        </style>

        <h1>Lista Przekroczonych Wypożyczeń</h1>

        @if (session('success'))
            <div class="flash-message">
                {{ session('success') }}
            </div>
        @endif

        @if($wypozyczenia->isEmpty())
            <div class="no-wypozyczenia">
                Nie ma przekroczonych wypożyczeń.
            </div>
        @else
            <ul>
                @foreach($wypozyczenia as $wypozyczenie)
                    <li class="wypozyczenie">
                        <strong><a href="{{ route('admin.wypozyczenia.edit', $wypozyczenie->id) }}">{{ $wypozyczenie->towar->nazwa }} </a></strong><br>
                        Użytkownik: <a href="{{ route('klient.uzytkownicy.show', $wypozyczenie->user->id) }}">{{ $wypozyczenie->user->username }}</a> <br>
                        Data Wypożyczenia: {{ $wypozyczenie->data_wypozyczenia }}<br>
                        Data Zwrotu: {{ $wypozyczenie->data_zwrotu ?? 'Brak' }}<br>
                        Status: {{ $wypozyczenie->status }}
                    </li>
                @endforeach
            </ul>
        @endif
    <div class="backbtn"><a href="{{ route('admin.wypozyczenia.index') }}" class="btn btn-info">Powrót do menu</a></div>

@endsection
