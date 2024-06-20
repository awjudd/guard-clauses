<?php

namespace Guards\Numeric;

use InvalidArgumentException;
use JuddDev\GuardClauses\Guards\Numeric\FloatGuard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(FloatGuard::class)]
class FloatGuardTest extends TestCase
{
    #[Test]
    public function FloatGuard_is_ProperlyIdentifiesFloatingPointNumbers(): void
    {
        // Arrange
        $value = 42.0;

        // Act
        FloatGuard::is($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function FloatGuard_is_ThrowsAnExceptionIfAnIntegerIsProvided(): void
    {
        // Arrange
        $value = 10;
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::is($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function FloatGuard_is_ThrowsAnExceptionIfAStringIsProvided(): void
    {
        // Arrange
        $value = 'not_a_floatr';
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::is($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function FloatGuard_isPositive_ProperlyIdentifiesPositiveNumbers(): void
    {
        // Arrange
        $value = 42.0;

        // Act
        FloatGuard::isPositive($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function FloatGuard_isPositive_ThrowsAnExceptionOnNegativeNumbers(): void
    {
        // Arrange
        $value = -42.2;
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::isPositive($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function FloatGuard_isPositive_ThrowsAnExceptionOnZero(): void
    {
        // Arrange
        $value = 0.0;
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::isPositive($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function FloatGuard_isPositiveOrZero_ProperlyIdentifiesPositiveNumbers(): void
    {
        // Arrange
        $value = 42.0;

        // Act
        FloatGuard::isPositiveOrZero($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function FloatGuard_isPositiveOrZero_ThrowsAnExceptionOnNegativeNumbers(): void
    {
        // Arrange
        $value = -42.2;
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::isPositiveOrZero($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function FloatGuard_isPositiveOrZero_ProperlyIdentifiesZero(): void
    {
        // Arrange
        $value = 0.0;

        // Act
        FloatGuard::isPositiveOrZero($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function FloatGuard_isNegative_ProperlyIdentifiesNegativeNumbers(): void
    {
        // Arrange
        $negativeValue = -42.2;

        // Act
        FloatGuard::isNegative($negativeValue);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function FloatGuard_isNegative_ThrowsAnExceptionIfPositive(): void
    {
        // Arrange
        $value = 42.0;
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::isNegative($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function FloatGuard_isNegative_ThrowsAnExceptionIfZero(): void
    {
        // Arrange
        $value = 0.0;
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::isNegative($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function FloatGuard_isNegativeOrZero_ProperlyIdentifiesNegativeNumbers(): void
    {
        // Arrange
        $negativeValue = -42.2;

        // Act
        FloatGuard::isNegativeOrZero($negativeValue);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function FloatGuard_isNegativeOrZero_ThrowsAnExceptionIfPositive(): void
    {
        // Arrange
        $value = 42.0;
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::isNegativeOrZero($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function FloatGuard_isNegativeOrZero_ProperlyIdentifiesZero(): void
    {
        // Arrange
        $value = 0.0;

        // Act
        FloatGuard::isNegativeOrZero($value);

        // Assert
        $this->assertTrue(true);
    }


    #[Test]
    public function FloatGuard_isZero_ProperlyIdentifiesZeroes(): void
    {
        // Arrange
        $value = 0.0;

        // Act & Assert
        FloatGuard::isZero($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function FloatGuard_isPositive_ThrowsAnExceptionOnANonZeroValue(): void
    {
        // Arrange
        $value = 42;
        $this->expectException(InvalidArgumentException::class);

        // Act
        FloatGuard::isZero($value);

        // Assert
        $this->fail();
    }

}
