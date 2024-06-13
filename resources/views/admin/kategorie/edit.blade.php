@extends('layouts.app')

@section('title', 'Edytuj kategorię')

@section('content')
    <div class="container">
        <h1>Edytuj kategorię</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.kategorie.update', $kategoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nazwa">Nazwa kategorii:</label>
                <input type="text" name="nazwa" id="nazwa" class="form-control" value="{{ $kategoria->nazwa }}" required>
            </div>
            <button type="submit" class="btn btn-success">Zapisz zmiany</button>
        </form>
    </div>
@endsection
