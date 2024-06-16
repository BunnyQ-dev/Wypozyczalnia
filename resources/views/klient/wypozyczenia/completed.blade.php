@extends('layouts.main')

@section('title', 'Twoje zakończone wypożyczenia')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3 text-center">Twoje zakończone wypożyczenia</h1>
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($wypozyczenia->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-lg text-center nowrap">
                                    <thead>
                                    <tr>
                                        <th class="fs-5">Towar</th>
                                        <th class="fs-5">Data Wypożyczenia</th>
                                        <th class="fs-5">Data Zwrotu</th>
                                        <th class="fs-5">Cena do zapłaty</th>
                                        <th class="fs-5">Status płatności</th>
                                        <th class="fs-5">Akcje</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $totalCost = 0;
                                    @endphp
                                    @foreach ($wypozyczenia as $wypozyczenie)
                                        <tr>
                                            <td class="fs-5"><a href="{{ route('klient.wypozyczenia.details', $wypozyczenie->id) }}">{{ $wypozyczenie->towar->nazwa }}</a></td>
                                            <td class="fs-5">{{ $wypozyczenie->data_wypozyczenia }}</td>
                                            <td class="fs-5">{{ $wypozyczenie->data_zwrotu }}</td>
                                            <td class="fs-5">{{ $wypozyczenie->cena_do_zaplaty }} PLN</td>
                                            <td class="fs-5">{{ $wypozyczenie->payment_status }}</td>
                                            <td class="fs-5">
                                                @if ($wypozyczenie->payment_status === 'nie zaplacone')
                                                    <form action="{{ route('klient.wypozyczenia.pay', $wypozyczenie->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-sm w-100 my-1">Zapłać</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $totalCost += $wypozyczenie->cena_do_zaplaty;
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Podsumowanie</h5>
                                    <p><strong>Całkowity koszt za zamówienia:</strong> {{ $totalCost }} PLN</p>
                                </div>
                            </div>
                        @else
                            <p class="fs-5 text-center">Brak zakończonych wypożyczeń.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .nowrap td, .nowrap th {
            white-space: nowrap;
        }

        .btn {
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            .btn {
                font-size: 0.875rem;
            }
            .card-title, .fs-5 {
                font-size: 1rem;
            }
        }
    </style>
@endsection
