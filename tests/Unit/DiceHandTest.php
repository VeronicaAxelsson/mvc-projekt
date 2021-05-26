<?php

declare(strict_types=1);

namespace App\Classes\Dice;

use PHPUnit\Framework\TestCase;
use ReflectionClass;

/**
 * Test cases for class Dice
 */
class DiceHandTest extends TestCase
{
    private $diceHand;

    /**
     * Construct object to be used in tests.
     */
    protected function setUp(): void
    {
        $this->diceHand = new DiceHand();
        $this->assertInstanceOf("\App\Classes\Dice\DiceHand", $this->diceHand);
    }

    /**
     *  Verify that diceHand has expected properties when created without arguments
     */
    public function testCreateDiceHandWithNoArgument()
    {
        $res = $this->diceHand->dice();
        $this->assertContainsOnlyInstancesOf(Dice::class, $res);
        $this->assertCount(5, $res);
    }

    /**
     * Construct object and verify that the object has the expected
     * properties with argument.
     */
    public function testCreateDiceHandWithArgument()
    {
        $diceHand = new DiceHand(2);
        $this->assertInstanceOf("\App\Classes\Dice\DiceHand", $diceHand);

        $res = $diceHand->dice();
        $this->assertContainsOnlyInstancesOf(Dice::class, $res);
        $this->assertCount(2, $res);
    }

    /**
     * Roll dice and verify that rolls and graphic arrays are filled
     * with correct type of and number of values.
     */
    public function testRollDiceInDiceHand()
    {
        $res = $this->diceHand->roll();

        $this->assertContainsOnly('integer', $res);
        $this->assertCount(5, $res);

        $this->assertContainsOnly('integer', $this->diceHand->values());
        $this->assertCount(5, $this->diceHand->values());

        $this->assertContainsOnly('string', $this->diceHand->graphic());
        $this->assertCount(5, $this->diceHand->graphic());
    }

    /**
     * Check that sum returns the sum of set values.
     */
    public function testSum()
    {
        $reflector = new ReflectionClass($this->diceHand);
        $reflectorSum = $reflector->getProperty("rolls");
        $reflectorSum->setAccessible(true);
        $reflectorSum->setValue($this->diceHand, [1, 2, 3]);

        $res = $this->diceHand->sum();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }
}
