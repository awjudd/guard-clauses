<?php

namespace Tests\Guards\Numeric;

use InvalidArgumentException;
use JuddDev\GuardClauses\Guards\Numeric\IntegerGuard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(IntegerGuard::class)]
class IntegerGuardTest extends TestCase
{
    #[Test]
    public function IntegerGuard_is_ProperlyIdentifiesIntegers(): void
    {
        // Arrange
        $value = 42;

        // Act
        IntegerGuard::is($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function IntegerGuard_is_ThrowsAnExceptionIfaStringIsProvided(): void
    {
        // Arrange
        $value = 'not_an_integer';
        $this->expectException(InvalidArgumentException::class);

        // Act
        IntegerGuard::is($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function IntegerGuard_isPositive_ProperlyIdentifiesPositiveNumbers(): void
    {
        // Arrange
        $value = 42;

        // Act
        IntegerGuard::isPositive($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function IntegerGuard_isPositive_ThrowsAnExceptionOnNegativeNumbers(): void
    {
        // Arrange
        $value = -42;
        $this->expectException(InvalidArgumentException::class);

        // Act
        IntegerGuard::isPositive($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function IntegerGuard_isPositive_ThrowsAnExceptionOnZero(): void
    {
        // Arrange
        $value = 0;
        $this->expectException(InvalidArgumentException::class);

        // Act
        IntegerGuard::isPositive($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function IntegerGuard_isPositiveOrZero_ProperlyIdentifiesPositiveNumbers(): void
    {
        // Arrange
        $value = 42;

        // Act
        IntegerGuard::isPositiveOrZero($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function IntegerGuard_isPositiveOrZero_ThrowsAnExceptionOnNegativeNumbers(): void
    {
        // Arrange
        $value = -42;
        $this->expectException(InvalidArgumentException::class);

        // Act
        IntegerGuard::isPositiveOrZero($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function IntegerGuard_isPositiveOrZero_ProperlyIdentifiesZero(): void
    {
        // Arrange
        $value = 0;

        // Act
        IntegerGuard::isPositiveOrZero($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function IntegerGuard_isNegative_ProperlyIdentifiesNegativeNumbers(): void
    {
        // Arrange
        $negativeValue = -42;

        // Act
        IntegerGuard::isNegative($negativeValue);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function IntegerGuard_isNegative_ThrowsAnExceptionIfPositive(): void
    {
        // Arrange
        $value = 42;
        $this->expectException(InvalidArgumentException::class);

        // Act
        IntegerGuard::isNegative($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function IntegerGuard_isNegative_ThrowsAnExceptionZero(): void
    {
        // Arrange
        $value = 0;
        $this->expectException(InvalidArgumentException::class);

        // Act
        IntegerGuard::isNegative($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function IntegerGuard_isNegativeOrZero_ProperlyIdentifiesNegativeNumbers(): void
    {
        // Arrange
        $negativeValue = -42;

        // Act
        IntegerGuard::isNegativeOrZero($negativeValue);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function IntegerGuard_isNegativeOrZero_ThrowsAnExceptionIfPositive(): void
    {
        // Arrange
        $value = 42;
        $this->expectException(InvalidArgumentException::class);

        // Act
        IntegerGuard::isNegativeOrZero($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function IntegerGuard_isNegativeOrZero_ThrowsAnExceptionZero(): void
    {
        // Arrange
        $value = 0;

        // Act
        IntegerGuard::isNegativeOrZero($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function IntegerGuard_isZero_ProperlyIdentifiesZeroes(): void
    {
        // Arrange
        $value = 0;

        // Act & Assert
        IntegerGuard::isZero($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function IntegerGuard_isPositive_ThrowsAnExceptionOnANonZeroValue(): void
    {
        // Arrange
        $value = 42;
        $this->expectException(InvalidArgumentException::class);

        // Act
        IntegerGuard::isZero($value);

        // Assert
        $this->fail();
    }

}
