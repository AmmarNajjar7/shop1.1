@extends('layouts.app')

@section('content')
    <h1>Edit Booking</h1>

    <form method="POST" action="{{ route('user.bookings.update', $booking->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="service_id">Service</label>
            <select name="service_id" id="service_id" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $service->id == $booking->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="barber_id">Barber</label>
            <select name="barber_id" id="barber_id" required>
                @foreach($barbers as $barber)
                    <option value="{{ $barber->id }}" {{ $barber->id == $booking->barber_id ? 'selected' : '' }}>{{ $barber->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="appointment_time">Appointment Time</label>
            <input type="datetime-local" name="appointment_time" value="{{ date('Y-m-d\TH:i', strtotime($booking->appointment_time)) }}" required>
        </div>
        <button type="submit">Update Booking</button>
    </form>
@endsection
