@extends('layouts.app')

@section('content')
    <h1>Lista Towarów</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Cena</th>
            <th>Dostępność</th>
        </tr>
        </thead>
        <tbody>
        @foreach($towary as $towar)
            <tr>
                <td>{{ $towar->id }}</td>
                <td>{{ $towar->nazwa }}</td>
                <td>{{ $towar->opis }}</td>
                <td>{{ $towar->cena }}</td>
                <td>{{ $towar->dostepnosc ? 'Dostępny' : 'Niedostępny' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
