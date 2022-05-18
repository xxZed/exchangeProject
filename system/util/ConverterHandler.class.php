<?php

class ConverterHandler
{
    public static function Convert($currencyNameOne, $currencyNameTwo, $amount)
    {
        $sql = "SELECT rateValue FROM rates WHERE code = '" . $currencyNameOne . "'";
        $rateOne = AppCore::getDB()->sendQuery($sql);

        $sql = "SELECT rateValue FROM rates WHERE code = '" . $currencyNameTwo . "'";
        $rateTwo = AppCore::getDB()->sendQuery($sql);

        //$amountOne je u dollarima sada
        $amountDollar = (1 / $rateOne) * $amount;
        $convertedAmount = $amountDollar *  $rateTwo;

        return $convertedAmount;
    }
}