<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\User\Client\Infrastructure\Interfaces;

use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;
use PagoFacil\Gateway\Shared\Infrastructure\Interfaces\QueryRepository;
use PagoFacil\Gateway\User\Client\Domain\User;


interface UserClientQueryRepository extends QueryRepository
{
    public function searchByUserKeyApi(string $id): User;

    public function searchByUserBranchOfficeKeyApi(string $id): User;
}