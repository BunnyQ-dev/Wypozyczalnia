@extends('layouts.main')

@section('title', 'Szczegóły zamówienia')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3">Szczegóły zamówienia</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Szczegóły zamówienia nr {{ $wypozyczenie->id }}</h5>
                        <p><strong>Towar:</strong> {{ $wypozyczenie->towar->nazwa }}</p>
                        <p><strong>Data Wypożyczenia:</strong> {{ $wypozyczenie->data_wypozyczenia }}</p>
                        <p><strong>Data Zwrotu:</strong> {{ $wypozyczenie->data_zwrotu }}</p>
                        <p><strong>Cena do zapłaty:</strong> {{ $wypozyczenie->cena_do_zaplaty }} PLN</p>
                        <p><strong>Status płatności:</strong> {{ $wypozyczenie->payment_status }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
