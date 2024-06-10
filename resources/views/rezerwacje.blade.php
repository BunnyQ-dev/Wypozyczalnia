@extends('layouts.main')

@section('title', 'Lista Rezerwacji')

@section('content')
        <h1>Lista wypożyczeń</h1>
        <ul>
            @foreach ($wypozyczenia as $wypozyczenie)
                <li>
                    Narzędzie: <a href="{{ route('admin.towar.show', $wypozyczenie->towar->id) }}">{{ $wypozyczenie->towar->nazwa }}</a>,
                    Użytkownik: {{ $wypozyczenie->user->name }},
                    Data wypożyczenia: {{ $wypozyczenie->data_wypozyczenia }},
                    Data zwrotu: {{ $wypozyczenie->data_zwrotu }}
                </li>
            @endforeach
        </ul>
@endsection
