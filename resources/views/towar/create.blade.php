@extends('layouts.app')

@section('title', 'Dodaj Nowy Towar')

@section('content')
    <div class="container">
        <h1>Dodaj Nowy Towar</h1>
        <form action="{{ route('towar.store') }}" method="POST">
            @csrf
            <label for="nazwa">Nazwa:</label>
            <input type="text" id="nazwa" name="nazwa" required><br>

            <label for="opis">Opis:</label>
            <textarea id="opis" name="opis"></textarea><br>

            <label for="cena">Cena:</label>
            <input type="text" id="cena" name="cena" required><br>

            <label for="kategoria_id">Kategoria:</label>
            <select id="kategoria_id" name="kategoria_id" required>
                @foreach($kategorie as $kategoria)
                    <option value="{{ $kategoria->id }}">{{ $kategoria->nazwa }}</option>
                @endforeach
            </select><br>

            <button type="submit" class="btn btn-primary">Dodaj Towar</button>
        </form>
    </div>
@endsection
