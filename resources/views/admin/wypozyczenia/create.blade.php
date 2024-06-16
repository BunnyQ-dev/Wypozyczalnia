@extends('layouts.app')
@section('title', 'Dodaj nowe wypożyczenie')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <h1>Wypożycz Sprzęt</h1>
    <form action="{{ route('admin.wypozyczenia.store') }}" method="POST">
        @csrf
        <label for="user_id">Użytkownik:</label>
        <select id="user_id" name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>
        @error('user_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="towar_id">Towar:</label>
        <select id="towar_id" name="towar_id" required>
            @foreach($towary as $towar)
                <option value="{{ $towar->id }}">{{ $towar->nazwa }}</option>
            @endforeach
        </select>
        @error('towar_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

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

        <button type="submit" class="btn btn-primary">Wypożycz</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const towarSelect = document.getElementById('towar_id');
            const dataWypozyczenia = document.getElementById('data_wypozyczenia');
            const dataZwrotu = document.getElementById('data_zwrotu');

            const initializeDatepicker = (inputElement, blockedDates) => {
                $(inputElement).datepicker('destroy');
                $(inputElement).datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    startDate: new Date(),
                    beforeShowDay: function(date) {
                        const dateString = date.toISOString().split('T')[0];
                        return {
                            enabled: !blockedDates.includes(dateString)
                        };
                    }
                });
            };

            const fetchBlockedDates = (towarId) => {
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

                        initializeDatepicker(dataWypozyczenia, blockedDates);
                        initializeDatepicker(dataZwrotu, blockedDates);
                    });
            };

            towarSelect.addEventListener('change', function() {
                const towarId = this.value;
                fetchBlockedDates(towarId);
            });


            initializeDatepicker(dataWypozyczenia, []);
            initializeDatepicker(dataZwrotu, []);
        });
    </script>
@endsection
