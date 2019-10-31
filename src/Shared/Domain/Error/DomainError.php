<?php
declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Error;

use DomainException;
use Throwable;


abstract class DomainError extends DomainException
{
    /** @var string $errorCode */
    protected $errorCode = null;
    /** @var string $errorMessage */
    protected $errorMessage = null;
    protected function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    abstract public function errorCode(): string;

    abstract public function errorMessage(): string;
}