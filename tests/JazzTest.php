<?php

namespace Tighten\Jazz\Tests;

use PHPUnit\Framework\TestCase;
use Tighten\Jazz\Jazz;

class JazzTest extends TestCase
{
    /** @test */
    function it_can_be_instantiated()
    {
        $jazz = new Jazz;
        $this->assertEquals(Jazz::class, get_class($jazz));
    }
}
