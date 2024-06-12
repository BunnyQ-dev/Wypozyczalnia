@extends('layouts.main')

@section('title', 'Twoje rezerwacje')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <style>
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px; /* Space between buttons */
        }

        .actions form {
            display: inline-block;
        }

        .actions button {
            white-space: nowrap; /* Ensure buttons don't wrap text */
            min-width: 70px; /* Minimum width to prevent buttons from becoming too narrow */
        }

        @media (max-width: 576px) { /* Extra small devices (phones, less than 576px) */
            .actions {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>


    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3">Twoje rezerwacje</h1>
                <div class="card">
                    <div class="card-body">
                        @if ($wypozyczenia->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-lg text-center">
                                    <thead>
                                    <tr>
                                        <th class="fs-5">Towar</th>
                                        <th class="fs-5">Data Wypożyczenia</th>
                                        <th class="fs-5">Data Zwrotu</th>
                                        <th class="fs-5">Status</th>
                                        <th class="fs-5">Akcje</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($wypozyczenia->sortByDesc('data_wypozyczenia') as $wypozyczenie)
                                        <tr>
                                            <td class="fs-5">{{ $wypozyczenie->towar->nazwa }}</td>
                                            <td class="fs-5">{{ $wypozyczenie->data_wypozyczenia }}</td>
                                            <td class="fs-5">{{ $wypozyczenie->data_zwrotu }}</td>
                                            <td class="fs-5">
                                                @if ($wypozyczenie->status === 'w_trakcie')
                                                    W trakcie
                                                @elseif ($wypozyczenie->status === 'zwrocone')
                                                    Zwrócone
                                                @else
                                                    Zarezerwowane
                                                @endif
                                            </td>
                                            <td class="fs-5">
                                                @if ($wypozyczenie->status === 'w_trakcie' || $wypozyczenie->status === 'zwrocone')
                                                    <!-- Nie wyświetlamy przycisków edycji i usuwania -->
                                                @elseif (Carbon::parse($wypozyczenie->data_wypozyczenia)->isAfter(Carbon::today()))
                                                    <div class="actions">
                                                        <form action="{{ route('klient.wypozyczenia.edit', $wypozyczenie->id) }}" method="GET">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-sm">Edytuj</button>
                                                        </form>
                                                        <form action="{{ route('klient.wypozyczenia.destroy', $wypozyczenie->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tą rezerwacje?')">Usuń</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="fs-5">Brak rezerwacji.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
