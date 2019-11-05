<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Infrastructure\Interfaces;

use PagoFacil\Gateway\Gateway\Card\Domain\Card;
use PagoFacil\Gateway\Gateway\Card\Domain\CardId;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\QueryRepository;
use PagoFacil\Gateway\Shared\Infrastructure\Dto;

interface CardRepository extends QueryRepository
{
    public function search(CardId $id): Card;
}
