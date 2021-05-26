<?php

declare(strict_types=1);

namespace App\Classes\Adventure;

use App\Classes\Dice\DiceHand;
use App\Classes\Adventure\AdventureRoom;

/**
 *  Adventure class
 */
class Adventure
{
    use AdventureRoom;

    protected array $data = [];

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
        $this->data['room'] = $this->getOneRoom($roomId) ?? [];
        return $this->data;
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
