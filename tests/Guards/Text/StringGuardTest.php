<?php

namespace Guards\Text;

use InvalidArgumentException;
use JuddDev\GuardClauses\Guards\Text\StringGuard;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(StringGuard::class)]
class StringGuardTest extends TestCase
{
    #[Test]
    public function StringGuard_is_ProperlyIdentifiesStrings(): void
    {
        // Arrange
        $value = 'test';

        // Act
        StringGuard::is($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function StringGuard_is_ThrowsExceptionOnNonStrings(): void
    {
        // Arrange
        $value = 42;
        $this->expectException(InvalidArgumentException::class);

        // Act
        StringGuard::is($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function StringGuard_isNotEmpty_ThrowsExceptionOnEmptyStrings(): void
    {
        // Arrange
        $value = '';
        $this->expectException(InvalidArgumentException::class);

        // Act
        StringGuard::isNotEmpty($value);

        // Assert
        $this->fail();
    }

    #[Test]
    public function StringGuard_isNotEmpty_ProperlyIdentifiesStrings(): void
    {
        // Arrange
        $value = 'hello';

        // Act
        StringGuard::isNotEmpty($value);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function StringGuard_minimumLength_ThrowsExceptionOnTooShortStrings(): void
    {
        // Arrange
        $value = 'hello';
        $this->expectException(InvalidArgumentException::class);

        // Act
        StringGuard::minimumLength($value, 10);

        // Assert
        $this->fail();
    }

    #[Test]
    public function StringGuard_minimumLength_ProperlyIdentifiesStringsOfTheExactSize(): void
    {
        // Arrange
        $value = 'hello';

        // Act
        StringGuard::minimumLength($value, 5);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function StringGuard_minimumLength_ProperlyIdentifiesStringsLargerThanMinimum(): void
    {
        // Arrange
        $value = 'hello world';

        // Act
        StringGuard::minimumLength($value, 5);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function StringGuard_lengthBetween_ThrowsExceptionOnTooLongStrings(): void
    {
        // Arrange
        $value = 'hello';
        $this->expectException(InvalidArgumentException::class);

        // Act
        StringGuard::lengthBetween($value, 1, 4);

        // Assert
        $this->fail();
    }

    #[Test]
    public function StringGuard_lengthBetween_ProperlyIdentifiesStringsOfTheMinimumSize(): void
    {
        // Arrange
        $value = 'hello';

        // Act
        StringGuard::lengthBetween($value, 5, 10);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function StringGuard_lengthBetween_ProperlyIdentifiesStringsOfTheMaximumSize(): void
    {
        // Arrange
        $value = 'hello world';

        // Act
        StringGuard::lengthBetween($value, 5, 11);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function StringGuard_lengthBetween_ThrowsExceptionOnTooShortStrings(): void
    {
        // Arrange
        $value = 'hey';
        $this->expectException(InvalidArgumentException::class);

        // Act
        StringGuard::lengthBetween($value, 5, 10);

        // Assert
        $this->fail();
    }

    #[Test]
    public function StringGuard_shouldBe_ProperlyIdentifiesStrings(): void
    {
        // Arrange
        $value = 'test';
        $expected = 'test';

        // Act
        StringGuard::shouldBe($value, $expected);

        // Assert
        $this->assertTrue(true);
    }

    #[Test]
    public function StringGuard_shouldBe_ThrowsExceptionWhenStringsDoNotMatch(): void
    {
        // Arrange
        $value = 'test';
        $expected = 'test2';
        $this->expectException(InvalidArgumentException::class);

        // Act
        StringGuard::shouldBe($value, $expected);

        // Assert
        $this->fail();
    }
}
