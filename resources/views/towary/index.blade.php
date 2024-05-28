@extends('layouts.app')

@section('content')
    <h1>Lista Towarów</h1>
    <a href="{{ route('towary.create') }}" class="btn btn-primary mb-3">Dodaj nowy towar</a>
    <table class="table">
        <thead>
        <tr>
            <th>Nazwa</th>
            <th>Cena</th>
            <th>Kategoria</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($towary as $towar)
            <tr>
                <td>{{ $towar->nazwa }}</td>
                <td>{{ $towar->cena }}</td>
                <td>{{ $towar->kategoria->nazwa }}</td>
                <td>
                    <form action="{{ route('towary.destroy', $towar->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
