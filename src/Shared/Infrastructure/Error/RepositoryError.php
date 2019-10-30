<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Shared\Infrastructure\Error;

use Exception;
use Throwable;


class RepositoryError extends Exception
{
    const SAVE = 'error_save';
    const DELETE = 'error_delete';
    const NOTFONT = 'error_fond';

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

    static public function save(string $message): self
    {
        return new static($message, static::SAVE);
    }
}