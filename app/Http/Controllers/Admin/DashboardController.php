<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard',[

            'rooms'=>Room::count(),

            'users'=>User::count(),

            'bookings'=>Booking::count(),

            'pending'=>Booking::where('status','Pending')->count(),

            'approved'=>Booking::where('status','Approved')->count(),

            'rejected'=>Booking::where('status','Rejected')->count(),

        ]);
    }
}