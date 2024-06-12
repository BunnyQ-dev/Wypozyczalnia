@extends('layouts.main')

@section('title', 'Календар для ' . $towar->nazwa)

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-5">
                <h1 class="pt-3">Календар для {{ $towar->nazwa }}</h1>
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
                initialView: 'dayGridMonth', // Показати місяць з днями
                events: {
                    url: '{{ route('orders.blocked-dates', $towar->id) }}',
                    method: 'GET',
                    failure: function () {
                        alert('Сталася помилка під час отримання подій!');
                    }
                },
                eventDidMount: function(info) {
                    // Відключення заброньованих дат додаванням власного класу або стилів
                    info.el.classList.add('booked-date');
                },
                dateClick: function(info) {
                    // Блокування клацання на даті
                    info.dayEl.style.pointerEvents = 'none';
                }
            });

            calendar.render();
        });
    </script>
@endsection
