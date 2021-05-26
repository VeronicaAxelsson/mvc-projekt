<?php

declare(strict_types=1);

namespace App\Classes\Adventure;

use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Test cases for class Dice
 */
class TreasureAdventureTest extends TestCase
{
    private $adventure;

    /**
     * Construct object to be used in tests.
     */
    protected function setUp(): void
    {
        $this->adventure = new TreasureAdventure();
        $this->assertInstanceOf("\App\Classes\Adventure\TreasureAdventure", $this->adventure);
    }

    public function testRollDiceAndGetSum()
    {
        $res = $this->adventure->rollDiceAndGetSum(1);
        $this->assertIsInt($res);
    }

    // /**
    //  * Check that average returns the average of set sum
    //  */
    // public function testAverageOfValues()
    // {
    //     $reflector = new ReflectionClass($this->diceHand);
    //     $reflectorSum = $reflector->getProperty("sum");
    //     $reflectorSum->setAccessible(true);
    //     $reflectorSum->setValue($this->diceHand, 15);
    //
    //     $res = $this->diceHand->average();
    //     $exp = 3;
    //     $this->assertEquals($exp, $res);
    // }
}
