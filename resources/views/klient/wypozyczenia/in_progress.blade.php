@extends('layouts.main')

@section('title', 'Twoje aktualne wypożyczenia')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3">Twoje aktualne wypożyczenia</h1>
                <div class="card">
                    <div class="card-body">
                        @if ($wypozyczenia->count() > 0)
                            <table class="table table-lg text-center">
                                <thead>
                                <tr>
                                    <th class="fs-5">Towar</th>
                                    <th class="fs-5">Data Wypożyczenia</th>
                                    <th class="fs-5">Data Zwrotu</th>
                                    <th class="fs-5">Akcje</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($wypozyczenia as $wypozyczenie)
                                    <tr>
                                        <td class="fs-5">{{ $wypozyczenie->towar->nazwa }}</td>
                                        <td class="fs-5">{{ $wypozyczenie->data_wypozyczenia }}</td>
                                        <td class="fs-5">{{ $wypozyczenie->data_zwrotu }}</td>
                                        <td class="fs-5">
                                            @if ($wypozyczenie->status === 'w_trakcie')
                                                <form action="{{ route('klient.wypozyczenia.return', $wypozyczenie->id) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz zwrócić ten towar?')">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Zwróć</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="fs-5">Brak aktualnych wypożyczeń w trakcie.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
