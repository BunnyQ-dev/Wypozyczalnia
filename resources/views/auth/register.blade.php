@extends('layouts.main')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .AppName h1 {
            text-align: center;
            margin-top: 20px;
            color: #ffffff;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .space {
            padding-top: 120px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #495057;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group .checkbox-container {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }

        .form-group .checkbox-container input {
            width: auto;
            margin-right: 10px;
        }

        .form-group .checkbox-container label {
            margin: 0;
        }

        .btn-zaloguj-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-zaloguj {
            width: 100%;
            max-width: 200px;
            padding: 10px;
            background-color: #06A77D;
            border: none;
            color: #ffffff;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-zaloguj:hover {
            background-color: #18c598;
            color: #ffffff;
        }

        p {
            text-align: center;
        }

        p a {
            color: #007bff;
        }

        p a:hover {
            text-decoration: underline;
        }
        .checkbox-container{
            display: flex;
            flex-direction: row;
            margin-right: 7vw ;
            justify-content: space-around;
        }

    </style>
    <div class="space"></div>
    <h1>Rejestracja</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Potwierdź hasło:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="first_name">Podaj imię: </label>
            <input type="text" id="first_name" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Podaj nazwisko: </label>
            <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Podaj adres: </label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>
        <div class="form-group checkbox-container">
            <div class="checkbox"> <input type="checkbox" id="terms" name="terms" required> </div>
            <label for="terms">Zapoznałem się z <a href="{{ route('regulamin') }}">regulaminem</a></label>
        </div>
        <div class="btn-zaloguj-container">
            <button type="submit" class="btn btn-zaloguj">Zarejestruj się</button>
        </div>
    </form>
    <p>Masz konto? <a href="{{ route('login') }}">Zaloguj się</a></p>
@endsection
