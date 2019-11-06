<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Event;

use DateTimeInterface;
use PagoFacil\Gateway\Shared\Domain\Event\Event;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;

class DomainEvent extends Event
{
    protected static $eventName = 'domain_event';
}
