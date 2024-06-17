    @extends('layouts.main')

    @section('title', 'Lista Rezerwacji')

    @section('content')

        <div class="container-fluid pt-5">
            <h1>Lista rezerwacji</h1>
            <ul>
                @foreach ($wypozyczenia as $wypozyczenie)
                    <li>
                        Towar: <a href="{{ route('klient.towar.show', $wypozyczenie->towar->id) }}">{{ $wypozyczenie->towar->nazwa }}</a>,
                        Data wypożyczenia: {{ $wypozyczenie->data_wypozyczenia }},
                        Data zwrotu: {{ $wypozyczenie->data_zwrotu }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endsection
