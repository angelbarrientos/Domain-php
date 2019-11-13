<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\User\Client\Domain;

use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\AggregateRoot;
use PagoFacil\Gateway\User\Client\Domain\UserId;
use PagoFacil\Gateway\User\Client\Domain\EndPoint;

class User extends AggregateRoot
{
    /** @var UserId $id */
    private $id = null;
    /** @var string $idUser */
    private $idUser = null;
    /** @var string $idBranchOffice */
    private $idBranchOffice = null;
    /** @var string $passPhrase */
    private $passPhrase = null;
    /** @var EndPoint $endpoint */
    private $endpoint = null;
    /** @var int $serviceType */
    private $serviceType = null;

    /**
     * User constructor.
     * @param UserId $id
     * @param string $idUser
     * @param string $idBranchOffice
     * @param string $passPhrase
     * @param EndPoint $endPoint
     * @param int $serviceType
     */
    public function __construct(
        UserId $id,
        string $idUser,
        string $idBranchOffice,
        string $passPhrase,
        EndPoint $endPoint,
        int $serviceType
    ) {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idBranchOffice = $idBranchOffice;
        $this->passPhrase = $passPhrase;
        $this->endpoint = $endPoint;
        $this->serviceType = $serviceType;
        parent::__construct($this->id);
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getIdUser(): string
    {
        return $this->idUser;
    }

    /**
     * @return string
     */
    public function getIdBranchOffice(): string
    {
        return $this->idBranchOffice;
    }

    /**
     * @return string
     */
    public function getPassPhrase(): string
    {
        return $this->passPhrase;
    }

    /**
     * @return \PagoFacil\Gateway\User\Client\Domain\EndPoint
     */
    public function getEndPoint(): EndPoint
    {
        return $this->endpoint;
    }

    public function getServiceType(): int
    {
        return $this->serviceType;
    }
}
