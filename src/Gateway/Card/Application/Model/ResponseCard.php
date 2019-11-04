<?php
declare(strict_types=1);
namespace PagoFacil\Gateway\Gateway\Card\Application\Model;

use PagoFacil\Gateway\Gateway\Card\Domain\Card;


class ResponseCard extends Card
{
    /**
     * @param Card $card
     * @param string $accountNumber
     * @param string $expirationMonth
     * @param string $expirationYear
     * @param string $ctv
     * @param string $cardType
     * @return static
     */
    static public function pagoFacilResponse(
        Card $card, string $accountNumber, string $expirationMonth,
        string $expirationYear, string $ctv, string $cardType
    ): Card
    {
        $card->accountNumber = $accountNumber;
        $card->expirationMonth = $expirationMonth;
        $card->expirationYear = $expirationYear;
        $card->ctv = $ctv;
        $card->cardType = $cardType;

        return $card;
    }
}