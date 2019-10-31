<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\User\Client\Application\Find;


use PagoFacil\Gateway\User\Client\Infrastructure\Interfaces\UserClientQueryRepository;

final class ClientFinder
{
    /** @var UserClientQueryRepository $repository  */
    private $repository = null;

    public function __construct(UserClientQueryRepository $repository)
    {
        $this->repository = $repository;
    }
}