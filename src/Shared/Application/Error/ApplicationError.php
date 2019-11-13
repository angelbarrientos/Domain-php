<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Application\Error;

use \Exception;
use Throwable;

abstract class ApplicationError extends Exception
{
    /** @var string $errorCode */
    protected $errorCode = null;
    /** @var string $errorMessage */
    protected $errorMessage = null;

    /**
     * ApplicationError constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    protected function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return string
     */
    abstract public function errorCode(): string;

    /**
     * @return string
     */
    abstract public function errorMessage(): string;
}
