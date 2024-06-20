<?php

namespace JuddDev\GuardClauses\Guards\Numeric;

use InvalidArgumentException;

class IntegerGuard
{
    public static function is($value): void
    {
        if (!is_int($value)) {
            throw new InvalidArgumentException('Value is not an integer');
        }
    }

    public static function isPositive(int $value): void
    {
        if ($value <= 0) {
            throw new InvalidArgumentException('Value is not a positive integer');
        }
    }

    public static function isPositiveOrZero(int $value): void
    {
        if ($value < 0) {
            throw new InvalidArgumentException('Value is not a positive integer (or zero)');
        }
    }

    public static function isNegative(int $value): void
    {
        if ($value >= 0) {
            throw new InvalidArgumentException('Value is not a positive integer');
        }
    }

    public static function isNegativeOrZero(int $value): void
    {
        if ($value > 0) {
            throw new InvalidArgumentException('Value is not a positive integer (or zero)');
        }
    }

    public static function isZero(int $value): void
    {
        if ($value !== 0) {
            throw new InvalidArgumentException('Value is not zero');
        }
    }
}
