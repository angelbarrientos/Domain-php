<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Aggregate\Abstracts;

use PagoFacil\Gateway\Shared\Domain\Aggregate\Interfaces\Aggregate;
use PagoFacil\Gateway\Shared\Domain\Interfaces\Event;

abstract class AggregateRoot implements Aggregate
{
    /** @var array $events */
    private $events = null;

    public function pullDomainEvents(): array
    {
        // TODO: Implement pullDomainEvents() method.
    }

    public function record(Event $event): void
    {
        // TODO: Implement record() method.
    }
}
