@extends('layouts.main')

@section('title', 'Szczegóły użytkownika')

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
            width: 70%;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            border-radius: 25px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #06a77d;
            color: #fff;
            border: none;
        }
        .btn-custom:hover {
            color: #ffffff;
            background-color: #08d8a2;
        }
    </style>
    <div class="container full-height centered">
        <div class="card card-custom">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <p><strong>Nazwa użytkownika:</strong> {{ $user->username }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Imię:</strong> {{ $user->first_name }}</p>
                <p><strong>Nazwisko:</strong> {{ $user->last_name }}</p>
                <p><strong>Adres:</strong> {{ $user->address }}</p>
                @if (Auth::id() === $user->id)
                    <a href="{{ route('klient.uzytkownicy.edit', $user->id) }}" id="edit-btn" class="btn btn-custom">Edytuj</a>
                @endif
            </div>
        </div>
    </div>
@endsection
