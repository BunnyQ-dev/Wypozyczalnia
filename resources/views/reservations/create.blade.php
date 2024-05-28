@extends('layouts.app')

@section('content')
    <h1>Rezerwacja Maszyn</h1>
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <div class="form-group">
            <label for="machine">Wybierz Maszynę:</label>
            <select name="machine" id="machine" class="form-control" required>
                <option value="">Wybierz Maszynę</option>
                @foreach($machines as $machine)
                    <option value="{{ $machine->id }}">{{ $machine->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Data Rozpoczęcia:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">Data Zakończenia:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Zarezerwuj</button>
    </form>
@endsection
