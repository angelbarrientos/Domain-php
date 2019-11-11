<?php


namespace PagoFacil\Test\Gateway\Card\Application\Create;

use PHPUnit\Framework\TestCase;

class TransactionAuthorized extends TestCase
{
    public function authorizedProvider()
    {
        return [
            [
            json_decode("
            {
  \"WebServices_Transacciones\": {
    \"transaccion\": {
      \"autorizado\": \"1\",
      \"autorizacion\": \"1\",
      \"transaccion\": \"S-PFE2692S2720I1141743\",
      \"texto\": \"Transaction has been successful!-staging\",
      \"mode\": \"S\",
      \"totalAttempts\": \"1\",
      \"idTransaccion\": \"1141743\",
      \"tipoTarjetaBancaria\": \"DEBIT\",
      \"empresa\": \"PagoFacil Demo\",
      \"TransIni\": \"11:07:27 am 19/09/2018\",
      \"TransFin\": \"11:07:30 am 19/09/2018\",
      \"param1\": \"\",
      \"param2\": \"\",
      \"param3\": \"\",
      \"param4\": \"\",
      \"param5\": \"\",
      \"TipoTC\": \"Master Card\",
      \"data\": {
        \"nombre\": \"Jon\",
        \"apellidos\": \"Snow\",
        \"numeroTarjeta\": \"\",
        \"cvt\": \"\",
        \"cp\": \"48219\",
        \"mesExpiracion\": \"\",
        \"anyoExpiracion\": \"\",
        \"monto\": \"1599\",
        \"idSucursal\": \"e147ee31531d815e2308d\",
        \"idUsuario\": \"f541b3f11f0f9b3fb33499\",
        \"idServicio\": \"3\",
        \"email\": \"ohmlaud@gmail.com\",
        \"telefono\": \"55751875\",
        \"celular\": \"5530996234\",
        \"calleyNumero\": \"Valle de Don, 54\",
        \"colonia\": \"Del Valle\",
        \"municipio\": \"Tecamac\",
        \"estado\": \"Sonora\",
        \"pais\": \"México\",
        \"idPedido\": \"TEST_TX\",
        \"param1\": \"\",
        \"param2\": \"\",
        \"param3\": \"\",
        \"param4\": \"\",
        \"param5\": \"\",
        \"httpUserAgent\": \"Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0\",
        \"ip\": \"127.0.0.1\",
        \"transFechaHora\": \"1537373247\",
        \"bin\": \"5513 5\"
      },
      \"dataVal\": {
        \"idSucursal\": \"2720\",
        \"cp\": \"48219\",
        \"nombre\": \"Jon\",
        \"apellidos\": \"Snow\",
        \"numeroTarjeta\": \"(16) **** **** ****2123\",
        \"cvt\": \"(3) ***\",
        \"monto\": \"1599\",
        \"mesExpiracion\": \"(2) **\",
        \"anyoExpiracion\": \"(2) **\",
        \"idUsuario\": \"2691\",
        \"source\": \"1\",
        \"idServicio\": \"3\",
        \"recurrente\": \"0\",
        \"plan\": \"NOR\",
        \"diferenciado\": \"00\",
        \"mensualidades\": \"00\",
        \"ip\": \"201.140.96.58\",
        \"httpUserAgent\": \"Mozilla/5.0 (X11; Fedora; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0\",
        \"idPedido\": \"TEST_TX\",
        \"tipoTarjeta\": \"Master Card\",
        \"hashKeyCC\": \"17b043d9be2648db6b298583\",
        \"idEmpresa\": \"2692\",
        \"nombre_comercial\": \"PagoFacil Demo\",
        \"noProcess\": \"\",
        \"noMail\": \"\",
        \"notaMail\": \"\",
        \"transFechaHora\": \"1537373247\",
        \"settingsTransaction\": {
          \"noMontoMes\": \"300\",
          \"noTransaccionesDia\": \"2\",
          \"minTransaccionTc\": \"5\",
          \"tiempoDevolucion\": \"30\",
          \"sendPdfTransCliente\": \"1\",
          \"AppService\": \"1\",
          \"noTransErroneas\": \"5\",
          \"minTransErroneas\": \"10\",
          \"suspencionServicio\": \"\"
        },
        \"email\": \"pruebas@pagofacil.net\",
        \"telefono\": \"55751875\",
        \"celular\": \"5530996234\",
        \"calleyNumero\": \"Valle del Don, 45\",
        \"colonia\": \"Del Valle\",
        \"municipio\": \"Tecamac\",
        \"estado\": \"Sonora\",
        \"pais\": \"México\",
        \"idCaja\": \"\",
        \"paisDetectedIP\": \"201.140.96.58\",
        \"qa\": \"1\",
        \"https\": \"off\"
      },
      \"pf_message\": \"Transaccion exitosa\",
      \"status\": \"success\"
    }
  }
}
            ")
                ]
        ];
    }
}
