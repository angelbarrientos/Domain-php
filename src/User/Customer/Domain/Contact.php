<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\User\Customer\Domain;

use PagoFacil\Gateway\Shared\Domain\Interfaces\DomainModel;
use PagoFacil\Gateway\Shared\Domain\EmailAddress;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;

class Contact implements DomainModel
{
    /** @var Uuid $id */
    private $id = null;
    /** @var string $telephone */
    private $telephone = null;
    /** @var string $movilPhone */
    private $movilPhone = null;
    /** @var EmailAddress $email */
    private $email = null;

    public function __construct(
        Uuid $id,
        string $telephone,
        string $movilPhone,
        EmailAddress $email
    )
    {
        $this->id = $id;
        $this->telephone = $telephone;
        $this->movilPhone = $movilPhone;
        $this->email = $email;
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
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @return string
     */
    public function getMovilPhone(): string
    {
        return $this->movilPhone;
    }

    /**
     * @return EmailAddress
     */
    public function getEmail(): EmailAddress
    {
        return $this->email;
    }
}
