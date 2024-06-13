@extends('layouts.app')

@section('title', 'Dodaj kategorię')

@section('content')
    <div class="container">
        <h1>Dodaj kategorię</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.kategorie.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nazwa">Nazwa kategorii:</label>
                <input type="text" name="nazwa" id="nazwa" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Dodaj kategorię</button>
        </form>
    </div>
@endsection
