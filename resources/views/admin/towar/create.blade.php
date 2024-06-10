@extends('layouts.app')

@section('title', 'Dodaj Nowy Towar')

@section('content')
    <div class="container">
        <h1>Dodaj Nowy Towar</h1>
        <form action="{{ route('admin.towar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nazwa">Nazwa:</label>
                <input type="text" id="nazwa" name="nazwa" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="opis">Opis:</label>
                <textarea id="opis" name="opis" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="cena">Cena:</label>
                <input type="text" id="cena" name="cena" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="kategoria_id">Kategoria:</label>
                <select id="kategoria_id" name="kategoria_id" class="form-control" required>
                    @foreach($kategorie as $kategoria)
                        <option value="{{ $kategoria->id }}">{{ $kategoria->nazwa }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="zdjecie1">Zdjęcie 1:</label>
                <input type="file" id="zdjecie1" name="zdjecie1" class="form-control">
            </div>

            <div class="form-group">
                <label for="zdjecie2">Zdjęcie 2:</label>
                <input type="file" id="zdjecie2" name="zdjecie2" class="form-control">
            </div>

            <div class="form-group">
                <label for="zdjecie3">Zdjęcie 3:</label>
                <input type="file" id="zdjecie3" name="zdjecie3" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Dodaj Towar</button>
        </form>
    </div>
    <div class="space"></div>

    <style>
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 0.5rem;
        }
        button {
            margin-top: 1rem;
        }
        .space{
            height: 20vh;
        }
    </style>
@endsection
