@extends('layouts.app')

@section('content')
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
        <button type="submit" class="btn btn-primary">Zarejestruj się</button>
    </form>
@endsection
