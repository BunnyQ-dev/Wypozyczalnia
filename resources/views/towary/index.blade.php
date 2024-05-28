@extends('layouts.app')

@section('content')
    <h1>Lista Towarów</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Cena</th>
            <th>Dostępność</th>
        </tr>
        </thead>
        <tbody>
        @foreach($towary as $towar)
            <tr>
                <td>{{ $towar->nazwa }}</td>
                <td>{{ $towar->opis }}</td>
                <td>{{ $towar->cena }}</td>
                <td>{{ $towar->dostepnosc ? 'Dostępna' : 'Niedostępna' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
