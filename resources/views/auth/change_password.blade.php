@extends('layouts.main')

@section('content')
    <style>
        .space{
            height: 20vh;
        }
    </style>
    <div class="space"></div>
    <div class="container mb-5">
    <h1>Zmiana hasła</h1>
    <form method="POST" action="{{ route('change.password') }}">
        @csrf
        <div class="form-group">
            <label for="current_password">Aktualne hasło:</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password">Nowe hasło:</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Potwierdź nowe hasło:</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
        </div>
        <div class="btn-zaloguj-container">
            <button type="submit" class="btn btn-primary">Zmień hasło</button>
        </div>
    </form>
    </div>
@endsection
