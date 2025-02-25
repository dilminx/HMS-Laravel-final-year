@extends('layout.doctor')

@section('content')
<div class="container">
    <h2><i class="fas fa-calendar-alt"></i> Appointments</h2>
    <div id="calendar"></div>
</div>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek', // Show time slots in a weekly view
            slotDuration: '00:30:00', // 30-minute intervals
            selectable: true, // Allow selecting a time slot
            select: function(info) {
                let appointmentTime = info.startStr;
                if (confirm("Do you want to add an available appointment on " + appointmentTime + "?")) {
                    $.ajax({
                        url: '/doctor/appointments/store',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            appointment_time: appointmentTime
                        },
                        success: function(response) {
                            alert(response.message);
                            calendar.refetchEvents();
                        },
                        error: function(xhr) {
                            alert("Error: " + xhr.responseJSON.error);
                        }
                    });
                }
            },
            events: '/doctor/appointments/fetch', // Load existing appointments
            slotMinTime: "09:00:00", // Start time (9 AM)
            slotMaxTime: "16:00:00"  // End time (4 PM)
        });
        calendar.render();
    });
    </script>
    
    

@endsection
