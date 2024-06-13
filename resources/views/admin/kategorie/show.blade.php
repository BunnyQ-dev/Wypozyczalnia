@extends('layouts.app')

@section('title', 'Kategoria: ' . $kategoria->nazwa)

@section('content')
    <div class="container">
        <h1>{{ $kategoria->nazwa }}</h1>

        <ul>
            @foreach ($kategoria->towary as $towar)
                <li>{{ $towar->nazwa }}</li>
            @endforeach
        </ul>

        <a href="{{ route('admin.kategorie.edit', $kategoria->id) }}" class="btn btn-primary">Edytuj</a>
        <a href="{{ route('admin.kategorie.index') }}" class="btn btn-info">Powrót do listy</a>
    </div>
@endsection
