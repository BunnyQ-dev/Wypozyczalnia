@extends('layouts.app')

@section('title', 'Towary')

@section('content')
    <!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Towarów</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .towar {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .towar strong {
            font-size: 1.2em;
        }
        .towar .kategoria {
            font-weight: bold;
        }
        .flash-message {
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<h1>Lista Towarów</h1>

@if (session('success'))
    <div class="flash-message">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach($towary as $towar)
        <li class="towar">
            <strong>{{ $towar->nazwa }}</strong><br>
            <span class="kategoria">Kategoria: {{ $towar->kategoria->nazwa }}</span><br>
            {{ $towar->opis }}<br>
            Cena: {{ $towar->cena }} zł
            <div>
                <a href="{{ route('towary.edit', $towar->id) }}" class="btn">Edytuj</a>
            </div>
        </li>
    @endforeach
</ul>

<div style="margin-top: 20px;">
    <a href="{{ route('towary.create') }}" class="btn">Dodaj nowy towar</a>
</div>

</body>
</html>
@endsection
