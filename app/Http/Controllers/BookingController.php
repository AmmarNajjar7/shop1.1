<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Barber;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{


  
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }   

    public function index()
    {
        if ($this->isAdmin()) {
            // Admin logic
            $bookings = Booking::all();
            return view('admin.bookings.index', compact('bookings'));
        } else {
            // Regular user logic
            $bookings = Booking::where('customer_email', Auth::user()->email)->get();
            return view('user.bookings.index', compact('bookings'));
        }
    }
    
    public function create()
    {
        if ($this->isAdmin()) {
            return redirect()->route('admin.bookings.create'); // Redirect admin to the admin create booking view
        }

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'You need to log in or register to make a booking.');
        }

        // Fetch available services and barbers for the booking form
        $services = Service::all();
        $barbers = Barber::all();

        // Show the user a form to create a booking
        return view('user.bookings.create', compact('services', 'barbers'));
    }

    public function store(Request $request)
    {
        if ($this->isAdmin()) {
            return redirect()->route('admin.bookings.index'); // Redirect admin to the bookings index
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'service_id' => 'required|exists:services,id',
            'barber_id' => 'required|exists:barbers,id',
            'date' => 'required|date',
            'time' => 'required|string',
        ]);

        // Create the booking for the authenticated user
        Booking::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'service_id' => $request->service_id,
            'barber_id' => $request->barber_id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('user.bookings.index')->with('success', 'Booking created successfully.');
    }
    public function show() // No parameters
    {
        // Check if the user is an admin
        if ($this->isAdmin()) {
            // Admin can see all bookings
            $bookings = Booking::all(); // Fetch all bookings for admin
            return view('admin.bookings.index', compact('bookings')); // Adjust the view as needed
        }
    
        // Regular user logic
        // Find all bookings for the authenticated user by their email
        $bookings = Booking::where('user_id', Auth::user()->email)->get();
        
        // Ensure that the bookings exist for this user
        return view('user.booking.show', compact('bookings')); // Adjust the view as needed
    }
    

    public function edit(Booking $booking)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('user.bookings.index'); // Regular users cannot edit bookings
        }

        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('user.bookings.index'); // Regular users cannot update bookings
        }

        $request->validate([
            'status' => 'required|string',
        ]);

        $booking->update($request->all());
        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('user.bookings.index'); // Regular users cannot delete bookings
        }

        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking canceled successfully.');
    }
}