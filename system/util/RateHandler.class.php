<?php

require('ApiHandler.class.php');

class RateHandler
{
    /**
     * latestRate JSON: disclamer, license, timestamp(za datum u onDate), base, array rates
     */

    public static function checkIfEmpty()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        if(mysqli_num_rows($query) < 1) return true;
        else return false;

    }

    public static function checkLatest()
    {
        $sql = "SELECT * FROM rates WHERE onDate = '" . date("Y-m-d") . "'";

        $query = AppCore::getDB()->sendQuery($sql);
    }

    public static function insertLatest($code, $date, $rateValue)
    {
        $sql = "INSERT INTO rates (code, onDate, rateValue) VALUES ('" . $code . "','" . $date . "','" . $rateValue . "')";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function updateLatest()
    {
        $sql = "SELECT code FROM currency";
        $query = AppCore::getDB()->sendQuery($sql);

        $fetchedData = array();

        while ($row = $query->fetch_assoc()) {
            $fetchedData[] = $row;
        }

        $dbCode = array_column($fetchedData, 'code');
        $latestRates = apiHandle::latestRate();
        $onDate = date('Y/m/d', $latestRates['timestamp']);

        foreach ($latestRates['rates'] as $key => $value) {
            foreach ($dbCode as $code) {
                if ($key == $code) {
                    self::insertLatest($key, $onDate, $value);
                }
            }
        }
    }
    public static function getRateSelected($code)
    {
        $sql = "SELECT rateValue FROM rates where code = ('" . $code . "') AND onDate = ('" . date("Y-m-d") . "')";

        $fetchedData = array();
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $fetchedData[] = $row;
        }

        if (sizeof($fetchedData) === 0) {
            print 'No fetched data in array';
        } else {
            true;
        }

        $databaseRate = array_column($fetchedData, 'rateValue');

        foreach ($databaseRate as $rate)
            return number_format((float)$rate, 5, '.', '');
    }
}
