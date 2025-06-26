<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Barber;
use App\Models\User; // Add this import

class AdminController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();
        $totalServices = Service::count();
        $totalBarbers = Barber::count();
        $totalUsers = User::count(); // Simplified since you added the import
        
        // FIXED: Added $totalUsers to the compact function
        return view('admin.dashboard', compact('totalBookings', 'totalServices', 'totalBarbers', 'totalUsers'));
    }
}