<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\User\Client\Domain\Exceptions;

use PagoFacil\Gateway\Shared\Domain\Error\DomainError;
use Throwable;

class ClientException extends DomainError
{
    const CLIENT_NOT_EXIST = 'client_not_exist';

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

    public static function notExist(string $errorMessage): self
    {
        return new static($errorMessage, static::CLIENT_NOT_EXIST);
    }

    public function errorCode(): string
    {
        return $this->errorCode;
    }

    public function errorMessage(): string
    {
        return $this->errorMessage;
    }
}
