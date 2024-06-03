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
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('uzytkownicy.edit', $user->id) }}" class="btn btn-primary">Edytuj</a>
                        <form action="{{ route('uzytkownicy.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
