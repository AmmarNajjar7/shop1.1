@extends('layouts.admin')

@section('title', 'Manage Bookings')

@section('content')

<h2>Manage Bookings</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- Button to Add a New Booking -->
<div class="button-container">
    <a href="{{ route('admin.bookings.create') }}" class="btn btn-success">Add Booking</a>
</div>

<div class="table-container">
    <table class="booking-table">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Service</th>
                <th>Barber</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bookings as $booking)
                <tr>
                    <td class="customer-name">
                        {{ $booking->user->name ?? 'Unknown User' }}
                    </td>
                    <td>
                        {{ $booking->service->name ?? 'Unknown Service' }}
                    </td>
                    <td>
                        {{ $booking->barber->name ?? 'Unknown Barber' }}
                    </td>
                    <td class="date-time">
                        @if($booking->appointment_time) 
                            {{ \Carbon\Carbon::parse($booking->appointment_time)->format('M d, Y') }}
                        @elseif($booking->date)
                            {{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="date-time">
                        @if($booking->appointment_time)
                            {{ \Carbon\Carbon::parse($booking->appointment_time)->format('h:i A') }}
                        @elseif($booking->time)
                            {{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="status-cell status-{{ strtolower($booking->status ?? 'unknown') }}">
                        {{ ucfirst($booking->status ?? 'Unknown') }}
                    </td>
                    <td class="actions-cell">
                        <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?');">Cancel</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 3rem; color: #6c757d; font-style: italic;">
                        No bookings available. Click "Add Booking" to get started.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($bookings->count() > 0)
    <div style="margin-top: 2rem; text-align: center; color: #6c757d;">
        Showing {{ $bookings->count() }} booking(s)
    </div>
@endif

@endsection