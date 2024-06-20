<?php

namespace Tests\Guards;

use InvalidArgumentException;
use JuddDev\GuardClauses\Guards\ObjectGuard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\Guards\Models\SampleClass;

#[CoversClass(ObjectGuard::class)]
class ObjectGuardTest extends TestCase
{
    #[Test]
    public function ObjectGuards_isInstanceOf_shouldThrowExceptionWhenObjectIsNotInstanceOfType(): void
    {
        // Arrange
        $this->expectException(InvalidArgumentException::class);

        // Act
        ObjectGuard::isInstanceOf('test', SampleClass::class);

        // Assert
        $this->fail();
    }

    #[Test]
    public function ObjectGuards_isInstanceOf_shouldNotThrowExceptionWhenCorrectType(): void
    {
        // Arrange

        // Act
        ObjectGuard::isInstanceOf(new SampleClass(), SampleClass::class);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function ObjectGuards_isInstanceOf_shouldThrowExceptionNullIsProvided(): void
    {
        // Arrange
        $this->expectException(InvalidArgumentException::class);

        // Act
        ObjectGuard::isInstanceOf(null, SampleClass::class);

        // Assert
        $this->fail();
    }

    #[Test]
    public function ObjectGuards_isNotNull_shouldThrowExceptionNullIsProvided(): void
    {
        // Arrange
        $this->expectException(InvalidArgumentException::class);

        // Act
        ObjectGuard::isNotNull(null);

        // Assert
        $this->fail();
    }

    #[Test]
    public function ObjectGuards_isNotNull_shouldNotThrowAnExceptionWhenAnObjectIsProvided(): void
    {
        // Arrange

        // Act
        ObjectGuard::isNotNull(new SampleClass());

        // Assert
        $this->assertTrue(true);
    }

}
