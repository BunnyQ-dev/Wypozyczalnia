@extends('layouts.app')

@section('title', 'Edycja użytkownika')

@section('content')
    <div class="container">
        <h1>Edycja użytkownika</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.uzytkownicy.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="username">Nazwa użytkownika:</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
            </div>
            <div class="form-group">
                <label for="first_name">Imię</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nazwisko:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}" required>
            </div>
            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
            </div>

            <button type="submit" class="btn btn-success">Zapisz zmiany</button>
        </form>
    </div>
@endsection
