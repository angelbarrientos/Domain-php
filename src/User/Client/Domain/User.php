<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\User\Client\Domain;

use PagoFacil\Gateway\Shared\Domain\Aggregate\Abstracts\AggregateRoot;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;


class User extends AggregateRoot
{
    /** @var Uuid $id */
    private $id = null;
    /** @var string $idUser */
    private $idUser = null;
    /** @var string $idBranchOffice */
    private $idBranchOffice = null;
    /** @var string $passPhrase */
    private $passPhrase = null;

    /**
     * User constructor.
     * @param Uuid $id
     * @param string $idUser
     * @param string $idBranchOffice
     * @param string $passPhrase
     */
    public function __construct(
        Uuid $id, string $idUser, string $idBranchOffice, string $passPhrase
    )
    {
        $this->id = $id;
        $this->idUser = $idUser;
        $this->idBranchOffice = $idBranchOffice;
        $this->passPhrase = $passPhrase;
    }

    /**
     * @return Uuid
     */
    public function getId(): Uuid
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
}