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
                    <form method="POST" action="{{ route('admin.wypozyczenia.update', $wypozyczenie->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="data_wypozyczenia">Data Wypożyczenia:</label>
                            <input type="text" class="form-control datepicker mt-3" id="data_wypozyczenia" name="data_wypozyczenia" value="{{ $wypozyczenie->data_wypozyczenia }}">
                        </div>

                        <div class="form-group">
                            <label for="data_zwrotu" class="mt-3">Data Zwrotu:</label>
                            <input type="text" class="form-control datepicker mt-3" id="data_zwrotu" name="data_zwrotu" value="{{ $wypozyczenie->data_zwrotu }}">
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
        const towarId = {{ $wypozyczenie->towar_id }};
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

                // Initialize Datepicker
                const initializeDatepicker = (inputElement) => {
                    $(inputElement).datepicker({
                        format: 'yyyy-mm-dd',
                        autoclose: true,
                        beforeShowDay: function(date) {
                            const dateString = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
                            return blockedDates.includes(dateString) ? false : true;
                        }
                    });
                };

                initializeDatepicker(dataWypozyczenia);
                initializeDatepicker(dataZwrotu);

                // Function to disable dates in the Datepicker
                const disableBlockedDates = () => {
                    $('.datepicker').datepicker('update');
                };

                dataWypozyczenia.addEventListener('change', function() {
                    disableBlockedDates();
                });

                dataZwrotu.addEventListener('change', function() {
                    disableBlockedDates();
                });
            });
    });
</script>
</body>
</html>
