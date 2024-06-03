@extends('layouts.app')

@section('title', 'Strona główna')

@section('content')
    <style>
        body {
            background-color: #f2f2f2; /* Jasnoszary kolor tła */
        }

        .carousel-item {
            text-align: center;
        }

        .carousel-item h2 {
            margin-bottom: 20px;
        }

        .carousel-item ul {
            list-style: none;
            padding: 0;
        }

        .carousel-item ul li {
            display: inline-block;
            margin-right: 10px;
            font-size: 18px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            color: #000; /* Czarny kolor strzałek */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #000; /* Czarny kolor strzałek */
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            color: #fff; /* Kolor strzałek po najechaniu myszką */
        }

        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 20px;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .card-text strong {
            font-weight: bold;
        }
    </style>
    <div class="container">
        <!-- Karuzela z kategoriami -->
        <div id="categoryCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($kategorie as $kategoria)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <a href="{{ route('kategorie.index', $kategoria->id) }}"><h2>{{ $kategoria->nazwa }}</h2></a>
                        <ul class="list-unstyled">
                            @foreach ($kategoria->towary as $towar)
                                <li>{{ $towar->nazwa }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#categoryCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Poprzedni</span>
            </a>
            <a class="carousel-control-next" href="#categoryCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Następny</span>
            </a>
        </div>

        <!-- Sekcja z towarami -->
        <h1 class="mt-5">Nasze usługi</h1>
        <div class="row mt-3">
            @foreach ($towary as $towar)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $towar->nazwa }}</h3>
                            <p class="card-text">{{ $towar->opis }}</p>
                            <p class="card-text"><strong>Cena:</strong> {{ $towar->cena }} zł</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
