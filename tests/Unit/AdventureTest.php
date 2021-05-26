<?php

declare(strict_types=1);

namespace App\Classes\Adventure;

use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Test cases for class Dice
 */
class AdventureTest extends TestCase
{
    private $adventure;

    /**
     * Construct object to be used in tests.
     */
    protected function setUp(): void
    {
        $this->adventure = new TreasureAdventure();
        $this->assertInstanceOf("\App\Classes\Adventure\Adventure", $this->adventure);
    }

    /**
     *  Verify that getData returns array
     */
    public function testGetData()
    {
        $res = $this->adventure->getData();
        $this->assertIsArray($res);
    }

    public function testRollDiceAndGetSum()
    {
        $res = $this->adventure->rollDiceAndGetSum(1);
        $this->assertIsInt($res);
    }
}
