<!-- resources/views/uzytkownicy/edit.blade.php -->

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

        <form action="{{ route('uzytkownicy.update', $user->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Nazwa użytkownika:</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <button type="submit" class="btn btn-success">Zapisz zmiany</button>
        </form>
    </div>
@endsection
