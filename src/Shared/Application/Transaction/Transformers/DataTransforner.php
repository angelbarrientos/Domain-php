<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Shared\Application\Transaction\Transformers;

use League\Fractal\TransformerAbstract;
use PagoFacil\Gateway\Shared\Domain\Interfaces\DomainModel;
use PagoFacil\Gateway\Shared\Domain\Transaction;


class DataTransforner extends TransformerAbstract
{
    /**
     * @param DomainModel $transaction
     * @return array
     */
    public function transform(DomainModel $transaction): array
    {
        /** @var Transaction $transaction */
        return [
            'idSucursal' => $transaction->getUserClient()->getIdBranchOffice(),
            'idUsuario' => $transaction->getUserClient()->getIdUser(),
            'idServicio' => $transaction->getUserClient()->getServiceType(),
            'idPedido' => $transaction->getOrder()->getIdOrder(),
            'monto' => $transaction->getOrder()->getTotal(),
            'numeroTarjeta' => $transaction->getCard()->getAccountNumber(),
            'cvt' => $transaction->getCard()->getCtv(),
            'mesExpiracion' => $transaction->getCard()->getExpirationMonth(),
            'anyoExpiracion' => $transaction->getCard()->getExpirationYear(),
            'nombre' => $transaction->getUserCustomer()->getName(),
            'apellidos' => $transaction->getUserCustomer()->getLastName(),
            'cp' => $transaction->getUserCustomer()->getAddress()->getCp(),
            'email' => $transaction->getUserCustomer()->getContact()->getEmail(),
            'telefono' => $transaction->getUserCustomer()->getContact()->getTelephone(),
            'celular' => $transaction->getUserCustomer()->getContact()->getMovilPhone(),
            'calleyNumero' =>
                "{$transaction->getUserCustomer()->getAddress()->getStreet()} {$transaction->getUserCustomer()->getAddress()->getExternalNumber()}",
            'colonia' => $transaction->getUserCustomer()->getAddress()->getSuburb(),
            'municipio' => $transaction->getUserCustomer()->getAddress()->getMunicipality(),
            'estado' => $transaction->getUserCustomer()->getAddress()->getState(),
            'pais' => $transaction->getUserCustomer()->getAddress()->getCountry(),
            'plan' => $transaction->getOrder()->getPlan(),
            'mensualidades' => $transaction->getOrder()->getMonths()
        ];
    }
}