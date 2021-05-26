<?php

declare(strict_types=1);

namespace App\Classes\Adventure;

use App\Classes\Dice\DiceHand;
use App\Classes\Adventure\AdventureRoom;

/**
 *  TreasureAdventure class
 */
class TreasureAdventure extends Adventure
{
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
}
