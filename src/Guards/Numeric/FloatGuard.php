<?php

namespace JuddDev\GuardClauses\Guards\Numeric;

use InvalidArgumentException;

class FloatGuard
{
    public static function is(mixed $value): void
    {
        if (!is_float($value)) {
            throw new InvalidArgumentException('Value is not an integer');
        }
    }

    public static function isPositive(float $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('Value is not a positive float number');
        }
    }

    public static function isPositiveOrZero(float $value): void
    {
        if ($value < 0) {
            throw new InvalidArgumentException('Value is not a positive float number (or zero)');
        }
    }

    public static function isNegative(float $value): void
    {
        if ($value >= 0) {
            throw new InvalidArgumentException('Value is not a positive float number');
        }
    }

    public static function isNegativeOrZero(float $value): void
    {
        if ($value > 0) {
            throw new InvalidArgumentException('Value is not a positive float number (or zero)');
        }
    }

    public static function isZero(float $value): void
    {
        if ($value !== 0.0) {
            throw new InvalidArgumentException('Value is not zero');
        }
    }

}
