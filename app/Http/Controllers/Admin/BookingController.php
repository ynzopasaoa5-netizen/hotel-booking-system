<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Booking List
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $bookings = Booking::with(['user', 'room'])
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    /*
    |--------------------------------------------------------------------------
    | Approve Booking
    |--------------------------------------------------------------------------
    */

    public function approve(Booking $booking)
    {
        $booking->update([
            'status' => 'Approved'
        ]);

        $booking->room->update([
            'status' => 'Occupied'
        ]);

        return back()->with('success', 'Booking approved successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Reject Booking
    |--------------------------------------------------------------------------
    */

    public function reject(Booking $booking)
    {
        $booking->update([
            'status' => 'Rejected'
        ]);

        $booking->room->update([
            'status' => 'Available'
        ]);

        return back()->with('success', 'Booking rejected successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Booking Calendar
    |--------------------------------------------------------------------------
    */

    public function calendar()
    {
        $events = [];

        $bookings = Booking::with(['user', 'room'])->get();

        foreach ($bookings as $booking) {

            $color = '#ffc107'; // Pending (Yellow)

            if ($booking->status == 'Approved') {
                $color = '#198754'; // Green
            }

            if ($booking->status == 'Rejected') {
                $color = '#dc3545'; // Red
            }

            $events[] = [

                'title' => $booking->room->room_number .
                           ' - ' .
                           $booking->user->name,

                'start' => $booking->check_in,

                // FullCalendar's end date is exclusive
                'end' => date(
                    'Y-m-d',
                    strtotime($booking->check_out . ' +1 day')
                ),

                'color' => $color,

            ];
        }

        return view('admin.calendar', compact('events'));
    }
}