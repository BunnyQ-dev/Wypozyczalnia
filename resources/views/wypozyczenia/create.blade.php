@extends('layouts.app')

@section('content')
    <h1>Wypożycz sprzęt</h1>
    <form action="{{ route('wypozyczenia.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Użytkownik:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Wybierz użytkownika</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="towar_id">Sprzęt:</label>
            <select name="towar_id" id="towar_id" class="form-control" required>
                <option value="">Wybierz sprzęt</option>
                @foreach($towary as $towar)
                    <option value="{{ $towar->id }}">{{ $towar->nazwa }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="data_wypozyczenia">Data wypożyczenia:</label>
            <input type="date" name="data_wypozyczenia" id="data_wypozyczenia" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="data_zwrotu">Data zwrotu:</label>
            <input type="date" name="data_zwrotu" id="data_zwrotu" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Wypożycz</button>
    </form>
@endsection
