<?php

namespace JuddDev\GuardClauses\Guards\Numeric;

use InvalidArgumentException;

class IntegerGuard
{
    public static function is(mixed $value): void
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

    public static function isGreaterThan(int $value, int $otherValue): void
    {
        if ($value <= $otherValue) {
            throw new InvalidArgumentException('Value is not greater than the other value');
        }
    }

    public static function isGreaterThanOrEquals(int $value, int $otherValue): void
    {
        if ($value < $otherValue) {
            throw new InvalidArgumentException('Value is not greater than or equal to the other value');
        }
    }

    public static function isLessThan(int $value, int $otherValue): void
    {
        if ($value >= $otherValue) {
            throw new InvalidArgumentException('Value is not less than the other value');
        }
    }

    public static function isLessThanOrEquals(int $value, int $otherValue): void
    {
        if ($value > $otherValue) {
            throw new InvalidArgumentException('Value is not less than or equal to the other value');
        }
    }

    public static function isBetween(int $value, int $lowerBound, int $upperBound): void
    {
        if ($value < $lowerBound || $value > $upperBound) {
            throw new InvalidArgumentException('Value is not between the lower and upper bounds');
        }
    }
}
