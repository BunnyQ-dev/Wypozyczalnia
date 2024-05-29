{{-- resources/views/kategorie/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Kategoria: ' . $kategoria->nazwa)

@section('content')
    <div class="container">
        <h1>{{ $kategoria->nazwa }}</h1>
        <ul>
            @foreach ($kategoria->towary as $towar)
                <li>{{ $towar->nazwa }}</li>
            @endforeach
        </ul>
    </div>
@endsection
