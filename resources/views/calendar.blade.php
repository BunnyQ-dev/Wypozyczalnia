<!-- resources/views/calendar.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction/main.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'dayGrid', 'interaction' ],
                selectable: true,
                events: @json($bookings),
                select: function(info) {
                    var startDate = info.startStr;
                    var endDate = info.endStr;

                    document.getElementById('start_date').value = startDate;
                    document.getElementById('end_date').value = endDate;
                }
            });

            calendar.render();
        });
    </script>
</head>
<body>
<div id='calendar'></div>
<form action="/book" method="post">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <input type="hidden" id="start_date" name="start_date">
    <input type="hidden" id="end_date" name="end_date">
    <button type="submit">Book</button>
</form>
</body>
</html>
