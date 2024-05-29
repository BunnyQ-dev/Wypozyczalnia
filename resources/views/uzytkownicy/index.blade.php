@extends('layouts.app')

@section('title', 'Użytkownicy')

@section('content')
    <h1>Lista użytkowników</h1>

    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach
    </ul>
@endsection
