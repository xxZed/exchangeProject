<?php

class ConverterHandler
{
    public static function Convert($currencyNameOne, $currencyNameTwo, $amount)
    {
        $sql = "SELECT rateValue FROM rates WHERE code = '" . $currencyNameOne . "'";
        $rateOne = AppCore::getDB()->sendQuery($sql);

        $sql = "SELECT rateValue FROM rates WHERE code = '" . $currencyNameTwo . "'";
        $rateTwo = AppCore::getDB()->sendQuery($sql);

        if ($currencyNameOne == "USD") {
            $rowsOne = [];
            foreach ($rowsOne['0'] as $key => $value) {
                $rateTwo = floatval($value);
            }
            $amountDollar = (1.0 / 1.0) * (float)$amount;
            $convertedAmount = $amountDollar *  $rateTwo;
        } else if ($currencyNameTwo == "USD") {
            $rowsOne = [];
            while ($row =  $rateOne->fetch_assoc()) {
                $rowsOne[] = $row;
            }
            foreach ($rowsOne['0'] as $key => $value) {
                $rateOne = floatval($value);
            }
            $amountDollar = (1.0 / $rateOne) * $amount;
            $convertedAmount = $amountDollar *  1;
        } else {
            $rowsOne = [];
            $rowsTwo = [];
            while ($row =  $rateOne->fetch_assoc()) {
                $rowsOne[] = $row;
            }
            while ($row =  $rateTwo->fetch_assoc()) {
                $rowsTwo[] = $row;
            }
            foreach ($rowsOne['0'] as $key => $value) {
                $rateOne = floatval($value);
            }
            foreach ($rowsTwo['0'] as $key => $value) {
                $rateTwo = floatval($value);
            }
            $amountDollar = (1.0 / $rateOne) * $amount;
            $convertedAmount = $amountDollar *  $rateTwo;
        }

        return $convertedAmount;
    }
}
