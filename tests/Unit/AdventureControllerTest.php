<?php

namespace Tests\Unit;

use App\Classes\Adventure\Adventure;
use App\Http\Controllers\AdventureController;
use Tests\TestCase;
// use ReflectionClass;

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
     * Check that the roll action returns a response.
     * @runInSeparateProcess
     */
    public function testControllerIndexAction()
    {
        $this->withSession(['adventure' => new Adventure()]);
        $exp = "\Illuminate\View\View";
        $res = $this->controller->index();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the end action returns a response.
     * @runInSeparateProcess
     */
    public function testNextRoomAction()
    {
        $res = $this->post('/adventure/room', ['id' => 1]);

        /* Test status code*/
        $this->assertEquals(302, $res->getStatusCode());
    }

    /**
     * Check that the end action returns a response.
     * @runInSeparateProcess
     */
    public function testNextRoomActionWithRoomId4()
    {
        $res = $this->post('/adventure/room', ['id' => 4]);

        /* Test status code*/
        $this->assertEquals(302, $res->getStatusCode());
    }


    /**
     * Check that the end action returns a response.
     * @runInSeparateProcess
     */
    public function testQuestAction()
    {
        $res = $this->get('/adventure/quest', ['id' => 4]);

        /* Test status code*/
        $this->assertEquals(200, $res->getStatusCode());
    }

    /**
     * Check that the reset action returns a response.
     * @runInSeparateProcess
     */
    public function testPlayAgainstLionAction()
    {
        $this->withSession(['adventure' => new Adventure()]);
        $exp = "\Illuminate\Http\RedirectResponse";
        $res = $this->controller->playAgainstLion();

        /* Test status code*/
        $this->assertEquals(302, $res->getStatusCode());
        /* Test response*/
        $this->assertInstanceOf($exp, $res);
    }
    //
    // /**
    //  * Check that the newRound action returns a response.
    //  * @runInSeparateProcess
    //  */
    // public function testControllerNewRoundAction()
    // {
    //     $this->withSession(['game21' => new Game()]);
    //     $exp = "\Illuminate\Http\RedirectResponse";
    //     $res = $this->controller->newRound();
    //
    //     /* Test status code*/
    //     $this->assertEquals(302, $res->getStatusCode());
    //     /* Test response*/
    //     $this->assertInstanceOf($exp, $res);
    // }
}
