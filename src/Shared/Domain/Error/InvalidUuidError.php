<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Error;

use PagoFacil\Gateway\Shared\Domain\Error\DomainError;
use Throwable;

class InvalidUuidError extends DomainError
{
    protected static $invalid_uuid = 'invalid_uuid';

    /**
     * InvalidUuidError constructor.
     * @param string $message
     * @param string $errorCode
     * @param int $code
     * @param Throwable|null $previous
     */
    protected function __construct(string $message, string $errorCode, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errorMessage = $message;
        $this->errorCode = $errorCode;
    }

    public static function format(string $errorCode, string $errorMessage): self
    {
        return new static($errorMessage, $errorCode);
    }

    public static function isNoValid(string $errorMessage): self
    {
        return new static($errorMessage, static::$invalid_uuid);
    }

    /**
     * @return string
     */
    public function errorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function errorMessage(): string
    {
        return $this->errorMessage;
    }
}
