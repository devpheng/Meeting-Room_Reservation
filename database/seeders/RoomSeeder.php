<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::truncate();
        $rooms = [
            "Meeting Room 2",
            "Meeting Room 5",
            "Meeting Room 6",
            "Training Room",
            "conference Room",
        ];
        foreach($rooms as $key => $room){
            $newRoom = new Room();
            $newRoom->name = $room;
            $newRoom->save();
        }
    }
}
