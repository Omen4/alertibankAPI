<?php

namespace test\unit;


use PHPUnit\Framework\TestCase;

class TestTest extends TestCase
{
    /**
     * @test
     */
    public function fooEquals()
    {
        $this->assertEquals('foobar', 'foobar');
    }
}

