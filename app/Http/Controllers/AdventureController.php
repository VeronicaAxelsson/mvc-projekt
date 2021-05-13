<?php

declare(strict_types=1);

namespace App\Http\Controllers;

// use App\Models\Room;
// use App\Models\RoomToRoom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Dice\DiceHand;
use App\Classes\Adventure\Adventure;

/**
 * Controller for the index route.
 */
class AdventureController extends Controller
{
    /**
     * Show adventure index page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (session()->exists('adventure')) {
            session()->forget('adventure');
        }
        return view('/adventure-index', ['data' => []]);
    }

    /**
     * Show room
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function quest(Request $request)
    {
        if (session()->missing('adventure')) {
            session()->put('adventure', new Adventure());
        }

        $roomId = $request->query('id') ?? 1;

        if ($roomId === '4') {
            $turn = $request->query('throw');
            $data = session('adventure')->rollDiceAgainstLion($turn);
            return view('/adventure-index', ['data' => $data]);
        }

        $data = session('adventure')->playGame($roomId);
        return view('/adventure-index', ['data' => $data]);
    }

    /**
     * Get next room id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function nextRoom(Request $request)
    {
        $roomId = $request->input('id');
        return redirect()->route('quest', ['id' => $roomId]);
    }

    /**
     * Play against lion and return room id depending on outcome
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function playAgainstLion()
    {
        $data = session('adventure')->getData();
        $playerSum = $data['playerSum'] ?? null;
        if ($playerSum === null) {
            return redirect()->route('quest', ['id' => 4, 'throw' => 'player']);
        }

        $lionSum = session('adventure')->rollDiceAndGetSum(2);
        if ($lionSum > $playerSum) {
            return redirect()->route('quest', ['id' => 8]);
        }
        return redirect()->route('quest', ['id' => 5]);
    }
}
