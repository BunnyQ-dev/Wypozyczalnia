@extends('layouts.main')

@section('title', 'Nasze towary')

@section('content')
    <section data-bs-version="5.1" class="features03 cid-ueDKg7VR0d" id="events-1-ueDKg7VR0d">
        <div class="container-fluid">
            <div class="row justify-content-center mb-5 pt-3">
                <div class="col-12 content-head">
                    <div class="mbr-section-head">
                        <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                            <strong>Nasze towary</strong>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-12">
                    <form method="GET" action="{{ route('klient.towary.index') }}">
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-4 mb-3">
                                <input type="text" name="search" class="form-control custom-input" placeholder="Wyszukaj..." value="{{ request()->input('search') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <select name="kategoria_id" class="form-control custom-select custom-height">
                                    <option value="">Kategoria</option>
                                    @foreach($kategorie as $kategoria)
                                        <option value="{{ $kategoria->id }}" {{ request()->input('kategoria_id') == $kategoria->id ? 'selected' : '' }}>
                                            {{ $kategoria->nazwa }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <button type="submit" class="btn btn-primary custom-button">Znajdź</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach($towary as $towar)
                        <div class="col">
                            <div class="card h-100">
                                <div id="carouselExampleIndicators{{ $towar->id }}" class="carousel slide" data-bs-ride="false">
                                    <div class="carousel-inner">
                                        @if($towar->zdjecie1)
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/' . $towar->zdjecie1) }}" class="d-block w-100 img-fluid" alt="Zdjęcie 1">
                                            </div>
                                        @else
                                            <div class="carousel-item active">
                                                <span>Brak zdjęcia</span>
                                            </div>
                                        @endif
                                        @if($towar->zdjecie2)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $towar->zdjecie2) }}" class="d-block w-100 img-fluid" alt="Zdjęcie 2">
                                            </div>
                                        @endif
                                        @if($towar->zdjecie3)
                                            <div class="carousel-item">
                                                <img src="{{ asset('storage/' . $towar->zdjecie3) }}" class="d-block w-100 img-fluid" alt="Zdjęcie 3">
                                            </div>
                                        @endif
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{ $towar->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{ $towar->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
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

    <style>
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .card {
            min-height: 450px;
        }
        .mb-5.pt-3 .content-head {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .mb-5 {
            margin-bottom: 20px;
        }

        .custom-input,
        .custom-select,
        .custom-button {
            width: 100%;
            height: 100%;
        }

        @media (min-width: 768px) {
            .custom-input,
            .custom-select,
            .custom-button {
                margin-left: 20vh;
            }
        }

        .custom-button {
            max-width: 200px;
            margin-top: 0;
            border-radius: 100px;
        }


    </style>

@endsection
