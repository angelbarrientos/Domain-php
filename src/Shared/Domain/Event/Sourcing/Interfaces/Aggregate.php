<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Domain\Aggregate\Interfaces;

use PagoFacil\Gateway\Shared\Domain\Interfaces\Event;
use PagoFacil\Gateway\Shared\Domain\Interfaces\DomainModel;

interface Aggregate extends DomainModel
{
    public function pullDomainEvents(): array;

    public function record(Event $event): void;
}
