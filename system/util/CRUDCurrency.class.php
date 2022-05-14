<?php


class CRUDCurrency
{
    public static function createCurrency($code)
    {
        $sql = "INSERT INTO crud_currency (code) VALUES ('" . $code . "')";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function readCurrency()
    {
        $sql = "SELECT * FROM crud_currency";
        $query = AppCore::getDB()->sendQuery($sql);

        $rows = [];
        while ($row =  $query->fetch_assoc()) {
            $rows[] = $row;

            print json_encode(json_encode($rows));
        }
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

    public static function deleteCurrency($code)
    {
        $sql = "DELETE FROM crud_currency WHERE code = '" . $code . "'";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function checkCurrency($code)
    {
        $sql = "SELECT * FROM crud_currency WHERE code = '" . $code . "'";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) > 0) return true;
        else return false;
    }
}
