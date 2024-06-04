@extends('layouts.app')

@section('content')
    <style>
        /* public/css/styles.css */

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

        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
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

    </style>
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
        <button type="submit" class="btn btn-primary">Zarejestruj się</button>
    </form>
    <p>Masz konta? <a href="{{ route('login') }}">Zaloguj się</a></p>
@endsection
