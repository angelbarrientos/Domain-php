<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Shared\Infrastructure\Interfaces;

use PagoFacil\Gateway\Shared\Domain\Interfaces\DomainModel;
use PagoFacil\Gateway\Shared\Infrastructure\Error\RepositoryError;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\Repository;


interface CommandRepository extends Repository
{
    /**
     * @param DomainModel $model
     * @throws RepositoryError
     */
    public function save(DomainModel $model): void;

    /**
     * @param DomainModel $model
     * @throws RepositoryError
     */
    public function update(DomainModel $model): void;

    /**
     * @param DomainModel $model
     * @throws RepositoryError
     */
    public function delete(DomainModel $model): void;
}