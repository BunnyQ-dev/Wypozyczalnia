@extends('layouts.app')

@section('content')
    <h1>Lista wypożyczeń</h1>
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Użytkownik</th>
            <th>Sprzęt</th>
            <th>Data wypożyczenia</th>
            <th>Data zwrotu</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($wypozyczenia as $wypozyczenie)
            <tr>
                <td>{{ $wypozyczenie->id }}</td>
                <td>{{ $wypozyczenie->user->username }}</td>
                <td>{{ $wypozyczenie->towar->nazwa }}</td>
                <td>{{ $wypozyczenie->data_wypozyczenia }}</td>
                <td>{{ $wypozyczenie->data_zwrotu }}</td>
                <td>
                    <form action="{{ route('wypozyczenia.delete', $wypozyczenie->id) }}" method="POST">
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
