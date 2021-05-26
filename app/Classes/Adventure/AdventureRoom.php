<?php

declare(strict_types=1);

namespace App\Classes\Adventure;

use App\Models\Room;
use App\Models\RoomToRoom;
use Illuminate\Database\Eloquent\Model;

/**
 *  Adventure Room trait
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
