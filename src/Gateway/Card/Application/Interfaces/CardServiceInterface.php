<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Application\Interfaces;

use Closure;
use Psr\Http\Message\ResponseInterface;

interface CardServiceInterface
{
    public function sendTransaction(): ResponseInterface;

    public function sendTransactionWithCURL(Closure $closure): ResponseInterface;

    public function validateResponse(): ResponseInterface;

    public function getBody(): array;
}
