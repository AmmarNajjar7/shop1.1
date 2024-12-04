{{-- resources/views/user/bookings/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Your Bookings</h1>

    @if($bookings->isEmpty())
        <p>You have no bookings. <a href="{{ route('user.bookings.create') }}">Create a new booking.</a></p>
    @else
        <ul>
            @foreach ($bookings as $booking)
                <li>
                    <strong>Service ID:</strong> {{ $booking->service_id }}<br>
                    <strong>Barber ID:</strong> {{ $booking->barber_id }}<br>
                    <strong>Appointment Time:</strong> {{ $booking->appointment_time }}<br>
                    <strong>Status:</strong> {{ $booking->status }}<br>
                    <a href="{{ route('booking.details', $booking->id) }}">View Details</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection