<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain;

use InvalidArgumentException;

final class EmailAddress
{
    /** @var string $value */
    private $value = null;

    /**
     * EmailAddress constructor.
     * @param string $value
     * @throws InvalidArgumentException
     */
    public function __construct(string $value)
    {
        $this->ensureIsValidEmail($value);
        $this->value = $value;
    }

    /**
     * @param string $value
     * @throws InvalidArgumentException
     */
    private function ensureIsValidEmail(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    'The email <%s> is not valid',
                    $value
                )
            );
        }
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }
}
