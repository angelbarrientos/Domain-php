<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Application\Interfaces;

interface UseCase
{
    public function exec(): void;
}
