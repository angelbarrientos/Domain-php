<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Exception;
use PagoFacil\Gateway\Shared\Domain\Error\InvalidUuidError;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    /** @var string $value */
    private $value = null;

    /**
     * Uuid constructor.
     * @param string $uuid
     * @throws InvalidUuidError
     */
    public function __construct(string $uuid)
    {
        $this->ensureIsValidUuid($uuid);
        $this->value = $uuid;
    }

    /**
     * @param string $value
     * @throws InvalidUuidError
     */
    private function ensureIsValidUuid(string $value): void
    {
        if (!RamseyUuid::isValid($value)) {
            throw InvalidUuidError::isNoValid(
                sprintf(
                    '<%s> does not allow the value <%s>.',
                    static::class,
                     $value
                )
            );
        }
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getValue();
    }

    /**
     * @return static
     * @throws Exception
     */
    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }
}
