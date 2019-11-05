<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Infrastructure\Interfaces;

use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\Dto;
use PagoFacil\Gateway\Shared\Infrastructure\Error\RepositoryError;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\Repository;

interface QueryRepository extends Repository
{
    /**
     * @param Uuid $id
     * @return Dto
     * @throws RepositoryError
     */
    public function findById(Uuid $id): Dto;

    /**
     * @param Criteria $criteria
     * @return Dto
     * @throws RepositoryError
     */
    public function find(Criteria $criteria): Dto;
}
