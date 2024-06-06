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

        /* Стили для кнопок */
        .btn-custom,
        .btn-secondary {
            border-radius: 25px; /* Круглые углы */
            padding: 15px 30px; /* Увеличение отступов */
            font-size: 18px; /* Увеличение размера шрифта */
            margin-right: 10px; /* Отступ между кнопками */
        }

        .btn-custom {
            background-color: #06a77d; /* Цвет кнопки сохранить */
            border: none; /* Убираем границу */
            color: #fff; /* Цвет текста */
        }

        .btn-secondary {
            background-color: #f0f0f0; /* Цвет кнопки отмены */
            border: 1px solid #ccc; /* Граница */
            color: #333; /* Цвет текста */
        }

        .btn-custom:hover {
            background-color: #08d8a2; /* Изменение цвета при наведении */
            color: #ffffff;
        }

        .btn-secondary:hover {
            background-color: #ddd; /* Изменение цвета при наведении */
        }
    </style>
    <div class="container full-height centered pt-5">
        <div class="card card-custom pt-5">
            <div class="card-body">
                <form method="POST" action="{{ route('uzytkownicy.update', $user->id) }}">
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

                    <!-- Изменение стилей кнопок -->
                    <button type="submit" class="btn btn-custom">Zapisz zmiany</button>
                    <a href="{{ route('klient.uzytkownicy.show', $user->id) }}" class="btn btn-secondary">Anuluj</a>
                </form>
            </div>
        </div>
    </div>
@endsection
