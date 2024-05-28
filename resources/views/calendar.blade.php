<head>
    <link href='/path-to-your-css/core/main.css' rel='stylesheet' />
    <link href='/path-to-your-css/daygrid/main.css' rel='stylesheet' />
</head>
<body>
<div id='calendar'></div>

<script src='/path-to-your-js/core/main.js'></script>
<script src='/path-to-your-js/interaction/main.js'></script>
<script src='/path-to-your-js/daygrid/main.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid'],
            initialView: 'dayGridMonth',
            events: {
                // Tutaj umieść logikę pobierania danych rezerwacji z bazy danych
                // i formatowanie ich do odpowiedniego formatu
            }
        });

        calendar.render();
    });
</script>
</body>
