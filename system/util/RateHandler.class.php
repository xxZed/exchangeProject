<?php

require('ApiHandler.class.php');

/**
 * klasa RateHandler obraduje podatke vezane za rate valuta
 */
class RateHandler
{
    /**
     * latestRate JSON: disclamer, license, timestamp(za datum u onDate), base, array rates
     */

    /**
     * checkIfEmpty() provjerava je li rates tablica u bazi podataka prazna
     * 
     * @return boolean 
     * */ 
    public static function checkIfEmpty()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) < 1) return true;
        else return false;
    }

    /**
     * insertLatest() inserta currency code, na datum koji je rate zabiljezen (timestamp) i ratu valute u to vrijeme
     * 
     * @param string $code
     * @param Date $date
     * @param float $rateValue
     * 
     */
    public static function insertLatest($code, $date, $rateValue)
    {
        $sqlInsert = "INSERT INTO rates (code, onDate, rateValue) VALUES ('" . $code . "','" . $date . "','" . $rateValue . "')";
        AppCore::getDB()->sendQuery($sqlInsert);
    }

    /**
     * updateLatest() ubacuje najnovije rate za rates table
     */
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
        $onDate = date('Y-m-d', $latestRates['timestamp']);
        $dateNow = date_create()->format("Y-m-d");

        $sqlDate = "SELECT onDate FROM rates WHERE onDate = '" . $dateNow . "'";
        $queryDate = AppCore::getDB()->sendQuery($sqlDate);

        if (mysqli_num_rows($queryDate) > 1) {
            throw new Exception("Rates already updated");
        } else {
            foreach ($latestRates['rates'] as $key => $value) {
                foreach ($dbCode as $code) {
                    if ($key == $code) {
                        self::insertLatest($key, $onDate, $value);
                    }
                }
            }
        }
    }

    /**
     * getRateSelected() uzima selektirani currency kojeg korisnik moze zatrazit
     * 
     * @param string $code
     * 
     * @return array $fetchedData
     */
    public static function getRateSelected($code)
    {
        $sql = "SELECT code, rateValue FROM rates where code = ('" . $code . "') AND onDate = ('" . date("Y-m-d") . "')";

        $fetchedData = array();
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $fetchedData[] = $row;
        }

        return $fetchedData;
    }
}
