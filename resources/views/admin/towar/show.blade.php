<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $towar->nazwa }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            height: 400px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">{{ $towar->nazwa }}</h1>
                    <p class="card-text">{{ $towar->opis }}</p>
                    <p class="card-text"><strong>Cena:</strong> {{ $towar->cena }} zł</p>
                    <p class="card-text"><strong>Kategoria:</strong> {{ $towar->kategoria->nazwa }}</p>

                    @if($towar->zdjecie1 || $towar->zdjecie2 || $towar->zdjecie3)
                        <div id="photoCarousel" class="carousel slide mb-3" data-ride="carousel">
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
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#photoCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    @endif

                    <a href="{{ route('admin.towar.edit', $towar->id) }}" class="btn btn-primary">Edytuj</a>
                    <a href="{{ route('admin.towar.index') }}" class="btn btn-info">Powrót do listy towarów</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#photoCarousel').carousel({
            interval: false
        });

        $('.carousel-control-prev').click(function() {
            $('#photoCarousel').carousel('prev');
        });

        $('.carousel-control-next').click(function() {
            $('#photoCarousel').carousel('next');
        });
    });
</script>
</body>
</html>
