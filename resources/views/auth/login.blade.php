@extends('layouts.app')

@section('content')
    <h1>Logowanie</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Zaloguj się</button>
    </form>
    <p>Nie masz konta? <a href="{{ route('register') }}">Zarejestruj się</a></p>
@endsection
