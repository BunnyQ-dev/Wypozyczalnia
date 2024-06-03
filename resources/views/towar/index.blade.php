@extends('layouts.app')

@section('title', 'Lista Towarów')

@section('content')
    <div class="container">
        <h1 class="mt-5">Lista Towarów</h1>
        <div class="row mt-3">
            @foreach ($towary as $towar)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"><a href="{{ route('towar.show', $towar->id) }}">{{ $towar->nazwa }}</a></h3>
                            <p class="card-text">{{ $towar->opis }}</p>
                            <p class="card-text"><strong>Cena:</strong> {{ $towar->cena }} zł</p>
                            <form action="{{ route('towar.destroy', $towar->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten towar?')">Usuń</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('towar.create') }}" class="btn btn-success">Dodaj nowy towar</a>
    </div>
@endsection
