<!-- resources/views/uzytkownicy/index.blade.php -->

@extends('layouts.app')

@section('title', 'Lista użytkowników')

@section('content')
    <div class="container">
        <h1>Lista użytkowników</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa użytkownika</th>
                <th>Email</th>
                <th>Data utworzenia</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td> <!-- Zamiast 'name' używamy 'username' -->
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <!-- Możesz tutaj dodać przyciski edycji lub usuwania -->
                        <a href="#" class="btn btn-primary">Edytuj</a>
                        <a href="#" class="btn btn-danger">Usuń</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
