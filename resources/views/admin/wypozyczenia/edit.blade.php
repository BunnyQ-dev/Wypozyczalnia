@extends('layouts.app')
@section('title', 'Edycja wypożyczenia')

@section('content')
    @if (session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Edytuj wypożyczenie</h1></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.wypozyczenia.update', $wypozyczenie->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="user_id">Użytkownik</label>
                                <select id="user_id" name="user_id" class="form-control">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $wypozyczenie->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->username }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="towar_id">Towar</label>
                                <select id="towar_id" name="towar_id" class="form-control">
                                    @foreach($towary as $towar)
                                        <option value="{{ $towar->id }}" {{ $wypozyczenie->towar_id == $towar->id ? 'selected' : '' }}>
                                            {{ $towar->nazwa }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="data_wypozyczenia">Data wypożyczenia</label>
                                <input type="date" id="data_wypozyczenia" name="data_wypozyczenia" class="form-control" value="{{ $wypozyczenie->data_wypozyczenia }}" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="data_zwrotu">Data zwrotu</label>
                                <input type="date" id="data_zwrotu" name="data_zwrotu" class="form-control" value="{{ $wypozyczenie->data_zwrotu }}" autocomplete="off">
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.wypozyczenia.update', $wypozyczenie->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                                </form>
                                <form method="POST" action="{{ route('admin.wypozyczenia.delete', $wypozyczenie->id) }}" style="margin-top: 10px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć to wypożyczenie?')">Usuń wypożyczenie</button>
                                </form>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

