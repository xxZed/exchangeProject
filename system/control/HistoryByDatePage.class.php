<?php
require(SYSTEM . 'model/AbstractPage.class.php');
require(SYSTEM . 'util/HistoryRateHandler.class.php');

//http://localhost/exchangeProject/index.php?page=History&history=2022-01-03
//YYYY-MM-DD.json


// USE AT YOUR OWN RISK .... 

class HistorybyDatePage extends AbstractPage
{
    public function code()
    {
        $this->templateName = 'historybydate';

        $date = $_GET['history'];

        $status = HistoryRateHandler::searchByDate($date);

        if(!empty($status)){
            $this->v['var1'] = json_encode($status);
        } else {
            $errorMsg = "No rates with $date date";
            $this->v['var1'] = $errorMsg;
        }
    }
}