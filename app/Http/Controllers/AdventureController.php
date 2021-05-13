<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomToRoom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Dice\DiceHand;

/**
 * Controller for the index route.
 */
class AdventureController extends Controller
{
    /**
     * Display all rooms
     *
     * @return \Illuminate\Contracts\View\View
     */

    public function index($value='')
    {
        $data['adventure'] = false;
        return view('/adventure-index', ['data' => $data]);
    }

    public function quest(Request $request)
    {
        $roomId = $request->query('id') ?? 1;
        $data['adventure'] = true;
        if ($roomId === '4') {
            $data['message'] = 'Du börjar kasta';
            $data['diceHand'] = true;
            $diceHand = new DiceHand(2);
            $diceHand->roll();
            $data['classes'] = $diceHand->graphic();
            if ($request->query('throw') === 'player') {
                $data['message'] = 'Ge tärningarna till lejonet';
                $data['diceSum'] = $diceHand->sum();
            }
        }
        $data['roomAndPath'] = $this->getRoomAndPath($roomId);
        $data['rooms'] = $this->getOneRoom($roomId);
        return view('/adventure-index', ['data' => $data]);
    }

    public function nextRoom(Request $request)
    {
        $id = $request->input('id');
        return redirect()->route('quest', ['id' => $id]);
    }

    public function roll(Request $request)
    {
        if ($request->input('diceSum') === null) {
            return redirect()->route('quest', ['id' => 4, 'throw' => 'player']);
        }
        $diceHand = new DiceHand(2);
        $diceHand->roll();
        $sum = $diceHand->sum();
        if ($sum > $request->input('diceSum')) {
            return redirect()->route('quest', ['id' => 5]);
        }
        return redirect()->route('quest', ['id' => 8]);
    }

    /**
     * Get all rooms
     *
     * @return Array
     */
    public function allRooms()
    {
        $data = [];
        $rooms = Room::all()
               ->toArray();
        $data['rooms'] = $rooms;
        return $data;
    }

    public function getOneRoom($roomId=1)
    {
        return Room::where('id', $roomId)
            ->get()
            ->toArray();
    }

    public function getRoomAndPath($roomId=1)
    {
        return RoomToRoom::where('room_1', $roomId)
            ->addSelect(['room' => Room::select('id')
            ->whereColumn('id', 'mvc_room_to_room.room_1')
        ])->get()->toArray();
    }
}
