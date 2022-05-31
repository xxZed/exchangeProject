<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');

//http://localhost/exchangeProject/index.php?page=History&history=2022-01-03
//YYYY-MM-DD.json



/**
 * HistoryPage je klasa koja ispisuje cijelu povijest rates table-a iz baze podataka
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */
class HistoryPage extends AbstractPage
{
    /**
     * code() provjerava je li baza ispunjena ako nije salje errorMsg u svoj tpl.php file gdje se ispisuje, 
     * ako postoji salje se rezultat, tj cijela povijest.
     */
    public function code()
    {
        $this->templateName = 'history';

        //$date = $_GET['history'];

        if (HistoryRateHandler::checkIfEmpty()) {
            $errorMsg = "History empty in database";
            $this->v['var1'] = json_encode($errorMsg);
        } else {
            $status = HistoryRateHandler::readHistory();
            $this->v['var1'] = json_encode($status);
        }
    }
}
