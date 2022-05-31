<?php
require('ApiHandler.class.php');

/**
 * CurrenciesHandler klasa obraduje podatke za currency table
 */
class CurrenciesHandler
{
    /**
     * insertCurrency() ubacuje podatke unutar currency table iz API-a
     */
    public static function insertCurrency()
    {
        $currency = apiHandle::allCurrencies();

        foreach ($currency as $key => $value) {
            $sql = "INSERT INTO currency (code, currencyName) VALUES ( '" . $key . "', '" . $value . "')";
            AppCore::getDB()->sendQuery($sql);
        }
    }

    /**
     * checkCurrency() provjerava je li currency postoji, ako postoji nece ga ponovno upisat, ako ne postoji upisat ce novi currency
     * 
     * @param string $code
     * 
     * @return boolean
     */
    public static function checkCurrency($code)
    {
        $sql = "SELECT * FROM currency WHERE code = '" . $code . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) === 1) return true;
        else return false;
    }

    /**
     * provjerava je li currency table prazan
     * 
     * @return boolean
     */
    public static function checkAllCurrencies()
    {
        $sql = "SELECT * FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) > 1) return true;
        else return false;
    }
}
