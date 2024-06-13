@extends('layouts.main')

@section('title', 'Kałendarz dla  ' . $towar->nazwa)

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3">Kałendarz dla {{ $towar->nazwa }}</h1>
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: {
                    url: '{{ route('orders.blocked-dates', $towar->id) }}',
                    method: 'GET',
                    failure: function () {
                        alert('Сталася помилка під час отримання подій!');
                    }
                },
                eventDidMount: function(info) {
                    info.el.classList.add('booked-date');
                },
                dateClick: function(info) {
                    info.dayEl.style.pointerEvents = 'none';
                }
            });

            calendar.render();
        });
    </script>
@endsection
