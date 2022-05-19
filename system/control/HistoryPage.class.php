<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');

//http://localhost/exchangeProject/index.php?page=History&history=2022-01-03
//YYYY-MM-DD.json

class HistoryPage extends AbstractPage
{
    public function code()
    {
        $this->templateName = 'currency';

        $date = $_GET['history'];

        if (HistoryRateHandler::checkIfEmpty()) {
            HistoryRateHandler::insertHistory($date);
            $status = HistoryRateHandler::searchByDate($date);
            
            $this->v['var1'] = json_encode($status);
        } else {
            $status = HistoryRateHandler::searchByDate($date);
           
            $this->v['var1'] = json_encode($status);
        }
    }
}
