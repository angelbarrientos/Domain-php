<?php

declare(strict_types=1);

namespace PagoFacil\Gateway\Shared\Application\Transaction\Interfaces;

interface TransactionMethod
{
    const TRANSACTION = "transaccion";
    const VERIFY = "verificar";
}
