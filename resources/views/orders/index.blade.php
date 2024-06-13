@extends('layouts.main')

@section('title', 'Lista zamówień')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3">Lista produktów</h1>
                <div class="card">
                    <div class="card-body">
                        @if ($towary->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-lg text-center">
                                    <thead>
                                    <tr>
                                        <th class="fs-5">Nazwa produktu</th>
                                        <th class="fs-5">Cena</th>
                                        <th class="fs-5">Działania</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($towary as $towar)
                                        <tr>
                                            <td class="fs-5"><a href="{{ route('klient.towar.show', $towar->id) }}">{{ $towar->nazwa }}</a></td>
                                            <td class="fs-5">{{ $towar->cena }}</td>
                                            <td class="fs-5">
                                                <a href="{{ route('orders.calendar', $towar->id) }}" class="btn btn-primary">Zobacz kalendarz</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="fs-5">Brak dostępnych produktów.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
