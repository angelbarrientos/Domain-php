<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Shared\Infrastructure\Interfaces;

use PagoFacil\Gateway\Shared\Domain\Interfaces\ModelDomain;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;
use PagoFacil\Gateway\Shared\Infrastructure\Error\RepositoryError;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\Repository;


interface CommandRepository extends Repository
{
    /**
     * @param ModelDomain $model
     * @throws RepositoryError
     */
    public function save(ModelDomain $model): void;

    /**
     * @param ModelDomain $model
     * @throws RepositoryError
     */
    public function update(ModelDomain $model): void;

    /**
     * @param Uuid $id
     * @throws RepositoryError
     */
    public function deleteById(Uuid $id): void;
}