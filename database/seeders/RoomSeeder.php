<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            ['room_number' => '101', 'room_type' => 'Standard Single', 'capacity' => 1, 'price' => 1500.00, 'image' => null, 'description' => 'A cozy room perfect for solo travelers, with all essential amenities.', 'status' => 'Available'],
            ['room_number' => '102', 'room_type' => 'Standard Double', 'capacity' => 2, 'price' => 2200.00, 'image' => null, 'description' => 'Comfortable room with a double bed, ideal for couples or business travel.', 'status' => 'Available'],
            ['room_number' => '201', 'room_type' => 'Deluxe Suite', 'capacity' => 4, 'price' => 4500.00, 'image' => null, 'description' => 'Spacious suite with a living area, perfect for families.', 'status' => 'Available'],
            ['room_number' => '202', 'room_type' => 'Executive Suite', 'capacity' => 2, 'price' => 5800.00, 'image' => null, 'description' => 'Premium suite with city view, work desk, and lounge access.', 'status' => 'Available'],
            ['room_number' => '301', 'room_type' => 'Family Room', 'capacity' => 6, 'price' => 6200.00, 'image' => null, 'description' => 'Large room with multiple beds, great for family getaways.', 'status' => 'Available'],
            ['room_number' => '302', 'room_type' => 'Penthouse', 'capacity' => 4, 'price' => 9500.00, 'image' => null, 'description' => 'The ultimate luxury experience with panoramic views and premium furnishings.', 'status' => 'Available'],
        ];

        foreach ($rooms as $room) {
            Room::updateOrCreate(['room_number' => $room['room_number']], $room);
        }
    }
}
