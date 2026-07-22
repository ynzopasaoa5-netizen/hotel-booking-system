@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            Booking Calendar
        </h2>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">

            Back to Dashboard

        </a>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <div id="calendar"></div>

        </div>

    </div>

</div>

<!-- FullCalendar CSS -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/main.min.css">

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        height: 750,

        navLinks: true,

        selectable: false,

        editable: false,

        dayMaxEvents: true,

        events: @json($events),

        eventClick: function(info){

            alert(
                "Booking Information\n\n" +

                "Room: " + info.event.title + "\n\n" +

                "Start: " + info.event.start.toLocaleDateString() + "\n\n" +

                "End: " +

                (info.event.end
                    ? info.event.end.toLocaleDateString()
                    : "N/A")

            );

        }

    });

    calendar.render();

});

</script>

@endsection