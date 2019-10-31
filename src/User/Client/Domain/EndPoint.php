<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\User\Client\Domain;

use PagoFacil\Gateway\Shared\Domain\Interfaces\DomainModel;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;


class EndPoint implements DomainModel
{
    /** @var Uuid $id */
    private $id = null;
    /** @var string $url */
    private $url = null;
    /** @var string $endpointTransaction */
    private $endpointTransaction = null;
    /** @var string $endPointVerifyTransaction */
    private $endPointVerifyTransaction = null;

    /**
     * EndPoint constructor.
     * @param Uuid $id
     * @param string $url
     * @param string $endpointTransaction
     * @param string $endPointVerifyTransaction
     */
    public function __construct(Uuid $id, string $url, string $endpointTransaction, string $endPointVerifyTransaction)
    {
        $this->id = $id;
        $this->url = $url;
        $this->endpointTransaction = $endpointTransaction;
        $this->endPointVerifyTransaction = $endPointVerifyTransaction;
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getEndpointTransaction(): string
    {
        return $this->endpointTransaction;
    }

    /**
     * @return string
     */
    public function getEndPointVerifyTransaction(): string
    {
        return $this->endPointVerifyTransaction;
    }
}