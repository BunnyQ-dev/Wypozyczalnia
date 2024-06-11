@extends('layouts.app')
@section('title', 'wypozyczenie')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Wypożyczenie towaru</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('klient.wypozyczenia.rent', $wypozyczenie->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Wypożycz</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
