<?php

declare(strict_types=1);

namespace PagoFacil\Test\Gateway\Card\Application\Create;

use PagoFacil\Gateway\Gateway\Card\Domain\Card;
use PagoFacil\Gateway\Gateway\Card\Domain\CardId;
use PagoFacil\Gateway\Gateway\Order\Domain\Order;
use PagoFacil\Gateway\Shared\Domain\Event\Sourcing\AggregateRoot;
use PagoFacil\Gateway\Shared\Domain\Transaction;
use PagoFacil\Gateway\Shared\Domain\TransactionId;
use PagoFacil\Gateway\Shared\Domain\ValueObject\Uuid;
use PagoFacil\Gateway\User\Client\Domain\EndPoint;
use PagoFacil\Gateway\User\Client\Domain\UserId;
use PharIo\Manifest\EmailTest;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use PagoFacil\Gateway\User\Client\Domain\User as UserClient;
use PagoFacil\Gateway\User\Customer\Domain\User as UserCustomer;
use PagoFacil\Gateway\User\Customer\Domain\Contact;
use PagoFacil\Gateway\User\Customer\Domain\Address;
use PagoFacil\Gateway\Shared\Domain\EmailAddress;

abstract class TransactionDataProvider extends TestCase
{
    /** @var LoggerInterface */
    protected $logger;
    /** @var UserClient $client */
    protected $client;
    /** @var UserCustomer $customer  */
    protected $customer;
    /** @var Order */
    protected $order;
    /** @var Card $card  */
    protected $card;
    /** @var Contact $contact */
    protected $contact;
    /** @var Address $address */
    protected $address;
    /** @var EmailAddress $email  */
    protected $email;

    public function transactionProvider():array
    {
        return [
            [
                [
                    "method" => "transaccion",
                    "data" => [
                        "nombre" => "Jon",
                        "apellidos" => "Snow",
                        "numeroTarjeta" => "5513 5509 9409 2123",
                        "cvt" => "271",
                        "cp" => "48219",
                        "mesExpiracion" => "08",
                        "anyoExpiracion" => "22",
                        "monto" => "1599",
                        "idSucursal" => "e147ee31531d815e2308d6d6d39929ab599deb98",
                        "idUsuario" => "f541b3f11f0f9b3fb33499684f22f6d711f2af58",
                        "idServicio" => "3",
                        "email" => "pruebas@pagofacil.net",
                        "telefono" => "55751875",
                        "celular" => "5530996234",
                        "calleyNumero" => "Valle del Don",
                        "calle" => "Calle test",
                        "numero" => "12",
                        "colonia" => "Del Valle",
                        "municipio" => "Tecamac",
                        "estado" => "Sonora",
                        "pais" => "México",
                        "idPedido" => "TEST_TX",
                        "plan" => "",
                        "mensualidades" => ''
                    ],
                    'endpoint' => [
                        'url' => 'https://sandbox.pagofacil.tech',
                        'endpointTransaction' => '/Wsrtransaccion/index/format/json?',
                        'endpointVerification' => '/Wsrtransaccion/index/format/json?'
                    ]
                ]
            ]
        ];
    }

    public function verifyDataProvider(): array
    {
        return [
            [
                "method" => "verificar",
                "data" => [
                    "idPedido" => "TEST_TX",
                    "idUsuario" => "f541b3f11f0f9b3fb334",
                    "idSucursal" => "e147ee31531d815e2308"
                ]
            ]
        ];
    }

    public function createDomainModels()
    {
        $data = $this->transactionProvider()[0][0];
        $this->email = new EmailAddress($data['data']['email']);

        $this->contact = new Contact(
            Uuid::random(),
            $data['data']['telefono'],
            $data['data']['celular'],
            $this->email
        );

        $this->address = new Address(
            Uuid::random(),
            $data['data']['calle'],
            $data['data']['numero'],
            $data['data']['colonia'],
            $data['data']['municipio'],
            $data['data']['estado'],
            $data['data']['pais'],
            $data['data']['cp']
        );

        $this->client = new UserClient(
            UserId::random(),
            $data['data']['idUsuario'],
            $data['data']['idSucursal'],
            '',
            new EndPoint(Uuid::random(), '', '', ''),
            3
        );
        $this->customer = new UserCustomer(
            UserId::random(),
            $data['data']['nombre'],
            $data['data']['apellidos'],
            $this->contact,
            $this->address
        );

        $this->order = new Order(
            Uuid::random(),
            $data['data']['idPedido'],
            (float)$data['data']['monto'],
            $this->customer,
            $data['data']['plan'],
            $data['data']['mensualidades']
        );

        $this->card = new Card(
            CardId::random(),
            $data['data']['numeroTarjeta'],
            $data['data']['mesExpiracion'],
            $data['data']['anyoExpiracion'],
            $data['data']['cvt'],
            $this->customer
        );
    }

    protected function getTransactionModel(): AggregateRoot
    {
        return new Transaction(
            TransactionId::random(),
            $this->client,
            $this->customer,
            $this->order,
            $this->card
        );
    }
}
