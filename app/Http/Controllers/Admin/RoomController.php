<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $rooms = Room::when($search,function($query) use ($search){

            $query->where('room_number','like',"%$search%")
                  ->orWhere('room_type','like',"%$search%");

        })
        ->latest()
        ->paginate(10);

        return view('admin.rooms.index',compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'room_number'=>'required|unique:rooms',

            'room_type'=>'required',

            'capacity'=>'required|integer',

            'price'=>'required|numeric',

            'description'=>'nullable',

            'status'=>'required',

            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $room = new Room();

        $room->room_number = $request->room_number;
        $room->room_type = $request->room_type;
        $room->capacity = $request->capacity;
        $room->price = $request->price;
        $room->description = $request->description;
        $room->status = $request->status;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');

            $filename = time().'.'.$file->getClientOriginalExtension();

            $file->move(public_path('uploads/rooms'),$filename);

            $room->image = $filename;
        }

        $room->save();

        return redirect()->route('admin.rooms.index')
            ->with('success','Room Added Successfully!');
    }

    public function show(Room $room)
    {
        return view('admin.rooms.show',compact('room'));
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit',compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        // We'll complete this in the next step
    }

    public function destroy(Room $room)
    {
        if($room->image && File::exists(public_path('uploads/rooms/'.$room->image)))
        {
            File::delete(public_path('uploads/rooms/'.$room->image));
        }

        $room->delete();

        return back()->with('success','Room Deleted!');
    }
}