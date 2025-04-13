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

    public static function shouldBe(string $value, string $expected): void
    {
        if ($value !== $expected) {
            throw new InvalidArgumentException("Value '$value' does not equal the expected '$expected'");
        }
    }

    public static function startsWith(string $value, string $prefix): void
    {
        if (empty($prefix)) {
            throw new InvalidArgumentException('The prefix should not be empty.');
        }

        if (!str_starts_with($value, $prefix)) {
            throw new InvalidArgumentException("Value '$value' does not start with '$prefix'");
        }
    }

    public static function endsWith(string $value, string $suffix): void
    {
        if (empty($suffix)) {
            throw new InvalidArgumentException('The suffix should not be empty.');
        }


        if (!str_ends_with($value, $suffix)) {
            throw new InvalidArgumentException("Value '$value' does not end with '$suffix'");
        }
    }
}
