<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Interfaces;

interface Event
{
    public function set(string $key, $value): Event;

    public function get(string $key);
}
