<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');

//http://localhost/exchangeProject/index.php?page=History&history=2022-01-03
//YYYY-MM-DD.json

/**
 * HistorybyDatePage upravlja sa povijesti rate-sa iz baze podataka
 * 
 * @author Zdeslav Nazlic, Marin Marincic
 */
class HistorybyDatePage extends AbstractPage
{
    /**
     * code() pomocu GET uzima datum iz URL-a te poziva HistoryRateHandler
     * errore ili rezultat pretrazivanja se salje u historydate.tpl.php
     */
    public function code()
    {
        $this->templateName = 'historybydate';

        $date = $_GET['history'];

        $status = HistoryRateHandler::searchByDate($date);

        if (!empty($status)) {
            $this->v['var1'] = json_encode($status);
        } else {
            $errorMsg = "No rates with $date date";
            $this->v['var1'] = $errorMsg;
        }
    }
}
