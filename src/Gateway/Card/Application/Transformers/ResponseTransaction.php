<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Gateway\Card\Application\Transformers;

use League\Fractal\TransformerAbstract;

class ResponseTransaction extends TransformerAbstract
{
    /**
     * @param array $response<WebServices_Transacciones>
     * @return array
     */
    public function transform(array $response): array
    {
        return [
            'ResponseTransaction' => [
                'transaccion' => $response['transaccion']['transaccion'],
                'authorized' => $response['transaccion']['autorizado'],
                'authorizaton' => $response['transaccion']['autorizacion'],
                'descripcion' => $response['transaccion']['texto'],
                'mode' => $response['transaccion']['mode'],
                'timestamp' => $response['transaccion']['dataVal']['transFechaHora'],
                'message' => $response['transaccion']['pf_message']
            ],
            'Card' => [
                'accountNumber' => $response['transaccion']['dataVal']['numeroTarjeta'],
                'expirationMonth' => $response['transaccion']['dataVal']['mesExpiracion'],
                'expirationYear' => $response['transaccion']['dataVal']['anyoExpiracion'],
                'cvt' => $response['transaccion']['dataVal']['ctv'],
                'cardType' => $response['transaccion']['tipoTarjetaBancaria'],
                'sender' => $response['transaccion']['dataVal']['tipoTarjeta'],
                'hashKeyCC' => $response['transaccion']['dataVal']['hashKeyCC']
            ],
        ];
    }
}
