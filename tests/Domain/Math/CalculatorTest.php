<?php

declare(strict_types=1);

namespace Tests\Domain\Math;

use Domain\Math\Calculator;
use PHPUnit\Framework\TestCase;

final class CalcultatorTest extends TestCase
{
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator();
    }

    public function testAdd()
    {
        $this->assertEquals(7, $this->calculator->add(2, 5));
    }

    public function testSubstract()
    {
        $this->assertEquals(1, $this->calculator->substract(6, 5));
    }

    public function testMultiply()
    {
        $this->assertEquals(21, $this->calculator->multiply(3, 7));
    }

    public function testDivide()
    {
        $this->assertEquals(20, $this->calculator->divide(40, 2));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionProduceWhileDividingByZero()
    {
        $this->calculator->divide(40, 0);
    }
}
