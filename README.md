# Guard Clauses

A [guard clause](https://deviq.com/design-patterns/guard-clause) is a software pattern that simplifies complex functions by "failing fast", checking for invalid inputs up front and immediately failing if any are found.

## Sample Usage

Avoiding Primative Obsession:

```php
use JuddDev\GuardClauses\Guards\Numeric\IntegerGuard;

class PositiveInteger
{
    public function __construct(int $value)
    {
        IntegerGuard::isPositiveOrZero($value);
    }
}
```

By doing this, you are then able to quickly make sure your objects are valid upon creation.

You can also use it in methods:

```php
use JuddDev\GuardClauses\Guards\Numeric\IntegerGuard;


class BankAccount
{
    public function __construct(private int $balance)
    {
    }

    public function withdraw(int $amount): bool
    {
        IntegerGuard::isPositiveOrZero($amount);

        // Logic to remove
    }
}
```

Why is this better?  It reduces the overall nesting required in your code.  While the below is a simple problem, you can see how it can propagate.

```php
use JuddDev\GuardClauses\Guards\Numeric\IntegerGuard;

class BankAccount
{
    public function __construct(private int $balance)
    {
    }

    public function withdraw(int $amount): bool
    {
        if($amount <= 0) {
            return false;
        }

        // Logic to remove
    }
}
```
