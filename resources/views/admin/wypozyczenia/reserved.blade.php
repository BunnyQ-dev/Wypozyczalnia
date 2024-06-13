@extends('layouts.app')
@section('title', 'Zarezerwowane Wypożyczenia')

@section('content')
    <head>
        <title>Zarezerwowane Wypożyczenia</title>
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
<div class="container-fluid pb-5">
    <h1>Zarezerwowane Wypożyczenia</h1>

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
                <!-- Przycisk do zmiany statusu wypożyczenia -->
                @if ($wypozyczenie->status === 'zarezerwowane')
                    <form action="{{ route('admin.wypozyczenia.changeStatus', $wypozyczenie->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="w_trakcie">
                        <button type="submit" class="btn btn-primary">Rozpocznij wypożyczenie</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
    <a href="{{ route('admin.wypozyczenia.index') }}" class="btn btn-info">Powrót do menu</a>
</div>
@endsection
