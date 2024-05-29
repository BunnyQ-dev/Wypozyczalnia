<<<<<<< HEAD
<form action="{{ route('towary.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nazwa">Nazwa:</label>
        <input type="text" name="nazwa" id="nazwa" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="opis">Opis:</label>
        <textarea name="opis" id="opis" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="cena">Cena:</label>
        <input type="number" name="cena" id="cena" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="kategoria_id">Kategoria:</label>
        <select name="kategoria_id" id="kategoria_id" class="form-control" required>
            <option value="">Wybierz kategorię</option>
            @foreach($kategorie as $kategoria)
                <option value="{{ $kategoria->id }}">{{ $kategoria->nazwa }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Dodaj</button>
</form>
=======
@extends('layouts.app')

@section('title', 'Dodaj Nowy Towar')

@section('content')
    <div class="container">
        <h1>Dodaj Nowy Towar</h1>
        <form action="{{ route('towary.store') }}" method="POST">
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
>>>>>>> origin/wypozyczenie
