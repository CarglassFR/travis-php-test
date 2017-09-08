<?php

declare(strict_types=1);

namespace Domain\Math;

final class Calculator
{
    public function add($number1, $number2): int
    {
        // check dead code
        if (false) {
            return 1;
        }

        return $number1 + $number2;
    }

    public function substract($number1, $number2): int
    {
        return $number1 - $number2;
    }

    public function multiply($number1, $number2)
    {
        return $number1 * $number2;
    }

    public function divide($number1, $number2)
    {
        if ($number2 === 0) {
            throw new \InvalidArgumentException('Division by zero is not possible');
        }

        return $number1 / $number2;
    }
}
