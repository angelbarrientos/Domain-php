<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Application\Exceptions;

use Throwable;
use PagoFacil\Gateway\Shared\Application\Error\ApplicationError as ApplicationErrorAlias;

class PagoFacilException extends ApplicationErrorAlias
{
    /** @var string $validate_error  */
    protected static $validate_error = 'validate_error';
    protected static $conection_error = 'conection_error';

    /**
     * PagoFacilException constructor.
     * @param string $message
     * @param string $errorCode
     * @param int $code
     * @param Throwable|null $previous
     */
    protected function __construct(string $message, string $errorCode, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errorMessage = $message;
        $this->errorCode = $errorCode;
    }

    /**
     * @param $message
     * @return static
     */
    public static function validate(string $message): self
    {
        return new static($message, static::$validate_error);
    }

    public static function apiErrorCommunication($message): self
    {
        return new static($message, static::$conection_error);
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
