@extends('layouts.app')
    @section('title', 'Rentify Admin')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }


        h1 {
            color: #ffffff;
        }

        h2 {
            color: #333333;
        }

        p {
            color: #666;
        }
    </style>

<div class="container">
    <h2>Witaj w panelu administracyjnym</h2>
    <p>To jest admin panel wypożyczalni maszyn budowlanych - Rentify.</p>
    <p>Jeżeli wszedłeś tu wypadkowo, zkontaktuj się z nami</p>
    <p>Wszystkie działania są monitorowane</p>

</div>
@endsection
