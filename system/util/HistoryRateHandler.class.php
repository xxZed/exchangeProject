<?php
require('ApiHandler.class.php');


/**
 * HistoryRateHandler klassa sadrzi funkcije za obradivanje povijesti rate-ova
 */
class HistoryRateHandler
{
    /**
     * 
     * checkIfEmpty() provjerava je li rates table prazan
     * 
     * @return boolean
     */
    static function checkIfEmpty()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        if (mysqli_num_rows($query) < 1) return true;
        else return false;
    }

    /**
     * searchByDate() funkcija za pretrazivanje baze podataka za odredeni datum kojeg korisnik unese
     * 
     * @param Date $date
     * 
     * @return array $rows
     * @return boolean
     */
    static function searchByDate($date)
    {
        $sql = "SELECT * FROM rates WHERE onDate = '" . $date . "' ";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        if (mysqli_num_rows($query) > 1) return $rows;
        else return false;
    }

    /**
     * readHistory() vraca sve iz rates table-a
     * 
     * @return array $rows
     * @return boolean
     */
    static function readHistory()
    {
        $sql = "SELECT * FROM rates";
        $query = AppCore::getDB()->sendQuery($sql);

        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }

        if (mysqli_num_rows($query) > 1) return $rows;
        else return false;
    }
}
