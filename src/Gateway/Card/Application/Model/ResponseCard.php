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
     * @param string $sender
     * @param string $hashKeyCC
     * @return static
     */
    static public function pagoFacilResponse(
        Card $card, string $accountNumber, string $expirationMonth,
        string $expirationYear, string $ctv, string $cardType, string $sender,
        string $hashKeyCC
    ): Card
    {
        $card->accountNumber = $accountNumber;
        $card->expirationMonth = $expirationMonth;
        $card->expirationYear = $expirationYear;
        $card->ctv = $ctv;
        $card->cardType = $cardType;
        $card->sender = $sender;
        $card->hashKeyCC = $hashKeyCC;

        return $card;
    }
}