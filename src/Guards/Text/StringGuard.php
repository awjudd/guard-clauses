<?php

namespace JuddDev\GuardClauses\Guards\Text;

use InvalidArgumentException;

class StringGuard
{
    public static function is(mixed $value): void
    {
        if (is_string($value) === false) {
            throw new InvalidArgumentException('Value is not a string');
        }
    }

    public static function isNotEmpty(string $value): void
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Value must not be empty');
        }
    }

    public static function minimumLength(string $value, int $length): void
    {
        if (mb_strlen($value) < $length) {
            throw new InvalidArgumentException("Value is shorter than the minimum length ($length)");
        }
    }

    public static function maximumLength(string $value, int $length): void
    {
        if (mb_strlen($value) > $length) {
            throw new InvalidArgumentException("Value is longer than the maximum length ($length)");
        }
    }

    public static function lengthBetween(string $value, int $minimumLength, int $maximumLength): void
    {
        if (mb_strlen($value) < $minimumLength || mb_strlen($value) > $maximumLength) {
            throw new InvalidArgumentException("Value is not between $minimumLength and $maximumLength characters in length");
        }
    }
}
