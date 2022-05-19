<?php
require('ApiHandler.class.php');

class HistoryRateHandler
{
    static function checkIfEmpty()
    {
        $sql = "SELECT * FROM rateshistory";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) < 1) return true;
        else return false;
    }

    public static function UpdateHistory($code, $date, $rateValue)
    {
        $sql = "INSERT INTO rateshistory (code, onDate, rateValue) VALUES ('" . $code . "','" . $date . "','" . $rateValue . "')";
        AppCore::getDB()->sendQuery($sql);
    }

    public static function insertHistory($date)
    {
        $history = apiHandle::historyRate($date);
        $onDate = date('Y/m/d', $history['timestamp']);

        foreach ($history['rates'] as $key => $value) {
            self::updateHistory($key, $onDate, $value);
        }
    }

    public static function updateHistoryDate($date)
    {
        $history = apiHandle::historyRate($date);
        $sql = "SELECT code FROM rateshistory";
        $query = AppCore::getDB()->sendQuery($sql);

        $fetchedData = array();

        while ($row = $query->fetch_assoc()) {
            $fetchedData[] = $row;
        }

        $dbCode = array_column($fetchedData, 'code');
        $onDate = date('Y/m/d', $history['timestamp']);

        foreach ($history['rates'] as $key => $value) {
            foreach ($dbCode as $code) {
                if ($key == $code) {
                    self::updateHistory($key, $onDate, $value);
                }
            }
        }
    }
    public static function searchByDate($date)
    {
        $onDate = date('Y-m-d', strtotime($date));

        $sql = "SELECT * FROM rateshistory WHERE onDate = '" . $date . "' ";
        $query = AppCore::getDB()->sendQuery($sql);

        $rows = [];

        if (mysqli_num_rows($query) > 0) {
            while ($row =  $query->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        //bug ako ne postoji date u bazi ne znan kako cu to rjesit...
    }
}
