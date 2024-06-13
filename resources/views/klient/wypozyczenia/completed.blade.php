@extends('layouts.main')

@section('title', 'Twoje zakończone wypożyczenia')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3">Twoje zakończone wypożyczenia</h1>
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($wypozyczenia->count() > 0)
                            <table class="table table-lg text-center">
                                <thead>
                                <tr>
                                    <th class="fs-5">Towar</th>
                                    <th class="fs-5">Data Wypożyczenia</th>
                                    <th class="fs-5">Data Zwrotu</th>
                                    <th class="fs-5">Cena do zapłaty</th>
                                    <th class="fs-5">Status płatności</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $totalCost = 0;
                                @endphp
                                @foreach ($wypozyczenia as $wypozyczenie)
                                    <tr>
                                        <td class="fs-5"><a href="{{ route('klient.wypozyczenia.details', ['id' => $wypozyczenie->id]) }}">
                                                {{ $wypozyczenie->towar->nazwa }}
                                            </a></td>
                                        <td class="fs-5">{{ $wypozyczenie->data_wypozyczenia }}</td>
                                        <td class="fs-5">{{ $wypozyczenie->data_zwrotu }}</td>
                                        <td class="fs-5">{{ $wypozyczenie->cena_do_zaplaty }} PLN</td>
                                        <td class="fs-5">{{ $wypozyczenie->payment_status }}</td>
                                    </tr>
                                    @php
                                        $totalCost += $wypozyczenie->cena_do_zaplaty;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Podsumowanie</h5>
                                    <p><strong>Całkowity koszt za zamówienia:</strong> {{ $totalCost }} PLN</p>
                                </div>
                            </div>
                        @else
                            <p class="fs-5">Brak zakończonych wypożyczeń.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
