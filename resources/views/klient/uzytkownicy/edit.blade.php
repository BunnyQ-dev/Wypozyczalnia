@extends('layouts.main')

@section('title', 'Edytuj użytkownika')

@section('content')
    <style>
        .full-height {
            height: 100vh;
        }

        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-custom {
            width: 50%;
        }

        @media (max-width: 768px) {
            .card-custom {
                width: 90%;
            }
        }

        .btn-custom,
        .btn-secondary {
            border-radius: 25px;
            padding: 15px 30px;
            font-size: 18px;
            margin-right: 10px;
        }

        .btn-custom {
            background-color: #06a77d;
            border: none;
            color: #fff;
        }

        .btn-secondary {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            color: #333;
        }

        .btn-custom:hover {
            background-color: #08d8a2;
            color: #ffffff;
        }

        .btn-secondary:hover {
            background-color: #ddd;
        }

    </style>
    <div class="container full-height centered pt-5">
        <div class="card card-custom pt-5">
            <div class="card-body">
                <form method="POST" action="{{ route('klient.uzytkownicy.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="username">Nazwa użytkownika</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Imię</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Nazwisko</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Adres</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                    </div>

                    <button type="submit" class="btn btn-custom">Zapisz zmiany</button>
                    <a href="{{ route('klient.uzytkownicy.show', $user->id) }}" class="btn btn-secondary">Anuluj</a>
                </form>
            </div>
        </div>
    </div>
@endsection
