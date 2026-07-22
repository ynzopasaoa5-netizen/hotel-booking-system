<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Room::where('status', 'Available');

        // Search
        if ($request->filled('search')) {

            $query->where(function ($q) use ($request) {

                $q->where('room_number', 'like', '%' . $request->search . '%')
                  ->orWhere('room_type', 'like', '%' . $request->search . '%');

            });

        }

        // Filter by Room Type
        if ($request->filled('type')) {

            $query->where('room_type', $request->type);

        }

        // Filter by Capacity
        if ($request->filled('capacity')) {

            $query->where('capacity', '>=', $request->capacity);

        }

        $rooms = $query->latest()->get();

        // Get room types for dropdown
        $roomTypes = Room::select('room_type')
                        ->distinct()
                        ->pluck('room_type');

        return view('home', compact('rooms', 'roomTypes'));
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
}