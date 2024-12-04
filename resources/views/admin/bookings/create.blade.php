@extends('layouts.admin')

@section('title', 'Create Booking')

@section('content')
<h2>Create Booking</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Calendar -->
<div id="calendar" class="mb-4"></div>

<!-- Booking Form -->
<div id="booking-form" style="display:none;">
    <form id="createBooking" method="POST" action="{{ route('admin.bookings.store') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="customer_name" class="form-label">Customer Name</label>
            <input type="text" id="customer_name" name="customer_name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="customer_email" class="form-label">Customer Email</label>
            <input type="email" id="customer_email" name="customer_email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="service_id" class="form-label">Service</label>
            <select id="service_id" name="service_id" class="form-control" required>
                <option value="" disabled selected>Select a service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} - ${{ $service->price }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="barber_id" class="form-label">Barber</label>
            <select id="barber_id" name="barber_id" class="form-control" required>
                <option value="" disabled selected>Select a barber</option>
                @foreach($barbers as $barber)
                    <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" name="date" class="form-control" readonly required>
        </div>

        <div class="form-group mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" id="time" name="time" class="form-control" readonly required>
        </div>

        <button type="submit" class="btn btn-primary">Create Booking</button>
        <button type="button" class="btn btn-secondary" id="cancel-form">Cancel</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const bookingForm = document.getElementById('booking-form');
        const dateInput = document.getElementById('date');
        const timeInput = document.getElementById('time');
        const cancelFormButton = document.getElementById('cancel-form');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid', 'timeGrid', 'interaction'],
            initialView: 'timeGridWeek',
            selectable: true,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            select: function (info) {
                // Populate the form fields with the selected date and time
                dateInput.value = info.startStr.split('T')[0];
                timeInput.value = info.startStr.split('T')[1].substring(0, 5);

                // Show the booking form
                bookingForm.style.display = 'block';
            }
        });

        calendar.render();

        // Hide the form on cancel
        cancelFormButton.addEventListener('click', function () {
            bookingForm.style.display = 'none';
        });
    });
</script>
@endsection
