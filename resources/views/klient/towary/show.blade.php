<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $towar->nazwa }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <style>
        .carousel-inner img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .carousel {
            margin-bottom: 30px;
        }
        #data_wypozyczenia, #data_zwrotu {
            font-size: 2.7vh;
        }
        .btn-primary {
            border-radius: 100px;
        }
    </style>
</head>
<body>
<div class="container-fluid"><a href="javascript:history.go(-1)" class="btn btn-primary mt-3">Powrót</a></div>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
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

                    <h1 class="card-title">{{ $towar->nazwa }}</h1>
                    <p class="card-text">{{ $towar->opis }}</p>
                    <p class="card-text"><strong>Cena:</strong> {{ $towar->cena }} zł</p>
                    <p class="card-text"><strong>Kategoria:</strong> {{ $towar->kategoria->nazwa }}</p>



                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('klient.rent.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="towar_id" value="{{ $towar->id }}">
                        <div class="form-group">
                            <label for="data_wypozyczenia">Data Wypożyczenia</label>
                            <input type="text" class="form-control @error('data_wypozyczenia') is-invalid @enderror" id="data_wypozyczenia" name="data_wypozyczenia" value="{{ old('data_wypozyczenia') }}" required autocomplete="off">
                            @error('data_wypozyczenia')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="data_zwrotu">Data Zwrotu</label>
                            <input type="text" class="form-control @error('data_zwrotu') is-invalid @enderror" id="data_zwrotu" name="data_zwrotu" value="{{ old('data_zwrotu') }}" required autocomplete="off">
                            @error('data_zwrotu')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Wynajmij</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const towarId = {{ $towar->id }};
        const dataWypozyczenia = document.getElementById('data_wypozyczenia');
        const dataZwrotu = document.getElementById('data_zwrotu');

        fetch(`/blocked-dates/${towarId}`)
            .then(response => response.json())
            .then(dates => {
                const blockedDates = dates.map(range => {
                    const start = new Date(range.data_wypozyczenia);
                    const end = new Date(range.data_zwrotu);
                    const dateArray = [];
                    let currentDate = start;
                    while (currentDate <= end) {
                        dateArray.push(currentDate.toISOString().split('T')[0]);
                        currentDate.setDate(currentDate.getDate() + 1);
                    }
                    return dateArray;
                }).flat();

                const initializeDatepicker = (inputElement) => {
                    $(inputElement).datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        startDate: new Date(),
                        beforeShowDay: function(date) {
                            const dateString = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
                            return blockedDates.includes(dateString) ? false : true;
                        }
                    });
                };

                initializeDatepicker(dataWypozyczenia);
                initializeDatepicker(dataZwrotu);
            });
    });
</script>
</body>
</html>
