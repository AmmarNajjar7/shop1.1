@extends('layouts.app')

@section('content')
    <h1>Create Booking</h1>

    <form method="POST" action="{{ route('user.bookings.store') }}">
        @csrf
        <div>
            <label for="service_id">Service</label>
            <select name="service_id" id="service_id" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="barber_id">Barber</label>
            <select name="barber_id" id="barber_id" required>
                @foreach($barbers as $barber)
                    <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="appointment_time">Appointment Time</label>
            <input type="datetime-local" name="appointment_time" required>
        </div>
        <button type="submit">Book Now</button>
    </form>
@endsection
