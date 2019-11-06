<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Event\Sourcing;

use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\Interfaces\Aggregate;
use PagoFacil\Gateway\Shared\Domain\Interfaces\Event;
use PagoFacil\Gateway\Shared\Domain\Interfaces\Event as EventInterface;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;
use DateTime;
use DateTimeZone;
use DateTimeInterface;

abstract class AggregateRoot implements Aggregate
{
    /** @var Uuid $aggregateId  */
    protected $aggregateId = null;
    /** @var array $state */
    protected $state = null;
    /** @var array $events */
    private $events = null;
    /** @var DateTimeInterface $date */
    private $date = null;

    public function __construct(Uuid $aggregateId)
    {
        $this->aggregateId = $aggregateId;

        try {
            $date = new DateTime('now', new DateTimeZone(DateTimeZone::UTC));
        } catch (\Exception $e) {
        }

        $this->state['_createAt'] = $date->getTimestamp();
        $this->state['_updateAt'] = $date->getTimestamp();
    }

    public function pullDomainEvents(): array
    {
        // TODO: Implement pullDomainEvents() method.
    }

    public function record(EventInterface $event): void
    {
        // TODO: Implement record() method.
    }
}
