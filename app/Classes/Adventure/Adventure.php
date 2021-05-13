<?php

namespace App\Classes\Adventure;

// use App\Models\Room;
// use App\Models\RoomToRoom;
use App\Classes\Dice\DiceHand;
use App\Classes\Adventure\AdventureRoom;

/**
 *  Adventure class
 */
class Adventure extends AdventureRoom
{

    private array $data = [];

    /**
     * Set adventure to true to start quest, get room and paths
     *
     * @return array
     */
    public function playGame($roomId): array
    {
        $this->data = [];
        $this->data['adventure'] = true;
        $this->data['roomAndPath'] = $this->getRoomAndPath($roomId) ?? [];
        $this->data['rooms'] = $this->getOneRoom($roomId) ?? [];
        return $this->data;
    }

    /**
     * Roll against lion
     *
     * @return array
     */
    public function rollDiceAgainstLion($turn): array
    {
        $this->playGame(4);

        $this->data['message'] = 'Du börjar kasta';
        $this->data['diceHand'] = true;
        $diceHand = new DiceHand(2);
        $diceHand->roll();
        $this->data['classes'] = $diceHand->graphic();

        if ($turn === 'player') {
            $this->data['message'] = 'Ge tärningarna till lejonet';
            $this->data['playerSum'] = $diceHand->sum();
        }
        return $this->data;
    }

    /**
     * Roll dice and get sum
     *
     * @return int
     */
    public function rollDiceAndGetSum($dice): int
    {
        $diceHand = new DiceHand($dice);
        $diceHand->roll();
        $sum = $diceHand->sum();
        return $sum;
    }
    /**
     * Return data array
     *
     * @return Array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
