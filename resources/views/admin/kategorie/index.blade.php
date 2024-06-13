@extends('layouts.app')

@section('title', 'Lista kategorii')

@section('content')
    <div class="container">
        <h1>Lista kategorii</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.kategorie.create') }}" class="btn btn-success mb-3">Dodaj nową kategorię</a>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa kategorii</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($kategorie as $kategoria)
                <tr>
                    <td>{{ $kategoria->id }}</td>
                    <td><a href="{{ route('admin.kategorie.show', $kategoria->id) }}">{{ $kategoria->nazwa }}</a> </td>
                    <td>
                        <form action="{{ route('admin.kategorie.destroy', $kategoria->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tę kategorię?')">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
