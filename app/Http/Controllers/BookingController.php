<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
                    ->latest()
                    ->get();

        return view('booking.index', compact('bookings'));
    }

    public function create(Room $room)
    {
        return view('booking.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([

            'check_in' => 'required|date|after_or_equal:today',

            'check_out' => 'required|date|after:check_in',

            'guests' => 'required|integer|min:1|max:' . $room->capacity,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Prevent Double Booking
        |--------------------------------------------------------------------------
        */

        $existingBooking = Booking::where('room_id', $room->id)
            ->whereIn('status', ['Pending', 'Approved'])
            ->where(function ($query) use ($request) {

                $query->whereBetween('check_in', [
                        $request->check_in,
                        $request->check_out
                    ])

                    ->orWhereBetween('check_out', [
                        $request->check_in,
                        $request->check_out
                    ])

                    ->orWhere(function ($q) use ($request) {

                        $q->where('check_in', '<=', $request->check_in)
                          ->where('check_out', '>=', $request->check_out);

                    });

            })
            ->exists();

        if ($existingBooking) {

            return back()
                ->withInput()
                ->with('error', 'Sorry! This room is already booked for the selected dates.');

        }

        /*
        |--------------------------------------------------------------------------
        | Calculate Total Price
        |--------------------------------------------------------------------------
        */

        $days = Carbon::parse($request->check_in)
                    ->diffInDays(Carbon::parse($request->check_out));

        $total = $days * $room->price;

        /*
        |--------------------------------------------------------------------------
        | Save Booking
        |--------------------------------------------------------------------------
        */

        Booking::create([

            'user_id' => Auth::id(),

            'room_id' => $room->id,

            'check_in' => $request->check_in,

            'check_out' => $request->check_out,

            'guests' => $request->guests,

            'total_price' => $total,

            'status' => 'Pending',

        ]);

        return redirect()
            ->route('booking.index')
            ->with('success', 'Booking submitted successfully!');
    }
}