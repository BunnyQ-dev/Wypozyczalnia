@extends('layouts.main')

@section('title', 'Twoje rezerwacje')

@section('content')
    <style>
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .actions form {
            display: inline-block;
        }

        .actions button {
            white-space: nowrap;
            min-width: 70px;
        }

        .space {
            height: 30vh;
        }

        @media (max-width: 576px) {
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
                        @php
                            $hasReservations = $wypozyczenia->where('status', 'zarezerwowane')->isNotEmpty();
                        @endphp

                        @if ($hasReservations)
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
                                        @if ($wypozyczenie->status === 'zarezerwowane')
                                            <tr>
                                                <td class="fs-5">{{ $wypozyczenie->towar->nazwa }}</td>
                                                <td class="fs-5">{{ $wypozyczenie->data_wypozyczenia }}</td>
                                                <td class="fs-5">{{ $wypozyczenie->data_zwrotu }}</td>
                                                <td class="fs-5">{{ $wypozyczenie->status }}</td>
                                                <td class="fs-5">
                                                    @if (Carbon\Carbon::parse($wypozyczenie->data_wypozyczenia)->isAfter(Carbon\Carbon::today()))
                                                        <div class="actions">
                                                            <form action="{{ route('klient.wypozyczenia.edit', $wypozyczenie->id) }}" method="GET">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary btn-sm">Edytuj</button>
                                                            </form>
                                                            <form action="{{ route('klient.wypozyczenia.destroy', $wypozyczenie->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tą rezerwację?')">Usuń</button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="fs-5">Nie masz żadnych rezerwacji oczekujących na realizację.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space"></div>
@endsection
