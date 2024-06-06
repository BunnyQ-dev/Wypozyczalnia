@extends('layouts.app')

@section('title', 'Dodaj Nowy Towar')

@section('content')
    <div class="container">
        <h1>Dodaj Nowy Towar</h1>
        <form action="{{ route('admin.towar.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="zdjecie1">Zdjęcie 1:</label>
            <input type="file" id="zdjecie1" name="zdjecie1">

            <label for="zdjecie2">Zdjęcie 2:</label>
            <input type="file" id="zdjecie2" name="zdjecie2">

            <label for="zdjecie3">Zdjęcie 3:</label>
            <input type="file" id="zdjecie3" name="zdjecie3">


            <button type="submit" class="btn btn-primary">Dodaj Towar</button>
        </form>
    </div>
@endsection
