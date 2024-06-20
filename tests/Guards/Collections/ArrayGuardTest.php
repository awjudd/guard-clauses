<?php

namespace Tests\Guards\Collections;

use InvalidArgumentException;
use JuddDev\GuardClauses\Guards\Collections\ArrayGuard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\Guards\Models\SampleClass;

#[CoversClass(ArrayGuard::class)]
class ArrayGuardTest extends TestCase
{
    #[Test]
    public function ArrayGuard_isNotEmpty_ShouldThrowExceptionWhenCollectionIsEmpty(): void
    {
        // Arrange
        $this->expectException(InvalidArgumentException::class);

        // Act
        ArrayGuard::isNotEmpty([]);

        // Assert
        $this->fail();
    }

    #[Test]
    public function ArrayGuard_isNotEmpty_ShouldNotThrowAnExceptionIfThereIsAValue(): void
    {
        // Arrange

        // Act
        ArrayGuard::isNotEmpty(['hi']);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function ArrayGuard_isOfType_ShouldThrowExceptionWhenSingleItemHasADifferentType(): void
    {
        // Arrange
        $subject = [
            'hi',
        ];
        $this->expectException(InvalidArgumentException::class);

        // Act
        ArrayGuard::isOfType($subject, SampleClass::class);

        // Assert
        $this->fail();
    }

    #[Test]
    public function ArrayGuard_isOfType_ShouldNotThrowExceptionWhenTheTypeIsValid(): void
    {
        // Arrange
        $subject = [
            new SampleClass(),
        ];

        // Act
        ArrayGuard::isOfType($subject, SampleClass::class);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function ArrayGuard_isOfType_ShouldThrowExceptionWhenNullIsInTheCollection(): void
    {
        // Arrange
        $subject = [
            null,
        ];
        $this->expectException(InvalidArgumentException::class);

        // Act
        ArrayGuard::isOfType($subject, SampleClass::class);

        // Assert
        $this->fail();
    }

}
