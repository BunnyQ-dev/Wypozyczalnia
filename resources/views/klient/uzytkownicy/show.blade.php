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
            width: 70%; /* Increase the width of the card */
            background-color: #f0f0f0; /* Background color for the card */
            padding: 20px; /* Add padding to the card */
            border-radius: 15px; /* Add border-radius to make the corners round */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }

        /* Style for the primary button */
        .btn-custom {
            border-radius: 25px; /* Make the button round */
            padding: 15px 30px; /* Increase padding to make the button larger */
            font-size: 18px; /* Increase font size */
            background-color: #06a77d; /* Button background color */
            color: #fff; /* Button text color */
            border: none; /* Remove button border */
        }
        .btn-custom:hover{
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
                <!-- Add an ID to the button for styling -->
                <a href="{{ route('klient.uzytkownicy.edit', $user->id) }}" id="edit-btn" class="btn btn-custom">Edytuj</a>
            </div>
        </div>
    </div>
@endsection
