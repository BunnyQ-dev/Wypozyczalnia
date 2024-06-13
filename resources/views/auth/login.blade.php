@extends('layouts.main')

@section('content')
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .space {
            padding-top: 120px;
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

        .btn-zaloguj-container {
            text-align: center;
            margin-top: 10px;
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
    </style>
    <div class="space"></div>
    <h1>Logowanie</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="login">Email/Nazwa użytkownika:</label>
            <input type="text" id="login" name="login" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="btn-zaloguj-container">
            <button type="submit" class="btn btn-zaloguj">Zaloguj się</button>
        </div>
    </form>
    <p>Nie masz konta? <a href="{{ route('register') }}">Zarejestruj się</a></p>
@endsection
