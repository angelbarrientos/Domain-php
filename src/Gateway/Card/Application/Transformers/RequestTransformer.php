<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Application\Transformers;

use League\Fractal\TransformerAbstract;
use PagoFacil\Gateway\Shared\Application\Transaction\Interfaces\TransactionMethod;
use PagoFacil\Gateway\Shared\Domain\Transaction;

class RequestTransformer extends TransformerAbstract
{
    public function transform(Transaction $transaction): array
    {
        return [
            'method' => TransactionMethod::TRANSACTION,
            'data' => [
                'idUsuario' => $transaction->getUserClient()->getIdUser(),
                'idSucursal' => $transaction->getUserClient()->getIdBranchOffice(),
                'idPedido' => $transaction->getOrder()->getIdOrder(),
                'monto' => $transaction->getOrder()->getTotal(),
                'plan' => $transaction->getOrder()->getPlan(),
                'mensualidad' => $transaction->getOrder()->getMonths(),
                'numeroTarjeta' => $transaction->getCard()->getAccountNumber(),
                'cvt' => $transaction->getCard()->getCtv(),
                'mesExpiracion' => $transaction->getCard()->getExpirationMonth(),
                'anyoExpiracion' => $transaction->getCard()->getExpirationYear(),
                'nombre' => $transaction->getUserCustomer()->getName(),
                'apellidos' => $transaction->getUserCustomer()->getLastName(),
                'cp' => $transaction->getUserCustomer()->getAddress()->getCp(),
                'email' => $transaction->getUserCustomer()->getContact()->getEmail()->value(),
                'telefono' => $transaction->getUserCustomer()->getContact()->getTelephone(),
                'celular' => $transaction->getUserCustomer()->getContact()->getMovilPhone(),
                'calleyNumero' => $transaction->getUserCustomer()->getAddress()->getStreetAndNumber(),
                'colonia' => $transaction->getUserCustomer()->getAddress()->getSuburb(),
                'municipio' => $transaction->getUserCustomer()->getAddress()->getMunicipality(),
                'pais' => $transaction->getUserCustomer()->getAddress()->getCountry(),
                'estado' => $transaction->getUserCustomer()->getAddress()->getState(),
            ]
        ];
    }
}
