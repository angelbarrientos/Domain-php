<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Shared\Application\Transaction\Transformers;

use League\Fractal\TransformerAbstract;
use PagoFacil\Gateway\Shared\Domain\Interfaces\DomainModel;


class DataTransforner extends TransformerAbstract
{
    public function transform(DomainModel $transaccion): array
    {
        return [];
    }
}