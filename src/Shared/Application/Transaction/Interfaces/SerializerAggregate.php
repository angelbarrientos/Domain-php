<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Shared\Application\Transaction\Interfaces;


use League\Fractal\TransformerAbstract;
use PagoFacil\Gateway\Shared\Domain\Aggregate\Interfaces\Aggregate;

interface SerializerAggregate
{
    /**
     * @param Aggregate $aggregate
     * @param TransformerAbstract $transformer
     */
    public function addItem(Aggregate $aggregate, TransformerAbstract $transformer): void;

    /**
     * @return array
     */
    public function getArrayData(): array;
}