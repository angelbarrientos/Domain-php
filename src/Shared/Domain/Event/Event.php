<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Event;

use DateTimeInterface;
use DateTime;
use DateTimeZone;
use PagoFacil\Gateway\Shared\Domain\Interfaces\Event as EventInterface;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;

class Event implements EventInterface
{
    /** @var Uuid $eventId */
    protected $eventId = null;
    /** @var array $payload */
    protected $payload = null;
    /** @var int $eventAt */
    protected $eventAt = null;

    public function __construct(
        Uuid $eventId,
        array $payload,
        DateTimeInterface $eventAt
    )
    {
        $this->eventId = $eventId;
        $this->payload = $payload;
        $this->eventAt = $eventAt->getTimestamp();
    }

    public static function create(string $eventName): EventInterface
    {
        $uuid = Uuid::random();
        $event = new static(
            $uuid,
            [],
            new DateTime(
                'now',
                new DateTimeZone('UTC')
            )
        );
        $event->setEventName($eventName);

        return $event;
    }

    public function setEventName(string $name): void
    {
        $this->payload['_eventName'] = $name;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return EventInterface
     */
    public function set(string $key, $value): EventInterface
    {
        if (!array_key_exists($key, $this->payload)) {
            $this->payload[$key] = $value;
        }

        return $this;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->payload[$key];
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->payload);
    }

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->eventId->getValue();
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @return int
     */
    public function getEventAt(): int
    {
        return $this->eventAt;
    }
}
