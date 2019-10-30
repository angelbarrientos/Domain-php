<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Shared\Domain\Error;

use PagoFacil\Gateway\Shared\Domain\Error\DomainError;
use Throwable;


class InvalidUuidError extends DomainError
{
    const INVALID_UUID = 'invalid_uuid';
    /** @var string $errorCode */
    private $errorCode = null;
    /** @var string $errorMessage */
    private $errorMessage = null;

    /**
     * InvalidUuidError constructor.
     * @param string $message
     * @param string $errorCode
     * @param int $code
     * @param Throwable|null $previous
     */
    protected function __construct(string  $message, string $errorCode, int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errorMessage = $message;
        $this->errorCode = $errorCode;
    }

    static public function Format(string $errorCode, string $errorMessage): self{
        return new static($errorMessage, $errorCode);
    }

    static public function isNoValid(string $errorMessage): self {
        return new static($errorMessage, static::INVALID_UUID);
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