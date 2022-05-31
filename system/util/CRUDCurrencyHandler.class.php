<?php
require('ApiHandler.class.php');

/**
 * CRUDCurrency je klasa za administrativne obrade podataka koje sami korisnik unosi
 */
class CRUDCurrency
{
    /**
     * createCurrency stvara novi currency kojeg korisnik unosi
     * 
     * @param string $currency
     */
    public static function createCurrency($currency)
    {
        $sql = "INSERT INTO currency (code) VALUES ('" . $currency . "')";
        AppCore::getDB()->sendQuery($sql);
    }

    /**
     * readCurrency() ispisuje sve iz currency table
     * 
     * @return array $rows
     */
    public static function readCurrency()
    {
        $sql = "SELECT * FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        $rows = [];
        while ($row =  $query->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    /**
     * getCurrency() ispisuje currency kojeg korisnik zatrazi
     * 
     * @return array $cur
     */
    public static function getCurrency($currencyCode)
    {
        $sql = "SELECT * FROM currency WHERE code = '" . $currencyCode . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $cur[] = $row;
        }

        return $cur;
    }

    /**
     * deleteCurrency deleta currency iz table-a
     * 
     * @param string $currency
     */
    public static function deleteCurrency($currency)
    {
        $sql = "DELETE FROM currency WHERE code = '" . $currency . "'";
        AppCore::getDB()->sendQuery($sql);
    }

    /**
     * checkCurrency provjerava za trazeni currency je li postoji
     * 
     * @param string $currency
     * 
     * @return boolean
     */
    public static function checkCurrency($currency)
    {
        $sql = "SELECT * FROM currency WHERE code = '" . $currency . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) > 0) return true;
        else return false;
    }
}
