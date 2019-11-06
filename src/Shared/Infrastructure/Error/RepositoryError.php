<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Infrastructure\Error;

use Exception;
use Throwable;

class RepositoryError extends Exception
{
    protected static $SAVE = 'error_save';
    protected static $DELETE = 'error_delete';
    protected static $NOT_FOUND = 'error_found';

    /** @var string $errorCode */
    protected $errorCode = null;
    /** @var string $errorMessage */
    protected $errorMessage = null;

    protected function __construct(string $message, string $errorCode)
    {
        $this->errorMessage = $message;
        $this->errorCode = $errorCode;
        parent::__construct($message);
    }

    public static function save(string $message): self
    {
        return new static($message, static::$SAVE);
    }
}
