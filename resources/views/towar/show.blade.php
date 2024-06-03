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
                        <a href="{{ route('towar.edit', $towar->id) }}" class="btn btn-primary">Edytuj</a>
                        <a href="{{ route('towar.index') }}" class="btn btn-info">Powrót do listy towarów</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
