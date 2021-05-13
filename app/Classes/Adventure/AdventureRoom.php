<?php

namespace App\Classes\Adventure;

use App\Models\Room;
use App\Models\RoomToRoom;

/**
 *  Adventure class
 */
class AdventureRoom
{
    /**
     * Get one rooms
     *
     * @return Array
     */
    public function getOneRoom($roomId = 1): array
    {
        return Room::where('id', $roomId)
            ->get()
            ->toArray();
    }

    /**
     * Combine room id with it's paths
     *
     * @return Array
     */
    public function getRoomAndPath($roomId = 1): array
    {
        return RoomToRoom::where('room_1', $roomId)
            ->addSelect(['room' => Room::select('id')
            ->whereColumn('id', 'mvc_room_to_room.room_1')
        ])->get()->toArray();
    }
}
