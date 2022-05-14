<?php

require('ApiHandler.class.php');


class CurrenciesHandler
{
    public static function insertCurrency()
    {
        $currency = apiHandle::allCurrencies();

        foreach ($currency as $key => $value) {
            $sql = "INSERT INTO currency (code, currencyName) VALUES ( '" . $key . "', '" . $value . "')";
            AppCore::getDB()->sendQuery($sql);
        }
    }

    public static function checkCurrency($code)
    {

        if (isset($code)) {
            $sql = "SELECT * FROM currency WHERE code = '" . $code . "'";
            $query = AppCore::getDB()->sendQuery($sql);

            if (mysqli_num_rows($query) === 1) return true;
            else return false;
        } else {
            echo "isset(currenciehandler__checkCurrency)";
        }
    }

    public static function checkAllCurrencies()
    {
        $sql = "SELECT * FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) > 1) return true;
        else return false;
    }
}
