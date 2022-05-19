<?php


class CRUDCurrency
{
    public static function createCurrency($currency)
    {
        $sql = "INSERT INTO crud_currency (code) VALUES ('" . $currency . "')";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function readCurrency()
    {
        $sql = "SELECT * FROM crud_currency";
        $query = AppCore::getDB()->sendQuery($sql);

        $rows = [];
        while ($row =  $query->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    public static function getCurrency()
    {
        $sql = "SELECT * FROM crud_currency";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $cur[] = $row;
        }

        return $cur;
    }

    public static function deleteCurrency($currency)
    {
        $sql = "DELETE FROM crud_currency WHERE code = '" . $currency . "'";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function checkCurrency($currency)
    {
        $sql = "SELECT * FROM crud_currency WHERE code = '" . $currency . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) > 0) return true;
        else return false;
    }
}
