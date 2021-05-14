<?php

namespace App\Classes\Adventure;

use App\Models\Room;
use App\Models\RoomToRoom;
use Illuminate\Database\Eloquent\Model;

/**
 *  Adventure class
 */
trait AdventureRoom
{
    /**
     * Get one rooms
     *
     * @return Array
     */
    public function getOneRoom($roomId = 1): array
    {
        $room = new Room();
        return $room->findWherePrimaryKey($roomId)->toArray();
    }

    /**
     * Combine room id with it's paths
     *
     * @return Array
     */
    public function getRoomAndPath($roomId = 1): array
    {
        $room = new Room();
        return $room->findWherePrimaryKey($roomId)
            ->paths()
            ->get()
            ->toArray();
    }
}
