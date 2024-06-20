<?php

namespace JuddDev\GuardClauses\Guards\Collections;

use InvalidArgumentException;

class ArrayGuard
{
    public static function isOfType(array $array, string $type): void
    {
        $filtered = array_filter(
            $array,
            fn ($detail) => ! ($detail instanceof $type)
        );

        if (!empty($filtered)) {
            throw new InvalidArgumentException("Not all objects in array are of type $type");
        }
    }

    public static function isNotEmpty(array $array): void
    {
        if (empty($array)) {
            throw new InvalidArgumentException('Array must not be empty');
        }
    }
}
