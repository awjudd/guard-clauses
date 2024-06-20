<?php

namespace JuddDev\GuardClauses\Guards;

use InvalidArgumentException;

class ObjectGuard
{
    public static function isInstanceOf(mixed $object, string $type): void
    {
        if (!$object instanceof $type) {
            throw new InvalidArgumentException("Object is not instance of $type");
        }
    }

    public static function isNotNull(?object $object): void
    {
        if ($object === null) {
            throw new InvalidArgumentException('Object is null');
        }
    }

}
