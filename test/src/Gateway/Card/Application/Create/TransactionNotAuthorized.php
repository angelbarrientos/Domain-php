<?php
namespace PagoFacil\Test\Gateway\Card\Application\Create;

use PHPUnit\Framework\TestCase;

class TransactionNotAuthorized extends TestCase
{
    public function notAuthorizedProvider()
    {
        return [
            [
                json_decode("
                {
  \"WebServices_Transacciones\": {
    \"transaccion\": {
      \"autorizado\": \"0\",
      \"transaccion\": \"PFE8287S8591I863341\",
      \"texto\": \"Transaction has been denied!\",
      \"mode\": \"PRD\",
      \"totalAttempts\": \"1\",
      \"idTransaccion\": \"863341\",
      \"tipoTarjetaBancaria\": \"DEBIT\",
      \"empresa\": \"kevin medina\",
      \"TransIni\": \"12:32:17 pm 25/03/2019\",
      \"TransFin\": \"12:32:20 pm 25/03/2019\",
      \"param1\": \"\",
      \"param2\": \"\",
      \"param3\": \"\",
      \"param4\": \"\",
      \"param5\": \"\",
      \"TipoTC\": \"Visa\",
      \"data\": {
        \"nombre\": \"Mike\",
        \"apellidos\": \"Gonzalez\",
        \"numeroTarjeta\": \"\",
        \"cvt\": \"\",
        \"cp\": \"11560\",
        \"mesExpiracion\": \"\",
        \"anyoExpiracion\": \"\",
        \"monto\": \"1.00\",
        \"idSucursal\": \"1775e5cbbb48ac261446e1add8d872e418d153dc\",
        \"idUsuario\": \"838eb6af46d25064158149818d36a2dbb6771308\",
        \"idServicio\": \"3\",
        \"email\": \"mike@pagofacil.net\",
        \"telefono\": \"5513372748\",
        \"celular\": \"5513374890\",
        \"calleyNumero\": \"anatole france 311\",
        \"colonia\": \"polanco\",
        \"municipio\": \"miguel hidalgo\",
        \"estado\": \"distrito federal\",
        \"pais\": \"mexico\",
        \"idPedido\": \"TEST_TX\",
        \"param1\": \"\",
        \"param2\": \"\",
        \"param3\": \"\",
        \"param4\": \"\",
        \"param5\": \"\",
        \"httpUserAgent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36\",
        \"ip\": \"127.0.0.1\",
        \"transFechaHora\": \"1553538737\",
        \"bin\": \"492941\",
        \"EVT\": \"4RD\",
        \"ENC_IP\": \"55555555\",
        \"ENC_DIS\": \"1231231\"
      },
      \"dataVal\": {
        \"idSucursal\": \"8591\",
        \"cp\": \"11560\",
        \"nombre\": \"Mike\",
        \"apellidos\": \"Gonzalez\",
        \"numeroTarjeta\": \"(16) **** **** ****9384\",
        \"cvt\": \"(3) ***\",
        \"monto\": \"1.00\",
        \"mesExpiracion\": \"(2) **\",
        \"anyoExpiracion\": \"(2) **\",
        \"idUsuario\": \"8389\",
        \"source\": \"1\",
        \"idServicio\": \"3\",
        \"recurrente\": \"0\",
        \"plan\": \"NOR\",
        \"diferenciado\": \"00\",
        \"mensualidades\": \"00\",
        \"ip\": \"201.140.96.58\",
        \"httpUserAgent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36\",
        \"idPedido\": \"TEST_TX\",
        \"tipoTarjeta\": \"Visa\",
        \"hashKeyCC\": \"cb0b653e73a9f36cbf35df78983060bb760cdf0b\",
        \"idEmpresa\": \"8287\",
        \"nombre_comercial\": \"kevin medina\",
        \"noProcess\": \"\",
        \"noMail\": \"\",
        \"notaMail\": \"\",
        \"transFechaHora\": \"1553538737\",
        \"settingsTransaction\": {
          \"noMontoMes\": \"30000\",
          \"noTransaccionesDia\": \"2\",
          \"minTransaccionTc\": \"5\",
          \"tiempoDevolucion\": \"60\",
          \"sendPdfTransCliente\": \"0\",
          \"AppService\": \"0\",
          \"noTransErroneas\": \"5\",
          \"minTransErroneas\": \"4\",
          \"suspencionServicio\": \"\",
          \"prodAltaDefault\": \"7\"
        },
        \"email\": \"mike@pagofacil.net\",
        \"telefono\": \"5513372748\",
        \"celular\": \"5513374890\",
        \"calleyNumero\": \"anatole france 311\",
        \"colonia\": \"polanco\",
        \"municipio\": \"miguel hidalgo\",
        \"estado\": \"distrito federal\",
        \"pais\": \"mexico\",
        \"idCaja\": \"\",
        \"paisDetectedIP\": \"201.140.96.58\",
        \"qa\": \"1\",
        \"https\": \"off\"
      },
      \"pf_message\": \"Transaccion denegada\",
      \"status\": \"success\",
      \"error\": \"Transacci%C3%B3n+inv%C3%A1lida\"
    }
  }
}
                ")
            ]
        ];
    }
}
