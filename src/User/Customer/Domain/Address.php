<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\User\Customer\Domain;

use PagoFacil\Gateway\Shared\Domain\Interfaces\DomainModel;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;

class Address implements DomainModel
{
    /** @var Uuid $id */
    private $id = null;
    /** @var string $street */
    private $street = null;
    /** @var string $externalNumber */
    private $externalNumber = null;
    /** @var string $suburb */
    private $suburb = null;
    /** @var string $municipality  */
    private $municipality = null;
    /** @var string $state */
    private $state = null;
    /** @var string $country */
    private $country = null;
    /** @var string $cp  */
    private $cp = null;

    public function __construct(
        Uuid $id,
        string $street,
        string $externalNumber,
        string $suburb,
        string $municipality,
        string $state,
        string $country,
        string $cp
    )
    {
        $this->id = $id;
        $this->street = $street;
        $this->externalNumber = $externalNumber;
        $this->suburb = $suburb;
        $this->municipality = $municipality;
        $this->state = $state;
        $this->country = $country;
        $this->cp = $cp;
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
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getExternalNumber(): string
    {
        return $this->externalNumber;
    }

    /**
     * @return string
     */
    public function getSuburb(): string
    {
        return $this->suburb;
    }

    /**
     * @return string
     */
    public function getMunicipality(): string
    {
        return $this->municipality;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getCp(): string
    {
        return $this->cp;
    }

    public function getStreetAndNumber(): string
    {
        return "{$this->getStreet()} {$this->getExternalNumber()}";
    }
}
