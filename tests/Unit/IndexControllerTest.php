<?php

namespace Tests\Unit;

use App\Http\Controllers\IndexController;
use Tests\TestCase;

// use ReflectionClass;

/**
 * Test cases for class Dice
 */
class IndexControllerTest extends TestCase
{
    private $controller;

    /**
     * Construct object to be used in tests.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new IndexController();
        $this->assertInstanceOf("App\Http\Controllers\IndexController", $this->controller);
    }

    /**
     * Check that the index action returns a view.
     */
    public function testControllerIndexAction()
    {
        $exp = "\Illuminate\View\View";
        $res = $this->controller->index();
        $this->assertInstanceOf($exp, $res);
    }
}
