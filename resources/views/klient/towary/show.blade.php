@extends('layouts.main')
@section('title', $towar->nazwa)

@section('content')

    <style>
        .carousel-inner img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .carousel {
            margin-bottom: 30px;
        }
        #data_wypozyczenia, #data_zwrotu{
            font-size: 2.7vh;
        }
    </style>
<div class="container pt-5">
    <div class="row pt-5">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $towar->nazwa }}</h1>
                    <p class="card-text">{{ $towar->opis }}</p>
                    <p class="card-text"><strong>Cena:</strong> {{ $towar->cena }} zł</p>
                    <p class="card-text"><strong>Kategoria:</strong> {{ $towar->kategoria->nazwa }}</p>

                    @if($towar->zdjecie1 || $towar->zdjecie2 || $towar->zdjecie3)
                        <div id="photoCarousel" class="carousel slide mb-3">
                            <div class="carousel-inner">
                                @if($towar->zdjecie1)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/' . $towar->zdjecie1) }}" alt="Zdjęcie 1" class="d-block w-100 img-fluid">
                                    </div>
                                @endif
                                @if($towar->zdjecie2)
                                    <div class="carousel-item {{ !$towar->zdjecie1 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $towar->zdjecie2) }}" alt="Zdjęcie 2" class="d-block w-100 img-fluid">
                                    </div>
                                @endif
                                @if($towar->zdjecie3)
                                    <div class="carousel-item {{ !$towar->zdjecie1 && !$towar->zdjecie2 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $towar->zdjecie3) }}" alt="Zdjęcie 3" class="d-block w-100 img-fluid">
                                    </div>
                                @endif
                            </div>
                            <a class="carousel-control-prev" href="#photoCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only"></span>
                            </a>
                            <a class="carousel-control-next" href="#photoCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only"></span>
                            </a>
                        </div>
                    @endif


                    <form action="{{ route('klient.rent.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="towar_id" value="{{ $towar->id }}">
                        <div class="form-group">
                            <label for="data_wypozyczenia">Data Wypożyczenia</label>
                            <input type="date" class="form-control" id="data_wypozyczenia" name="data_wypozyczenia" required>
                        </div>
                        <div class="form-group">
                            <label for="data_zwrotu">Data Zwrotu</label>
                            <input type="date" class="form-control" id="data_zwrotu" name="data_zwrotu" required>
                        </div>
                        <button type="submit" class="btn btn-success">Wynajmij</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
