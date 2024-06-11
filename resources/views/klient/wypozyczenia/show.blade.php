@extends('layouts.main')

@section('title', 'Twoje rezerwacje')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3">Twoje rezerwacje</h1>
                <div class="card">
                    <div class="card-body">
                        @if ($wypozyczenia->count() > 0)
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
                                            @elseif ($wypozyczenie->status === 'zakonczone')
                                                Zwrócone
                                            @else
                                                Zarezerwowane
                                            @endif
                                        </td>
                                        <td class="fs-5">
                                            @if ($wypozyczenie->status === 'w_trakcie' || $wypozyczenie->status === 'zakonczone')
                                                <!-- Nie wyświetlamy przycisków edycji i usuwania -->
                                            @else
                                                <form action="{{ route('klient.wypozyczenia.edit', $wypozyczenie->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Edytuj</button>
                                                </form>
                                                <form action="{{ route('klient.wypozyczenia.destroy', $wypozyczenie->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć to wypożyczenie?')">Usuń</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="fs-5">Brak wypożyczeń.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
