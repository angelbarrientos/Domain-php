<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Interfaces;

interface Event
{
    /**
     * @param string $key
     * @param $value
     * @return Event
     */
    public function set(string $key, $value): Event;

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key);

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool;
}
