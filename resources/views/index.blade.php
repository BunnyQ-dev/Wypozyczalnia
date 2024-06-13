@extends('layouts.main')

@section('title', 'Strona Główna')

@section('content')

    <section data-bs-version="5.1" class="header16 cid-ueDKg7Rv8y mbr-fullscreen mbr-parallax-background" id="hero-17-ueDKg7Rv8y">


        <div class="container-fluid">
            <div class="row">
                <div class="content-wrap col-12 col-md-12">
                    <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-4 display-1">
                        <strong>Wynajem Mocy</strong>
                    </h1>

                    <p class="mbr-fonts-style mbr-text mbr-white mb-4 display-7">Znajdź idealne narzędzia budowlane i ruszaj z kopyta w swoje projekty!</p>
                    <div class="mbr-section-btn">
                        <a class="btn btn-white-outline display-7" href="{{ route('klient.towary.index') }}">Zobacz Towary</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="features03 cid-ueDKg7VR0d" id="events-1-ueDKg7VR0d">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5">
                <div class="col-12 content-head">
                    <div class="mbr-section-head">
                        <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                            <strong>Najcześciej wypożyczane</strong>
                        </h4>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach($towary as $towar)
                        <div class="col">
                            <div class="card h-100">
                                <div id="carouselExampleIndicators{{ $towar->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @if($towar->zdjecie1)
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/' . $towar->zdjecie1) }}" class="d-block w-100" alt="Zdjęcie 1">
                                            </div>
                                        @else
                                            <div class="carousel-item active">
                                                <span>Brak zdjęcia</span>  </div>
                                        @endif
                                        @if($towar->zdjecie2)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $towar->zdjecie2) }}" class="d-block w-100" alt="Zdjęcie 2">
                                            </div>
                                        @endif
                                        @if($towar->zdjecie3)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $towar->zdjecie3) }}" class="d-block w-100" alt="Zdjęcie 3">
                                            </div>
                                        @endif
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $towar->id }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators{{ $towar->id }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only"></span>
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title mb-3"><strong>{{ $towar->nazwa }}</strong></h5>
                                    <p class="card-text">Kategoria: {{ $towar->kategoria->nazwa }}</p>
                                    <p class="card-text"><strong>Cena:</strong> {{ $towar->cena }} zł</p>
                                </div>
                                <a href="{{ route('klient.towar.show', ['id' => $towar->id]) }}" class="btn btn-primary btn-block">Zarezerwować</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section data-bs-version="5.1" class="article13 cid-ueDKg7VeOc" id="call-to-action-5-ueDKg7VeOc">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card col-md-12 col-lg-10">
                    <div class="card-wrapper">
                        <div class="card-box align-center">
                            <h4 class="card-title mbr-fonts-style display-2">
                                <strong>Potrzebujesz Sprzętu Budowlanego?</strong>
                            </h4>
                            <p class="mbr-text mbr-fonts-style mt-4 display-7">Skorzystaj z naszej wypożyczalni i znajdź idealny sprzęt do Twojego projektu budowlanego już dziś!</p>
                            <div class="mbr-section-btn mt-4">
                                <a class="btn btn-primary display-4" href="{{ route('klient.towary.index') }}">Zarezerwuj</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

