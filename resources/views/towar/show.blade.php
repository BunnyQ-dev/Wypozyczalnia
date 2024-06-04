@extends('layouts.app')

@section('title', 'Towar: ' . $towar->nazwa)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">{{ $towar->nazwa }}</h1>
                        <p class="card-text">{{ $towar->opis }}</p>
                        <p class="card-text"><strong>Cena:</strong> {{ $towar->cena }} zł</p>
                        <p class="card-text"><strong>Kategoria:</strong> {{ $towar->kategoria->nazwa }}</p>

                        <!-- Dodaj wyświetlanie zdjęć -->
                        <div class="mb-3">
                            @if($towar->zdjecie1)
                                <img src="{{ asset('storage/' . $towar->zdjecie1) }}" alt="Zdjęcie 1" class="img-fluid">
                            @endif
                            @if($towar->zdjecie2)
                                <img src="{{ asset('storage/' . $towar->zdjecie2) }}" alt="Zdjęcie 2" class="img-fluid">
                            @endif
                            @if($towar->zdjecie3)
                                <img src="{{ asset('storage/' . $towar->zdjecie3) }}" alt="Zdjęcie 3" class="img-fluid">
                            @endif
                        </div>

                        <a href="{{ route('towar.edit', $towar->id) }}" class="btn btn-primary">Edytuj</a>
                        <a href="{{ route('towar.index') }}" class="btn btn-info">Powrót do listy towarów</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
