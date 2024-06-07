@extends('layouts.app')

@section('title', 'Edytuj Towar')

@section('content')
    <!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Towar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 200vh;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], select, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .img-preview {
            max-width: 200px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Edytuj Towar</h2>

<form action="{{ route('admin.towar.update', $towar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nazwa">Nazwa:</label>
        <input type="text" id="nazwa" name="nazwa" value="{{ $towar->nazwa }}" required>
    </div>

    <div class="form-group">
        <label for="opis">Opis:</label>
        <textarea id="opis" name="opis" rows="4" required>{{ $towar->opis }}</textarea>
    </div>

    <div class="form-group">
        <label for="cena">Cena:</label>
        <input type="text" id="cena" name="cena" value="{{ $towar->cena }}" required>
    </div>

    <div class="form-group">
        <label for="kategoria_id">Kategoria:</label>
        <select id="kategoria_id" name="kategoria_id" required>
            @foreach($kategorie as $kategoria)
                <option value="{{ $kategoria->id }}" {{ $towar->kategoria_id == $kategoria->id ? 'selected' : '' }}>{{ $kategoria->nazwa }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="zdjecie1">Zdjęcie 1:</label>
        @if($towar->zdjecie1)
            <img src="{{ asset('storage/' . $towar->zdjecie1) }}" alt="Zdjęcie 1" class="img-preview">
        @endif
        <input type="file" id="zdjecie1" name="zdjecie1">
    </div>

    <div class="form-group">
        <label for="zdjecie2">Zdjęcie 2:</label>
        @if($towar->zdjecie2)
            <img src="{{ asset('storage/' . $towar->zdjecie2) }}" alt="Zdjęcie 2" class="img-preview">
        @endif
        <input type="file" id="zdjecie2" name="zdjecie2">
    </div>

    <div class="form-group">
        <label for="zdjecie3">Zdjęcie 3:</label>
        @if($towar->zdjecie3)
            <img src="{{ asset('storage/' . $towar->zdjecie3) }}" alt="Zdjęcie 3" class="img-preview">
        @endif
        <input type="file" id="zdjecie3" name="zdjecie3">
    </div>

    <button type="submit" class="btn">Zapisz zmiany</button>
</form>


</body>
</html>
@endsection
