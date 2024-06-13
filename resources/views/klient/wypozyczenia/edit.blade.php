<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Wypożyczenie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edytuj Wypożyczenie</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('klient.wypozyczenia.update', $wypozyczenie->id) }}">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="towar_id" value="{{ $wypozyczenie->towar_id }}">

                        <div class="form-group">
                            <label for="data_wypozyczenia">Data Wypożyczenia:</label>
                            <input type="text" class="form-control datepicker mt-3" id="data_wypozyczenia" name="data_wypozyczenia" value="{{ old('data_wypozyczenia', $wypozyczenie->data_wypozyczenia) }}">
                        </div>

                        <div class="form-group">
                            <label for="data_zwrotu" class="mt-3">Data Zwrotu:</label>
                            <input type="text" class="form-control datepicker mt-3" id="data_zwrotu" name="data_zwrotu" value="{{ old('data_zwrotu', $wypozyczenie->data_zwrotu) }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Zapisz</button>
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
