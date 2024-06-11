@extends('layouts.app')
@section('title', 'Zwrot towaru')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Zwrot towaru</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('klient.wypozyczenia.return', $wypozyczenie->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Zwróć</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
