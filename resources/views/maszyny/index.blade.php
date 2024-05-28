@extends('layouts.app')

@section('content')
    <h1>Lista Maszyn</h1>
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
        @foreach($maszyny as $maszyna)
            <tr>
                <td>{{ $maszyna->nazwa }}</td>
                <td>{{ $maszyna->opis }}</td>
                <td>{{ $maszyna->cena }}</td>
                <td>{{ $maszyna->dostepnosc ? 'Dostępna' : 'Niedostępna' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
