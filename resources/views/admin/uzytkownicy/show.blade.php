@extends('layouts.app')

@section('title', 'Szczegóły użytkownika')

@section('content')
    <div class="container">
        <h1>Szczegóły użytkownika</h1>

        <div class="card">
            <div class="card-header">
                Użytkownik: {{ $user->username }}
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $user->id }}</p>
                <p><strong>Nazwa użytkownika:</strong> {{ $user->username }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Imię:</strong> {{ $user->first_name }}</p>
                <p><strong>Nazwisko:</strong> {{ $user->last_name }}</p>
                <p><strong>Adres:</strong> {{ $user->address }}</p>
                <p><strong>Data utworzenia:</strong> {{ $user->created_at }}</p>
                <a href="{{ route('admin.uzytkownicy.edit', $user->id) }}" class="btn btn-primary">Edytuj</a>
                <a href="{{ route('admin.uzytkownicy.index') }}" class="btn btn-info">Powrót do listy</a>
            </div>
        </div>
    </div>
@endsection
