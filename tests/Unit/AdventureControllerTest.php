<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Classes\Adventure\TreasureAdventure;
use App\Http\Controllers\AdventureController;
use Tests\TestCase;
use ReflectionClass;

/**
 * Test cases for class Dice
 */
class AdventureControllerTest extends TestCase
{
    private $controller;

    /**
     * Construct object to be used in tests.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new AdventureController();
        $this->assertInstanceOf("App\Http\Controllers\AdventureController", $this->controller);
    }

        /**
     * Check that the index action returns a view.
     * @runInSeparateProcess
     */
    public function testControllerIndexAction()
    {
        $this->withSession(['adventure' => new TreasureAdventure()]);
        $exp = "\Illuminate\View\View";
        $res = $this->controller->index();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the next room action returns a response.
     * @runInSeparateProcess
     */
    public function testNextRoomAction()
    {
        $res = $this->post('/adventure/room', ['id' => 1]);

        /* Test status code*/
        $this->assertEquals(302, $res->getStatusCode());
    }

    /**
     * Check that the next room action with id 4 returns a response.
     * @runInSeparateProcess
     */
    public function testNextRoomActionWithRoomId4()
    {
        $res = $this->post('/adventure/room', ['id' => 4]);

        /* Test status code*/
        $this->assertEquals(302, $res->getStatusCode());
    }

    /**
     * Check that the play againts lion action returns a response.
     * @runInSeparateProcess
     */
    public function testPlayAgainstLionAction()
    {
        $this->withSession(['adventure' => new TreasureAdventure()]);
        $exp = "\Illuminate\Http\RedirectResponse";
        $res = $this->controller->playAgainstLion();

        /* Test status code*/
        $this->assertEquals(302, $res->getStatusCode());
        /* Test response*/
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the play againts lion action returns a response when player wins.
     * @runInSeparateProcess
     */
    public function testPlayAgainstLionWhenPlayerWins()
    {
        $this->withSession(['adventure' => new TreasureAdventure()]);

        $reflector = new ReflectionClass(session('adventure'));
        $reflectorProperty = $reflector->getProperty("data");
        $reflectorProperty->setAccessible(true);
        $reflectorProperty->setValue(session('adventure'), ['playerSum' => 12]);

        $exp = "\Illuminate\Http\RedirectResponse";
        $res = $this->controller->playAgainstLion();

        /* Test status code*/
        $this->assertEquals(302, $res->getStatusCode());
        /* Test response*/
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the play againts lion action returns a response when lion wins.
     * @runInSeparateProcess
     */
    public function testPlayAgainstLionWhenLionrWins()
    {
        $this->withSession(['adventure' => new TreasureAdventure()]);

        $reflector = new ReflectionClass(session('adventure'));
        $reflectorProperty = $reflector->getProperty("data");
        $reflectorProperty->setAccessible(true);
        $reflectorProperty->setValue(session('adventure'), ['playerSum' => 1]);

        $exp = "\Illuminate\Http\RedirectResponse";
        $res = $this->controller->playAgainstLion();

        /* Test status code*/
        $this->assertEquals(302, $res->getStatusCode());
        /* Test response*/
        $this->assertInstanceOf($exp, $res);
    }
}
